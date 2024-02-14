<?php

namespace App\Http\Controllers;

use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCartController extends Controller
{

    public function index(Request $request)
    {
        $includes = [];
        if ($request->query('includeCart')) $includes[] = 'cart';
        if ($request->query('includeProduct')) $includes[] = 'product';

        $data = ProductCart::with($includes)->get();
        return response()->json([
            "success" => true,
            "message" => "Recursos encontrados",
            "data" => $data
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            "quantity" => "required|numeric",
            "price" => "required|numeric",
            "product_id" => "required|exists:products,id",
            "cart_id" => "required|exists:carts,id",
        ], [
            "quantity.required" => "El campo cantidad es requerido",
            "quantity.numeric" => "El campo cantidad debe ser un número",
            "price.required" => "El campo precio es requerido",
            "price.numeric" => "El campo precio debe ser un número",
            "product_id.required" => "El campo producto es requerido",
            "product_id.exists" => "El producto no existe",
            "cart_id.required" => "El campo carrito es requerido",
            "cart_id.exists" => "El carrito no existe"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $data = ProductCart::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso creado",
            "errors" => null,
            "data" => $data
        ]);
    }


    public function show(Request $request, ProductCart $productCart)
    {
        $includes = [];
        if ($request->query('includeCart')) $includes[] = 'cart';
        if ($request->query('includeProduct')) $includes[] = 'product';

        return response()->json([
            "success" => true,
            "message" => "Recurso encontrado",
            "errors" => null,
            "data" => $productCart->load($includes),
        ]);
    }


    public function update(Request $request, ProductCart $productCart)
    {
        $validator = Validator::make($request->all(),  [
            "quantity" => "required|numeric",
            "price" => "required|numeric",
            "product_id" => "required|exists:products,id",
            "cart_id" => "required|exists:carts,id",
        ], [
            "quantity.required" => "El campo cantidad es requerido",
            "quantity.numeric" => "El campo cantidad debe ser un número",
            "price.required" => "El campo precio es requerido",
            "price.numeric" => "El campo precio debe ser un número",
            "product_id.required" => "El campo producto es requerido",
            "product_id.exists" => "El producto no existe",
            "cart_id.required" => "El campo carrito es requerido",
            "cart_id.exists" => "El carrito no existe"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $productCart->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $productCart,
            "token" => null
        ]);
    }


    public function destroy(ProductCart $productCart)
    {
        $productCart->delete();

        return response()->json([
            "success" => true,
            "message" => "Recurso eliminado",
            "errors" => null,
            "data" => $productCart
        ]);
    }
}
