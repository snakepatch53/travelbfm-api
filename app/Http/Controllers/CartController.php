<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Cart;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $includes = [];
        if ($request->query('includeUser')) $includes[] = 'user';
        if ($request->query('includeProductCarts')) $includes[] = 'productCarts';
        if ($request->query('includeProductCartsProduct')) $includes[] = 'productCarts.product';
        if ($request->query('includeProductCartsProductCategory')) $includes[] = 'productCarts.product.category';
        if ($request->query('includeProductCartsProductCategoryBusiness')) $includes[] = 'productCarts.product.category.business';

        $data = Cart::with($includes)->get();
        return response()->json([
            "success" => true,
            "message" => "Recursos encontrados",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            "state" => "in:" . implode(",", Cart::$_STATES),
            "phone" => "required|min:10|max:15",
            "address" => "required|min:10",
            "location" => "required|min:5",
            "comment" => "min:5",
            "user_id" => "require|exists:users,id"
        ], [
            "state.in" => "El campo estado debe ser uno de: " . implode(",", Cart::$_STATES),
            "phone.required" => "El campo teléfono es requerido",
            "phone.min" => "El campo teléfono debe tener al menos 10 caracteres",
            "phone.max" => "El campo teléfono debe tener máximo 15 caracteres",
            "address.required" => "El campo dirección es requerido",
            "address.min" => "El campo dirección debe tener al menos 10 caracteres",
            "location.required" => "El campo ubicación es requerido",
            "location.min" => "El campo ubicación debe tener al menos 5 caracteres",
            "comment.min" => "El campo comentario debe tener al menos 5 caracteres",
            "user_id.required" => "El campo 'user_id' es requerido",
            "user_id.exists" => "El campo usuario no existe"

        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $data = Cart::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso creado",
            "errors" => null,
            "data" => $data
        ]);
    }

    public function show(Request $request, Cart $cart)
    {
        $includes = [];
        if ($request->query('includeUser')) $includes[] = 'user';
        if ($request->query('includeProductCarts')) $includes[] = 'productCarts';

        return response()->json([
            "success" => true,
            "message" => "Recurso encontrado",
            "errors" => null,
            "data" => $cart->load($includes),
        ]);
    }

    public function showPdf(Request $request, $id)
    {
        $cart = Cart::findOrfail($id);

        $includes = ['user', 'productCarts', 'productCarts.product', 'productCarts.product.category', 'productCarts.product.category.business'];

        // order by seller
        $cart = $cart->load($includes);

        // reorder
        $product_carts = $cart->productCarts->sortBy(function ($productCart) {
            return $productCart->product->category->business_id;
        });
        $product_carts = $product_carts->toArray();
        // return view
        $cart = $cart->toArray();

        return Pdf::loadView('cart-pdf', compact('cart', 'product_carts'))
            ->setPaper('a4', 'portrait')
            ->stream('cart-' . $cart['id'] . '.pdf');
    }

    public function showPdfSeller(Request $request, $cart_id, $seller_id)
    {
        $cart = Cart::findOrfail($cart_id);

        $includes = ['user', 'productCarts', 'productCarts.product', 'productCarts.product.category', 'productCarts.product.category.business'];

        $cart = $cart->load($includes);

        $existSeller = false;
        foreach ($cart->productCarts as $productCart) {
            if ($productCart->product->category->business_id == $seller_id) {
                $existSeller = true;
                break;
            }
        }
        if (!$existSeller) {
            return response()->json([
                "success" => false,
                "message" => "El vendedor no existe en el carrito",
                "errors" => null,
                "data" => null
            ]);
        }

        $seller = Business::findOrfail($seller_id);
        $seller = $seller->toArray();

        // filter products by seller
        $product_carts = $cart->productCarts->filter(function ($productCart) use ($seller_id) {
            return $productCart->product->category->business_id == $seller_id;
        });


        $product_carts = $product_carts->toArray();
        $cart = $cart->toArray();
        return Pdf::loadView('cart-pdf-seller', compact('cart', 'product_carts', 'seller'))
            ->setPaper('a4', 'portrait')
            ->stream('cart-' . $cart['id'] . '.pdf');
    }

    public function update(Request $request, Cart $cart)
    {

        $validator = Validator::make($request->all(),  [
            "state" => "in:" . implode(",", Cart::$_STATES),
            "phone" => "required|min:10|max:15",
            "address" => "required|min:10",
            "location" => "required|min:5",
            "comment" => "min:5",
            "user_id" => "exists:users,id"
        ], [
            "state.in" => "El campo estado debe ser uno de: " . implode(",", Cart::$_STATES),
            "phone.required" => "El campo teléfono es requerido",
            "phone.min" => "El campo teléfono debe tener al menos 10 caracteres",
            "phone.max" => "El campo teléfono debe tener máximo 15 caracteres",
            "address.required" => "El campo dirección es requerido",
            "address.min" => "El campo dirección debe tener al menos 10 caracteres",
            "location.required" => "El campo ubicación es requerido",
            "location.min" => "El campo ubicación debe tener al menos 5 caracteres",
            "comment.min" => "El campo comentario debe tener al menos 5 caracteres",
            "user_id.exists" => "El campo usuario no existe"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $cart->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $cart,
            "token" => null
        ]);
    }

    public function updateState(Request $request, $id)
    {
        $cart = Cart::findOrfail($id);
        $includes = [];
        if ($request->query('includeUser')) $includes[] = 'user';
        if ($request->query('includeProductCarts')) $includes[] = 'productCarts';
        if ($request->query('includeProductCartsProduct')) $includes[] = 'productCarts.product';
        if ($request->query('includeProductCartsProductCategory')) $includes[] = 'productCarts.product.category';
        if ($request->query('includeProductCartsProductCategoryBusiness')) $includes[] = 'productCarts.product.category.business';

        $validator = Validator::make($request->all(),  [
            "state" => "in:" . implode(",", Cart::$_STATES)
        ], [
            "state.in" => "El campo estado debe ser uno de: " . implode(",", Cart::$_STATES)
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $cart->update(
            [
                "state" => $request->state
            ]
        );

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $cart->load($includes),
            "token" => null
        ]);
    }

    public function destroy(Cart $cart)
    {
        $cart->load(['productCarts']);
        if ($cart->productCarts->count()) {
            return response()->json([
                "success" => false,
                "message" => "No se puede eliminar el recurso, tiene otros recursos asociados",
                "data" => null
            ]);
        }

        $cart->delete();

        return response()->json([
            "success" => true,
            "message" => "Recurso eliminado",
            "errors" => null,
            "data" => $cart
        ]);
    }
}
