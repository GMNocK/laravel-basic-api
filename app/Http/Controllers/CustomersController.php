<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::paginate(10);
        return response()->json([
            'data' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = Customers::create([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'dob' => $request->dob,
            'email' => $request->email
        ]);

        return response()->json([
            'data' => $customers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($customers)
    {
        $customer = Customers::find($customers);
        if ($customer) {            
            return response()->json([
                'myapi' => [
                    'success' => true,
                    'message' => 'Berhasil Menemukan Customer',
                    'data' => $customer
                ]
            ]);
        } else {
            return response()->json([
                'myapi' => [
                    "success" => false,
                    "message" => 'Data Tidak Ditemukan',
                    "data" => $customer,
                ]
            ],400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customers::find($id);
        $customer->update([
            'name' => $request->name,
            'id_number' => $request->id_number,
            'dob' => $request->dob,
            'email' => $request->email
        ]);
        return response()->json([
            'data' => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::find($id)->delete();
        return response()->json([
            'data' => $customer,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
