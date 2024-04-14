<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start') / $request->input('length') + 1;
            $perPage = $request->input('length', 100);

            $modelQuery = Customer::query();
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
                    'document_type' => $model->document_type,
                    'document' => $model->document,
                    'name' => $model->name,
                    'address' => $model->address,
                    'phone' => $model->phone,
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
        return view('admin\customers\index');
    }

    public function show(Customer $customer)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $customer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar obtener el cliente',
                 'error' => $e->getMessage()
           ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_document' => 'required',
            'document' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $customer = Customer::create([
                'type_document' => $request->type_document,
                'document' => $request->document,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $data = $customer->load('contacts');
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Cliente guardado correctamente',
                'data' => $data
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
    }

    
    public function destroy($id)
    {
        $customer = Customer::find($id);
    
        // Verificar si el cliente se encontró correctamente
        if ($customer) {
            $customer->delete();
            return redirect()->back()->with('success', 'Cliente eliminado correctamente');
        } else {
            return redirect()->back()->with('error', 'No se pudo encontrar el cliente');
        }
    }
}
