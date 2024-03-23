<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function model()
    {
        return app()->make(Employee::class);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start') / $request->input('length') + 1;
            $perPage = $request->input('length', 100);

            $modelQuery = $this->model()->query();
            $modelQuery->orderBy('id', 'desc');

            $totalRecords = $modelQuery->count();
            $results = $modelQuery
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();
            $data = [];
            foreach ($results as $model) {
                $data[] = [
                    'id' => $model->id,
                    'nombre' => $model->nombre,
                    'direccion' => $model->direccion,
                    'telefono' => $model->telefono,
                    'cargo' => $model->cargo,
                    'salario' => $model->salario,
                    'correo' => $model->correo,
                    'btns' => view('helpers.buttons', ['obj'=> 'app', 'id' => $model->id, 'edit' => 1, 'delete' => 1])->render(),
                ];
            }
            $response = [
                'draw' => $request->input('draw'),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data' => $data,
            ];
            return response()->json($response);
        }
        return view('admin.employee.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $empleados = new  employee;
        $empleados->id = $request->input('id');
        $empleados->nombre = $request->input('nombre');
        $empleados->direccion = $request->input('direccion');
        $empleados->telefono = $request->input('telefono');
        $empleados->cargo = $request->input('cargo');
        $empleados->salario = $request->input('salario');
        $empleados->correo = $request->input('correo');
        $empleados->save();
        return redirect()->back();


    }

    public function show(employee $empleados)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $empleados = employee::find($id);
        $empleados->id = $request->input('id');
        $empleados->nombre = $request->input('nombre');
        $empleados->direccion = $request->input('direccion');
        $empleados->telefono = $request->input('telefono');
        $empleados->cargo = $request->input('cargo');
        $empleados->salario = $request->input('salario');
        $empleados->correo = $request->input('correo');
        $empleados->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $empleados = employee::find($id);
        $empleados->delete();
        return redirect()->back();
    }
}
