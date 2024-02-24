<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Info;
use App\Models\Product;
use App\Models\User;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComboController extends Controller
{
    public function getInfoWeb(Request $request)
    {


        $info = Info::all()->first();
        $users = User::all();
        $businesses = Business::all();
        $categories = Category::all();
        //  include category and business. Category have a business_id
        $products = Product::with('category.business')->get();

        return response()->json([
            "success" => true,
            "message" => "Recursos encontrados",
            "data" => compact('info', 'users', 'businesses', 'categories', 'products')
        ]);
    }

    public function createBulkCart(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'phone' => 'required|min:10|max:15',
            'address' => 'required|min:5',
            'location' => 'required|min:5',
            'comment' => 'min:5',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1'
        ], [
            'phone.required' => 'El campo teléfono es requerido',
            'phone.min' => 'El campo teléfono debe tener al menos 10 caracteres',
            'phone.max' => 'El campo teléfono debe tener como máximo 15 caracteres',
            'address.required' => 'El campo dirección es requerido',
            'address.min' => 'El campo dirección debe tener al menos 5 caracteres',
            'location.required' => 'El campo ubicación es requerido',
            'location.min' => 'El campo ubicación debe tener al menos 5 caracteres',
            'comment.min' => 'El campo comentario debe tener al menos 5 caracteres',
            'products.required' => 'El campo productos es requerido',
            'products.array' => 'El campo productos debe ser un arreglo',
            'products.*.id.required' => 'El campo id de cada producto es requerido',
            'products.*.id.exists' => 'Uno de los productos no existe',
            'products.*.quantity.required' => 'El campo cantidad de cada producto es requerido',
            'products.*.quantity.numeric' => 'El campo cantidad de cada producto debe ser un número',
            'products.*.quantity.min' => 'El campo cantidad de cada producto debe ser como mínimo 1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $user_id = Auth::id();
        $request->merge(['user_id' => $user_id]);

        $cart = Cart::create($request->all());

        foreach ($request->products as $product) {
            $cart->productCarts()->create([
                'quantity' => $product['quantity'],
                'price' => Product::find($product['id'])->price * $product['quantity'],
                'product_id' => $product['id'],
                'cart_id' => $cart->id
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Carrito y sus productos creados",
            "errors" => null,
            "data" => $cart
        ]);
    }

    public function getStrToQr($text)
    {
        $img_path = url('./public/img/location.png');
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data("https://www.google.com.ec/maps/place/" . str_replace(' ', '', $text))
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(0)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->logoResizeToHeight(70)
            ->logoResizeToHeight(70)
            ->logoPath($img_path)
            ->labelText('')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();
        return response($result->getString())->header('Content-Type', $result->getMimeType());
    }
}
