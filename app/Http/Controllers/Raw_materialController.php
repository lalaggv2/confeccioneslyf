<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Raw_material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Raw_material extends Controller
{
    public function model()
    {
        return app()->make(Raw_material::class);
    }

    public function userModel()
    {
        return app()->make(User::class);
    }
    public function contactModel()
    {
        return app()->make(Contact::class);
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
                $user = $model->user;
                $data[] = [
                    'id' => $model->id,
                    'name' => '<div><label class="text-capitalize">' . $user->name . '</label><br><label class="small">' . $user->email . '</label></div>',
                    'document' => $model->document_type . ', ' . $model->document,
                    'phone' => $model->phone,
                    'eps' => $model->eps,
                    'position' => $model->position,
                    'salary' => '$' . number_format($model->salary, 0, ',', '.'),
                    'status' => ((int)$model->status === 1) ? '<span class="badge text-bg-success" role="alert">Activo</span>' : '<span class="badge text-bg-danger" role="alert">Inactivo</span>',
                    'btns' => view('helpers.buttons', ['obj' => 'app', 'id' => $model->id, 'show' => 1, 'edit' => 1, 'delete' => 1])->render(),
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

    public function show(Raw_material $raw_material)
    {
        try {
            $raw_material['name'] = $raw_material->user->name;
            $raw_material['email'] = $raw_material->user->email;
            $raw_material['user_id'] = $raw_material->user->id;
            $raw_material['contacts'] = $raw_material->contacts;
            $raw_material['status'] = (bool)$raw_material->status;
            unset($raw_material['user']);
            return response()->json([
                'status' => true,
                'data' => $raw_material,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar obtener el empleado',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'document_type' => 'required',
            'document' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'phone' => 'required',
            'eps' => 'required',
            'rh' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'status' => 'required',
            'gender' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $user = $this->userModel()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->document),
            ]);
            $raw_material = $this->model()->create([
                'user_id' => $user->id,
                'document_type' => $request->document_type,
                'document' => $request->document,
                'address' => $request->address,
                'start_date' => $request->start_date,
                'phone' => $request->phone,
                'eps' => $request->eps,
                'rh' => $request->rh,
                'position' => $request->position,
                'dob' => $request->dob,
                'salary' => $request->salary,
                'status' => $request->status
            ]);
            if ($request->contacts) {
                foreach ($request->contacts as $contact) {
                    $this->contactModel()->create([
                        'employee_id' => $raw_material->id,
                        'name' => $contact['name'],
                        'phone' => $contact['phone'],
                        'relationship' => $contact['relationship'],
                    ]);
                }
            }
            $data  = $raw_material->load('user', 'contacts');
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Empleado guardado correctamente',
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar el empleado',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $empleados = Raw_material::find($id);
        $empleados->delete();
        return redirect()->back();
    }
}
