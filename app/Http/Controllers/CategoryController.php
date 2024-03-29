<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $includes = [];
        if ($request->query('includeBusiness')) $includes[] = 'business';
        if ($request->query('includeProducts')) $includes[] = 'products';

        // Restringimos el acceso dependiendo del rol del usuario
        $data = [];

        // Restringimos el acceso dependiendo del rol del usuario
        if (Auth::user()->role == "Vendedor") {
            $data = Category::where('business_id', function ($query) {
                $query->select('id')
                    ->from('businesses')
                    ->where('user_id', Auth::user()->id);
            })->with($includes)->get();
        } else {
            $data = Category::with($includes)->get();
        }

        return response()->json([
            "success" => true,
            "message" => "Recursos encontrados",
            "data" => $data
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            "name" => "required|min:3",
            "description" => "min:5",
            "business_id" => "required|exists:businesses,id",
        ], [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "El campo nombre debe tener al menos 3 caracteres",
            "description.min" => "El campo descripción debe tener al menos 5 caracteres",
            "business_id.required" => "El campo negocio es requerido",
            "business_id.exists" => "El business no existe"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        $includes = [];
        if ($request->query('includeBusiness')) $includes[] = 'business';
        if ($request->query('includeProducts')) $includes[] = 'products';

        $data = Category::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso creado",
            "errors" => null,
            "data" => $data->load($includes)
        ]);
    }


    public function show(Request $request, Category $category)
    {
        $includes = [];
        if ($request->query('includeBusiness')) $includes[] = 'business';
        if ($request->query('includeProducts')) $includes[] = 'products';

        return response()->json([
            "success" => true,
            "message" => "Recurso encontrado",
            "errors" => null,
            "data" => $category->load($includes),
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),  [
            "name" => "required|min:3",
            "description" => "min:5",
            "business_id" => "required|exists:businesses,id",
        ], [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "El campo nombre debe tener al menos 3 caracteres",
            "description.min" => "El campo descripción debe tener al menos 5 caracteres",
            "business_id.required" => "El campo negocio es requerido",
            "business_id.exists" => "El business no existe"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => $request->all()
            ]);
        }

        $includes = [];
        if ($request->query('includeBusiness')) $includes[] = 'business';
        if ($request->query('includeProducts')) $includes[] = 'products';

        $category->update($request->all());

        $category->load($includes);

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $category,
            "token" => null
        ]);
    }


    public function destroy(Category $category)
    {
        $category->load(['products']);
        if ($category->products->count()) {
            return response()->json([
                "success" => false,
                "message" => "No se puede eliminar el recurso, tiene otros recursos asociados",
                "data" => null
            ]);
        }

        $category->delete();

        return response()->json([
            "success" => true,
            "message" => "Recurso eliminado",
            "errors" => null,
            "data" => $category
        ]);
    }
}
