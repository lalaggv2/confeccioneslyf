<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

            $totalRecords = $modelQuery->count();
            $results = $modelQuery
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();
            $data = [];
            foreach ($results as $product) {
                $data[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'stock'=> $product->stock,
                    'type' => $product->type,
                    'sku' => $product->sku,
                    'barcode' => $product->barcode,
                    'size' => $product->size,
                    'color' => $product->color,
                    'material' => $product->material,
                    'location' => $product->location,
                    'price' => '$' . number_format($product->price, 2),
                    'stock' => $product->stock,
                    'notes' => $product->notes,
                    'created_at' => $product->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $product->updated_at->format('Y-m-d H:i:s'),
                    'btns' => view('helpers.buttons', ['obj' => 'app', 'id' => $product->id, 'show' => 1, 'edit' => 1, 'delete' => 1])->render(),
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
        return view('admin.products.index');
    }

    public function show(Product $product)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $product->toArray(), // Convertir el modelo a un array asociativo para incluir todos los datos
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
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'sku' => 'required',
            'barcode' => 'required',
            'size' => 'required',
            'color' => 'required',
            'material' => 'required',
            'location' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'notes' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::create($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Producto guardado correctamente',
                'data' => $product
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Hubo un error al intentar guardar el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'sku' => 'required',
            'barcode' => 'required',
            'size' => 'required',
            'color' => 'required',
            'material' => 'required',
            'location' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'notes' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
    
        try {
            // Buscar el proveedor por su ID
            $product = Product::find($id);
    
            // Verificar si el proveedor existe
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'que esta pasando ps '
                ], 404);
            }
    
            // Actualizar los campos del proveedor
            $product->update([
                
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'sku' => $request->sku,
            'barcode' => $request->barcode,
            'size' => $request->size,
            'color' => $request->color,
            'material' => $request->material,
            'location' => $request->location,
            'price' => $request->price,
            'stock' => $request->stock,
            'notes' => $request->notes,
            'created_at' => $request->created_at,
            'updated_at' => $request->update_at,
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'Proveedor actualizado correctamente',
                'data' => $product
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
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'status' => true,
                'message' => 'Producto eliminado correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'El producto no fue encontrado',
            ], 404);
        }
    }
}
