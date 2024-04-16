<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start') / $request->input('length') + 1;
            $perPage = $request->input('length', 100);

            $modelQuery = Supplier::query();
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
        return view('admin.supplier.index');
    }

    public function show(Supplier $supplier)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $supplier,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar obtener el proveedor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required',
            'document' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        DB::beginTransaction();
        try {
            $supplier = Supplier::create([
                'document_type' => $request->document_type,
                'document' => $request->document,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Proveedor guardado correctamente',
                'data' => $supplier
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar el proveedor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
    
        if ($supplier) {
            $supplier->delete();
            return response()->json([
                'status' => true,
                'message' => 'Cliente eliminado correctamente.'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No se encontró el cliente.'
            ], 404);
            
        }
        
    }
};    
