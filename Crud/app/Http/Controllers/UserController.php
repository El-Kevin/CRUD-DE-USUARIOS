<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    
    public function users()
    {
        // Obtener todas las canciones
        $users = User::all();

        // Convertir las canciones a un array asociativo con la clave 'data'
        $data = ['data' => $users->toArray()];

        // Convertir el array a formato JSON con formato
        $jsonResponse = response()->json($data, 200, [], JSON_PRETTY_PRINT);

        // Devolver la respuesta con el JSON formateado
        return $jsonResponse;
    }

    public function store(Request $request)
    {
        // Crear una nueva instancia del modelo User con los datos proporcionados
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hashear la contraseña antes de almacenarla
        $user->save();
    
        // Devolver una respuesta indicando que se creó el recurso correctamente
        return response()->json(['data' => $user], 201);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hashear la contraseña antes de almacenarla
        $user->save();
        return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
    }


}
