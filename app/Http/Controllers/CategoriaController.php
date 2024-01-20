<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class CategoriaController extends Controller
{
   public function getCategoria()
   {
      return response()->json(categoria::all(), 200);
   }
   public function getCategoriaID($id)
   {
      $categoria = categoria::find($id);
      if (is_null($categoria)) {
         return response()->json(['mensaje' => 'registro no encontrado'], 404);
      }
      return response()->json($categoria::find($id), 200);
   }

   public function insertCategoria(Request $request)
   {
      $categoria = categoria::create($request->all());
      return response($categoria, 200);
   }
   public function updateCategoria(Request $request, $id)
   {
      $categoria = categoria::find($id);
      if (is_null($categoria)) {
         return response()->json(["mensaje" => "ocurrio un error"], 404);
      }
      $categoria->update($request->all());
      return response($categoria, 200);
   }
   public function deleteCategoria($id)
   {
      $categoria = categoria::find($id);
      if (is_null($categoria)) {
         return response()->json(["mensaje" => "no se encontro registro"],404);
      }
      $categoria->delete();
      return response()->json(["mensaje" => "registro eliminado exitosamente"]);
   }
}
