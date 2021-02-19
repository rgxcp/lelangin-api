<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('json.header');
        $this->middleware('auth:sanctum');
        $this->middleware('owner')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'status' => 'Success',
            'result' => $request
                ->user()
                ->addresses()
                ->orderBy($request->order_by ?? 'label', $request->direction ?? 'asc')
                ->paginate($request->paginate ?? 30)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        $address = $request
            ->user()
            ->addresses()
            ->create($request->all());

        return response()->json([
            'status' => 'Success',
            'result' => $address
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateAddressRequest  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());

        return response()->json([
            'status' => 'Success',
            'result' => $address
        ]);
    }
}
