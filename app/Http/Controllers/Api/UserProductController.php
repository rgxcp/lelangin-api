<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        return response()->json([
            'status' => 'Success',
            'result' => $user
                ->products()
                ->with('images')
                ->orderBy($request->order_by ?? 'id', $request->direction ?? 'desc')
                ->paginate($request->paginate ?? 30)
        ]);
    }
}
