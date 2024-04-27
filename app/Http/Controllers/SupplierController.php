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

        // Aplicar filtros
        if ($request->has('search') && !empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $modelQuery->where(function($query) use ($searchValue) {
                $query->where('name', 'like', "%$searchValue%")
                      ->orWhere('document_type', 'like', "%$searchValue%")
                      ->orWhere('document', 'like', "%$searchValue%")
                      ->orWhere('address', 'like', "%$searchValue%")
                      ->orWhere('phone', 'like', "%$searchValue%")
                      ->orWhere('email', 'like', "%$searchValue%");
            });
        }

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
            'recordsFiltered' => $totalRecords, // Esto se ajustará más adelante para reflejar el número de registros después del filtrado
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
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'document_type' => 'required|string|max:255',
            'document' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        try {
            // Crear un nuevo proveedor con los datos proporcionados
            $supplier = Supplier::create($validatedData);

            // Retornar una respuesta de éxito con el proveedor creado
            return response()->json([
                'status' => true,
                'message' => 'Proveedor creado correctamente',
                'data' => $supplier,
            ], 201); // 201: Created
        } catch (\Exception $e) {
            // Retornar una respuesta de error si algo sale mal
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el proveedor',
                'error' => $e->getMessage(),
            ], 500); // 500: Internal Server Error
        }
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'document_type' => 'required',
        'document' => 'required',
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ]);

    try {
        // Buscar el proveedor por su ID
        $supplier = Supplier::find($id);

        // Verificar si el proveedor existe
        if (!$supplier) {
            return response()->json([
                'status' => false,
                'message' => 'que esta pasando ps '
            ], 404);
        }

        // Actualizar los campos del proveedor
        $supplier->update([
            'document_type' => $request->document_type,
            'document' => $request->document,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Proveedor actualizado correctamente',
            'data' => $supplier
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
        $supplier = Supplier::find($id);
    
        if ($supplier) {
            $supplier->delete();
            return response()->json([
                'status' => true,
                'message' => 'provedor eliminado correctamente.'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No se encontró el cliente.'
            ], 404);
            
        }
        
    }
};    
