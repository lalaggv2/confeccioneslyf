<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function model()
    {
        return app()->make(Customer::class);
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
                    
                    
                    'type_document' => $model->document_type,
                    'document' => $model->document,
                    'name' => '<div><label class="text-capitalize">' . $user->name . '</label><br><label class="small">' . $user->email . '</label></div>',
                    'addres' => $model->address,
                    'phone' => $model->phone,
                    
                  
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
        return view('admin.customers.index');
    }

    public function show(Customer $customer)
    {
        try {
            $customer['name'] =  $customer->user->name;
            $customer['email'] =  $customer->user->email;
            $customer['user_id'] =  $customer->user->id;
            $customer['contacts'] =  $customer->contacts;
            $customer['status'] = (bool) $customer->status;
            unset( $customer['user']);
            return response()->json([
                'status' => true,
                'data' =>  $customer,
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
            'document_type' => 'required',
            'document' => 'required',
            'name' => 'required',
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
            $customer = $this->model()->create([
                
                'document_type' => $request->document_type,
                'document' => $request->document,
                'address' => $request->address,
                'phone' => $request->phone,

                
            ]);
            if ($request->contacts) {
                foreach ($request->contacts as $contact) {
                    $this->contactModel()->create([
                        ' customer_id' =>  $customer->id,
                        'name' => $contact['name'],
                        
                        
                    ]);
                }
            }
            $data  =  $customer->load('user', 'contacts');
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
        $empleados =  customer::find($id);
        $empleados->delete();
        return redirect()->back();
    }
}
