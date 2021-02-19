<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $model = $request->route()->parameterNames[0];

        $owner = $request->$model->user_id === $request->user()->id;

        if (!$owner) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Forbidden'
            ], 403);
        }

        return $next($request);
    }
}
