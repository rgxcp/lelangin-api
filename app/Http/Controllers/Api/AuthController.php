<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('json.header');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->except('device'));

        return response()->json([
            'status' => 'Success',
            'result' => $user
                ->append('token')
                ->makeVisible('email')
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->except('device'))) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'status' => 'Success',
            'result' => $request
                ->user()
                ->append('token')
                ->makeVisible('email')
        ]);
    }
}
