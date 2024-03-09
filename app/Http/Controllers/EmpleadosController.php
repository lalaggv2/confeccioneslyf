<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados=empleados::all();
        return view('empleados.index', compact('empleados'));
        //
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleados=new  empleados;
        $empleados->id=$request->input('id');
        $empleados->nombre=$request->input('nombre');
        $empleados->direccion=$request->input('direccion');
        $empleados->telefono=$request->input('telefono');
        $empleados->cargo=$request->input('cargo');
        $empleados->salario=$request->input('salario');
        $empleados->correo=$request->input('correo');
        $empleados->save();
        return redirect()->back();
        


    }

    /**
     * Display the specified resource.
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $empleados=empleados::find($id);
        $empleados->id=$request->input('id');
        $empleados->nombre=$request->input('nombre');
        $empleados->direccion=$request->input('direccion');
        $empleados->telefono=$request->input('telefono');
        $empleados->cargo=$request->input('cargo');
        $empleados->salario=$request->input('salario');
        $empleados->correo=$request->input('correo');
        $empleados->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $empleados=empleados::find($id);
    $empleados->delete();
    return redirect()->back();
}
}
