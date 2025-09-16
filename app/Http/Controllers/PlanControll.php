<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanPremium;
use Illuminate\Http\Request;

class PlanControll extends Controller
{
      /**
     * Ver la lista completa de planes
     */
    public function index()
    {
        $planes = Plan::with(['planStandard','planPremium'])->get();
        return view('planes')->with('planes',$planes);
    }

    /**
     * cargar la vista para crear un nuevo plan
     */
    public function create()
    {
        $planes = Plan::all();
        return view("nuevoplan")->with('planes', $planes);
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
        $plan = new Plan();
        //Gardamos o valor
        $plan->ventaja = $request->input('ventaja');
        $plan->precio = $request->input('precio');
        //Executamos
        $plan->save();
        //Rediriximos ao usuario a táboa de planes
        return redirect()->to('planes')->with('success', 'A plan foir creada correctamente');
    }

    /**
     * cargar la vista para modificar plan
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('plan')->with('plan', $plan);
    }

    /**
     * modificar plan
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "ventaja" => "required|string",
            "precio" => "required|string|max:100",
        ]);
        $plan = Plan::find($id);
        //Gardamos o valor
        $plan->ventaja = $request->input('ventaja');
        $plan->precio = $request->input('precio');
        //Executamos a sentencia
        $plan->save();
        //devolvemos a páxina de planes
        return redirect()->to('planes')->with('success', 'O plan foi actualizada correctamente');
    }

    /**
     * eliminar plan según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $plan = Plan::findOrFail($id);
        //Executamos 
        $plan->delete();
        //Recargamos a páxina
        return redirect()->to('planes')->with('success', 'O plan foi eliminada correctamente');
    }
}
