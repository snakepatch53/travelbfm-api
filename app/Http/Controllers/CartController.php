<?php

namespace App\Http\Controllers;

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

        $cart = $cart->load($includes)->toArray();

        // return view

        // return response()->json($cart);

        return Pdf::loadView('cart-pdf', compact('cart'))
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
