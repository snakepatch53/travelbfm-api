<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    private $PHOTO_PATH = "public/img_products";
    private $IMAGE_TYPE = "jpg,jpeg,png";

    public function index(Request $request)
    {
        $includes = [];
        if ($request->query('includeCategory')) $includes[] = 'category';
        if ($request->query('includeBusiness')) $includes[] = 'category.business';
        if ($request->query('includeProductCarts')) $includes[] = 'productCarts';

        $data = Product::with($includes)->get();
        return response()->json([
            "success" => true,
            "message" => "Recursos encontrados",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'photo' => 'file|mimes:' . $this->IMAGE_TYPE,
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es requerido',
            'description.min' => 'El campo descripción debe tener al menos 10 caracteres',
            'photo.file' => 'El campo foto debe ser un archivo',
            'photo.mimes' => 'El campo foto debe ser un archivo de tipo: ' . $this->IMAGE_TYPE,
            'price.required' => 'El campo precio es requerido',
            'price.numeric' => 'El campo precio debe ser un número',
            'category_id.required' => 'El campo categoría es requerido',
            'category_id.exists' => 'La categoría no existe'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        // if (Auth::user()->role == "Vendedor") {
        //     $category = \App\Models\Category::where('id', $request->category_id)
        //         ->where('business_id', function ($query) {
        //             $query->select('id')
        //                 ->from('businesses')
        //                 ->where('user_id', Auth::id());
        //         })->first();

        //     if (!$category) {
        //         return response()->json([
        //             "success" => false,
        //             "message" => "La categoría no está asociada al usuario",
        //             "data" => null
        //         ]);
        //     }
        // }

        if ($request->file("photo")) {
            $fileName_photo = basename($request->file("photo")->store($this->PHOTO_PATH));
            $request = new Request($request->except(["photo"]) + ["photo" => $fileName_photo]);
        }

        $data = Product::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso creado",
            "errors" => null,
            "data" => $data
        ]);
    }

    public function show(Request $request, Product $product)
    {
        $includes = [];
        if ($request->query('includeCategory')) $includes[] = 'category';
        if ($request->query('includeProductCarts')) $includes[] = 'productCarts';

        return response()->json([
            "success" => true,
            "message" => "Recurso encontrado",
            "errors" => null,
            "data" => $product->load($includes),
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                "success" => false,
                "message" => "Recurso no encontrado",
                "data" => null
            ]);
        }

        $validator = Validator::make($request->all(),  [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'photo' => 'file|mimes:' . $this->IMAGE_TYPE,
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es requerido',
            'description.min' => 'El campo descripción debe tener al menos 10 caracteres',
            'photo.file' => 'El campo foto debe ser un archivo',
            'photo.mimes' => 'El campo foto debe ser un archivo de tipo: ' . $this->IMAGE_TYPE,
            'price.required' => 'El campo precio es requerido',
            'price.numeric' => 'El campo precio debe ser un número',
            'category_id.required' => 'El campo categoría es requerido',
            'category_id.exists' => 'La categoría no existe'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        if ($request->file("photo")) {
            $fileName_photo = basename($request->file("photo")->store($this->PHOTO_PATH));
            $request = new Request($request->except(["photo"]) + ["photo" => $fileName_photo]);
            if (Storage::exists($this->PHOTO_PATH . "/" . $product->photo)) Storage::delete($this->PHOTO_PATH . "/" . $product->photo);
        }

        $product->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $product,
            "token" => null
        ]);
    }

    public function destroy(Product $product)
    {
        $product->load(['productCarts']);
        if ($product->productCarts->count()) {
            return response()->json([
                "success" => false,
                "message" => "No se puede eliminar el recurso, tiene otros recursos asociados",
                "data" => null
            ]);
        }

        // eliminamos tambien el archivo
        if (Storage::exists($this->PHOTO_PATH . "/" . $product->photo)) Storage::delete($this->PHOTO_PATH . "/" . $product->photo);

        $product->delete();

        return response()->json([
            "success" => true,
            "message" => "Recurso eliminado",
            "errors" => null,
            "data" => $product
        ]);
    }
}
