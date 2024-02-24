<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    private $LOGO_PATH = "public/img_businesses";
    private $IMAGE_TYPE = "jpg,jpeg,png";

    public function index(Request $request)
    {
        $includes = [];
        if ($request->query('includeUser')) $includes[] = 'user';
        if ($request->query('includeCategories')) $includes[] = 'categories';
        if ($request->query('includeProducts')) $includes[] = 'categories.products';

        // Restringimos el acceso dependiendo del rol del usuario
        $data = [];
        if (Auth::user()->role == User::$_ROLES[1]) {
            $data = Business::where('user_id', Auth::user()->id)->with($includes)->get();
        } else {
            $data = Business::with($includes)->get();
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
            "description" => "required|min:10",
            "short_description" => "required|min:5",
            "logo" => "required|file|mimes:" . $this->IMAGE_TYPE,
            "phone" => "required|min:10|max:15",
            "address" => "required|min:10",
            "location" => "required|min:5",
            "link" => "required|url",
            "state" => "required|in:" . implode(",", Business::$_STATES),
            "user_id" => "required|exists:users,id"
        ], [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "El campo nombre debe tener al menos 3 caracteres",
            "description.required" => "El campo descripción es requerido",
            "description.min" => "El campo descripción debe tener al menos 10 caracteres",
            "short_description.required" => "El campo descripción corta es requerido",
            "short_description.min" => "El campo descripción corta debe tener al menos 5 caracteres",
            "logo.required" => "El campo logo es requerido",
            "logo.file" => "El campo logo debe ser un archivo",
            "logo.mimes" => "El campo logo debe ser un archivo de tipo: " . $this->IMAGE_TYPE,
            "phone.required" => "El campo teléfono es requerido",
            "phone.min" => "El campo teléfono debe tener al menos 10 caracteres",
            "phone.max" => "El campo teléfono debe tener máximo 15 caracteres",
            "address.required" => "El campo dirección es requerido",
            "address.min" => "El campo dirección debe tener al menos 10 caracteres",
            "location.required" => "El campo ubicación es requerido",
            "location.min" => "El campo ubicación debe tener al menos 5 caracteres",
            "link.required" => "El campo enlace es requerido",
            "link.url" => "El campo enlace debe ser una URL válida",
            "state.required" => "El campo estado es requerido",
            "state.in" => "El campo estado debe ser uno de los siguientes valores: " . implode(",", Business::$_STATES),
            "user_id.required" => "El campo usuario es requerido",
            "user_id.exists" => "El usuario no existe"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        if ($request->file("logo")) {
            $fileName_logo = basename($request->file("logo")->store($this->LOGO_PATH));
            $request = new Request($request->except(["logo"]) + ["logo" => $fileName_logo]);
        }

        $data = Business::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso creado",
            "errors" => null,
            "data" => $data
        ]);
    }


    public function show(Request $request, Business $business)
    {
        $includes = [];
        if ($request->query('includeUser')) $includes[] = 'user';
        if ($request->query('includeCategories')) $includes[] = 'categories';

        return response()->json([
            "success" => true,
            "message" => "Recurso encontrado",
            "errors" => null,
            "data" => $business->load($includes),
        ]);
    }


    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        if (!$business) {
            return response()->json([
                "success" => false,
                "message" => "Recurso no encontrado",
                "data" => null
            ]);
        }

        $validator = Validator::make($request->all(),  [
            "name" => "required|min:3",
            "description" => "required|min:10",
            "short_description" => "required|min:5",
            "logo" => "required|file|mimes:" . $this->IMAGE_TYPE,
            "phone" => "required|min:10|max:15",
            "address" => "required|min:10",
            "location" => "required|min:5",
            "link" => "required|url",
            "state" => "required|in:" . implode(",", Business::$_STATES),
            "user_id" => "required|exists:users,id"
        ], [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "El campo nombre debe tener al menos 3 caracteres",
            "description.required" => "El campo descripción es requerido",
            "description.min" => "El campo descripción debe tener al menos 10 caracteres",
            "short_description.required" => "El campo descripción corta es requerido",
            "short_description.min" => "El campo descripción corta debe tener al menos 5 caracteres",
            "logo.required" => "El campo logo es requerido",
            "logo.file" => "El campo logo debe ser un archivo",
            "logo.mimes" => "El campo logo debe ser un archivo de tipo: " . $this->IMAGE_TYPE,
            "phone.required" => "El campo teléfono es requerido",
            "phone.min" => "El campo teléfono debe tener al menos 10 caracteres",
            "phone.max" => "El campo teléfono debe tener máximo 15 caracteres",
            "address.required" => "El campo dirección es requerido",
            "address.min" => "El campo dirección debe tener al menos 10 caracteres",
            "location.required" => "El campo ubicación es requerido",
            "location.min" => "El campo ubicación debe tener al menos 5 caracteres",
            "link.required" => "El campo enlace es requerido",
            "link.url" => "El campo enlace debe ser una URL válida",
            "state.required" => "El campo estado es requerido",
            "state.in" => "El campo estado debe ser uno de los siguientes valores: " . implode(",", Business::$_STATES),
            "user_id.required" => "El campo usuario es requerido",
            "user_id.exists" => "El usuario no existe"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        if ($request->file("logo")) {
            $fileName_logo = basename($request->file("logo")->store($this->LOGO_PATH));
            $request = new Request($request->except(["logo"]) + ["logo" => $fileName_logo]);
            if (Storage::exists($this->LOGO_PATH . "/" . $business->logo)) Storage::delete($this->LOGO_PATH . "/" . $business->logo);
        }

        $business->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "Recurso actualizado",
            "errors" => null,
            "data" => $business,
            "token" => null
        ]);
    }


    public function destroy(Business $business)
    {
        $business->load(['categories']);
        if ($business->categories->count()) {
            return response()->json([
                "success" => false,
                "message" => "No se puede eliminar el recurso, tiene otros recursos asociados",
                "data" => null
            ]);
        }

        // eliminamos tambien el archivo
        if (Storage::exists($this->LOGO_PATH . "/" . $business->logo)) Storage::delete($this->LOGO_PATH . "/" . $business->logo);

        $business->delete();

        return response()->json([
            "success" => true,
            "message" => "Recurso eliminado",
            "errors" => null,
            "data" => $business
        ]);
    }
}
