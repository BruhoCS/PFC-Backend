<?php

namespace App\Http\Controllers;

use App\Models\PlanPremium;
use Illuminate\Http\Request;

class PlanPremiumControll extends Controller
{
     /**
     * Ver la lista completa de planes
     */
    public function index()
    {
        $planes = PlanPremium::all();
        return view('planes')->with('planes', $planes);
    }

    /**
     * cargar la vista para crear un nuevo plan
     */
    public function create()
    {
        $planes = PlanPremium::all();
        return view("nuevoplan")->with('planes', $planes);
    }

    /**
     * Guardar el nuevo plan
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "descuento" => "required|string",
            "ventaja_extra" => "required|in:Deportes gratis,Eventos gratis",
        ]);

        //Obxeto de plan
        $plan = new PlanPremium();
        //Gardamos o valor
        $plan->descuento = $request->input('descuento');
        $plan->ventaja_extra = $request->input('ventaja_extra');
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
        $plan = PlanPremium::find($id);
        return view('plan')->with('plan', $plan);
    }

    /**
     * modificar plan
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "descuento" => "required|string",
            "ventaja_extra" => "required|in:Deportes gratis,Eventos gratis",
        ]);
        $plan = PlanPremium::find($id);
        //Gardamos o valor
        $plan->descuento = $request->input('descuento');
        $plan->ventaja_extra = $request->input('ventaja_extra');
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
        $plan = PlanPremium::findOrFail($id);
        //Executamos 
        $plan->delete();
        //Recargamos a páxina
        return redirect()->to('planes')->with('success', 'O plan foi eliminada correctamente');
    }
}
