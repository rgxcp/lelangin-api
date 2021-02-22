<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
        $this->middleware('owner')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::asSeller()
            ->orWhere
            ->asBuyer()
            ->with('product:id,name')
            ->orderBy($request->order_by ?? 'id', $request->direction ?? 'desc')
            ->paginate($request->paginate ?? 30);

        return response()->json([
            'status' => 'Success',
            'result' => $invoices
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return response()->json([
            'status' => 'Success',
            'result' => $invoice->load([
                'seller',
                'buyer',
                'address',
                'product.account.bank',
                'product.images' => function ($query) {
                    $query->take(1);
                }
            ])
        ]);
    }
}
