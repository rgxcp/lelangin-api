<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return response()->json([
            'status' => 'Success',
            'result' => $user->id === $request->user()->id
                ? $user
                ->makeVisible('email')
                ->loadCount([
                    'accounts',
                    'addresses',
                    'products',
                    'sellerInvoices',
                    'buyerInvoices'
                ])
                : $user->loadCount('products')
        ]);
    }
}
