<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
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
                ->accounts()
                ->with('bank')
                ->orderBy($request->order_by ?? 'holder', $request->direction ?? 'asc')
                ->paginate($request->paginate ?? 30)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        $account = $request
            ->user()
            ->accounts()
            ->create($request->all());

        return response()->json([
            'status' => 'Success',
            'result' => $account->load('bank')
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateAccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());

        return response()->json([
            'status' => 'Success',
            'result' => $account->load('bank')
        ]);
    }
}
