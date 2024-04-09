<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->input('start') / $request->input('length') + 1;
            $perPage = $request->input('length', 100);

            $modelQuery = Product::query();
            $modelQuery->orderBy('id', 'desc');

            $totalRecords =  $modelQuery->count();
            $results =  $modelQuery
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();
            $data = [];
            foreach ($results as $model) {
                $data[] = [
                    'id' => $model ->id,
                    'name' => $model->name,
                    'description' => $model->description,
                    'stock' => $model->stock,
                    'type' => $model->type,
                    'created_at' => $model->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $model->updated_at->format('Y-m-d H:i:s'),
                    
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
        return view('admin\products\index');
    }

    public function show(Product $product)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar obtener los detalles del producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'type' => 'required|in:producto_terminado,materia_prima',
        ]);
        DB::beginTransaction();
        try {
            $product = Product::create($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Producto creado correctamente',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar crear el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'type' => 'required|in:producto_terminado,materia_prima',
        ]);
        DB::beginTransaction();
        try {
            $product->update($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Producto actualizado correctamente',
                'data' => $product
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar actualizar el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado correctamente'
        ], 200);
    }
}
