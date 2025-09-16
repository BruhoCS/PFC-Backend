<?php

namespace App\Http\Controllers;

use App\Models\PlanStandard;
use Illuminate\Http\Request;

class PlanStandardControll extends Controller
{
    /**
     * Ver la lista completa de planes
     */
    public function index()
    {
        $planes = PlanStandard::all();
        return view('planes')->with('planes', $planes);
    }

    /**
     * cargar la vista para crear un nuevo plan
     */
    public function create()
    {
        $planes = PlanStandard::all();
        return view("nuevoplan")->with('planes', $planes);
    }

    /**
     * Guardar el nuevo plan
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "costes_adicionales" => "required|in:Sillones de masaje,Deportes,Entrenador personal,Eventos",
            "seguimiento_basico" => "required|in:ninguno,semanal,mensual,trimestral",
        ]);

        //Obxeto de plan
        $plan = new PlanStandard();
        //Gardamos o valor
        $plan->costes_adicionales = $request->input('costes_adicionales');
        $plan->seguimiento_basico = $request->input('seguimiento_basico');
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
        $plan = PlanStandard::find($id);
        return view('plan')->with('plan', $plan);
    }

    /**
     * modificar plan
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "costes_adicionales" => "required|in:Sillones de masaje,Deportes,Entrenador personal,Eventos",
            "seguimiento_basico" => "required|in:ninguno,semanal,mensual,trimestral",
        ]);
        $plan = PlanStandard::find($id);
        //Gardamos o valor
        $plan->costes_adicionales = $request->input('costes_adicionales');
        $plan->seguimiento_basico = $request->input('seguimiento_basico');
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
        $plan = PlanStandard::findOrFail($id);
        //Executamos 
        $plan->delete();
        //Recargamos a páxina
        return redirect()->to('planes')->with('success', 'O plan foi eliminada correctamente');
    }
}
