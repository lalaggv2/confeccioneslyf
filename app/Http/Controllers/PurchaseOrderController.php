<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function model()
    {
        return app()->make(PurchaseOrder::class);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start') / $request->input('length') + 1;
            $perPage = $request->input('length', 100);

            $modelQuery = PurchaseOrder::query();
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
                    'supplier_id' => $model->supplier_id,
                    'code' => $model->code,
                    'quantity' => $model->quantity,
                    'total' => $model->total,
                    'payment_method' => $model->payment_method,
                    'reference' => $model->reference,
                    'status' => $model->status,
                    'created_at' => $model->created_at,
                    'updated_at' => $model->updated_at,
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
        return view('admin.purchase_order.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'code' => 'required',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
            'payment_method' => 'required',
            'reference' => 'required',
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $purchaseOrder = $this->model()->create([
                'supplier_id' => $request->supplier_id,
                'code' => $request->code,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'payment_method' => $request->payment_method,
                'reference' => $request->reference,
                'status' => $request->status,
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Orden de compra guardada correctamente',
                'data' => $purchaseOrder
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar la orden de compra',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required',
            'code' => 'required',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
            'payment_method' => 'required',
            'reference' => 'required',
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $purchaseOrder = $this->model()->findOrFail($id);
            $purchaseOrder->update([
                'supplier_id' => $request->supplier_id,
                'code' => $request->code,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'payment_method' => $request->payment_method,
                'reference' => $request->reference,
                'status' => $request->status,
            ]);

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Orden de compra actualizada correctamente',
                'data' => $purchaseOrder
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar actualizar la orden de compra',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $purchaseOrder = $this->model()->findOrFail($id);
            $purchaseOrder->delete();

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Orden de compra eliminada correctamente'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar eliminar la orden de compra',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
