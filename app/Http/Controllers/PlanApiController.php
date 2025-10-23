<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanApiController extends Controller
{
      /**
     * Ver la lista completa de planes
     */
    public function index()
    {
        $planes = Plan::with(['planStandard','planPremium'])->get();
        return response()->json($planes,200);
    }

    /**
     * Guardar el nuevo plan
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "ventaja" => "required|string",
            "precio" => "required|string|max:100",
        ]);

        //Obxeto de plan
        $plan = Plan::create($request->all());
        //Rediriximos ao usuario a táboa de planes
        return response()->json('planes')->json($plan,201);
    }

     /**
     * Buscar plan
     */
    public function update(Request $request,$id)
    {
        $plan = Plan::find($id);
        //Validamos o valor introducido
        $request->validate([
            "ventaja" => "required|string",
            "precio" => "required|string|max:100",
        ]);

        //Obxeto de plan
        $plan->update($request->all());
        //Rediriximos ao usuario a táboa de planes
        return response()->json('planes')->json($plan, 201);
    }

     /**
     * eliminar plan según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $plan = Plan::find($id);

         //Si no existe indicamos al usaurio
         if(!$plan){
            return response()->json(['error'=>"No se encontró el plan"],404);
        }

        //Executamos 
        $plan->delete();
        //Recargamos a páxina
        return response()->json(['message'=>'Plan borrado exitosamente'],200);
    }
}
