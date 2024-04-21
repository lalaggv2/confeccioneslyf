<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailOrderController extends Controller
{
    
    public function model()
    {
        return app()->make(DetailOrder::class);
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
                    'orderable_id' => $model->orderable_id,
                    'orderable_type' => $model->orderable_type,
                    'product_id' => $model->product_id,
                    'quantity' => $model->quantity,
                    'price' => $model->price,
                    'total' => $model->total,
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
        return view('admin.detail_order.index');
    }

    public function show(DetailOrder $detailOrder)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $detailOrder,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar obtener el detalle de la orden',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'orderable_id' => 'required',
            'orderable_type' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        DB::beginTransaction();
        try {
            $detailOrder = $this->model()->create([
                'id' => $request->id,
                'orderable_id' => $request->orderable_id,
                'orderable_type' => $request->orderable_type,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request->total,
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Detalle de orden guardado correctamente',
                'data' => $detailOrder
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar el detalle de la orden',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        
            'orderable_id' => 'required',
            'orderable_type' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
            
        ]);
    
        try {
            // Buscar el proveedor por su ID
            $detailOrder = DetailOrder::find($id);
    
            // Verificar si el proveedor existe
            if (!$detailOrder) {
                return response()->json([
                    'status' => false,
                    'message' => 'que esta pasando ps '
                ], 404);
            }
    
            // Actualizar los campos del proveedor
            $detailOrder->update([
                'orderable_id' => $request->orderable_id,
                'orderable_type' => $request->orderable_type,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total' => $request->total,
                
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'Proveedor actualizado correctamente',
                'data' => $detailOrder
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar actualizar el proveedor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $detailOrder = DetailOrder::findOrFail($id);
            $detailOrder->delete();

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Detalle de orden eliminado correctamente'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar eliminar el detalle de la orden',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

