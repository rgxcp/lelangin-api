<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventProductModifiedWhenHasWinner
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
        $hasWinner = $request->product->invoice()->exists();

        if ($hasWinner) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Forbidden'
            ], 403);
        }

        return $next($request);
    }
}
