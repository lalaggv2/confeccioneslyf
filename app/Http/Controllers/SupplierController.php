<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller

{
public function model()
{
    return app()->make(Supplier::class);
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
                
                'name' => '<div><label class="text-capitalize">' . $user->name . '</label><br><label class="small">' . $user->email . '</label></div>',
                'document' => $model->document_type . ', ' . $model->document,
                'phone' => $model->phone,
                'address' => $model->address,
                'email' => $model->email,
                
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
    $suppliers=supplier::all();
    return view('admin.supplier.index');
}

public function show(Supplier $supplier)
{
    try {
        $supplier['name'] = $supplier->user->name;
        $supplier['email'] = $supplier->user->email;
       
        unset($supplier['user']);
        return response()->json([
            'status' => true,
            'data' => $supplier,
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
        
        'phone' => 'required',
       
    ]);
    DB::beginTransaction();
    try {
        $user = $this->userModel()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->document),
        ]);
        $supplier = $this->model()->create([
            
            'document_type' => $request->document_type,
            'document' => $request->document,
            'address' => $request->address,
            
            'phone' => $request->phone,
            
        ]);
        if ($request->contacts) {
            foreach ($request->contacts as $contact) {
                $this->contactModel()->create([
                    'supplier_id' => $$supplier->id,
                    'name' => $contact['name'],
                    'phone' => $contact['phone'],
                    'relationship' => $contact['relationship'],
                ]);
            }
        }
        $data  = $supplier->load('user', 'contacts');
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
    $suppliers = Supplier::find($id);
    $suppliers->delete();
    return redirect()->back();
}
}

