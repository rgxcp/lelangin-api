<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadImage;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('json.header');
        $this->middleware('auth:sanctum');
        $this->middleware('owner')->only(['update', 'destroy']);
        $this->middleware('prevent.product.modified')->only(['update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        $product->user_id === $request->user()->id
            ? $product['user'] = $request->user()
            : $product->load('user');

        return response()->json([
            'status' => 'Success',
            'result' => $product->load('images')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $request
            ->user()
            ->products()
            ->create($request->except('images'));

        $product['user'] = $request->user();

        if ($request->images) {
            $product['images'] = $this->uploadImage($product, $request->images);
        }

        return response()->json([
            'status' => 'Success',
            'result' => $product
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('images'));

        $product['user'] = $request->user();

        if ($request->images) {
            $product['images'] = $this->uploadImage($product, $request->images);
        }

        return response()->json([
            'status' => 'Success',
            'result' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => 'Success'
        ]);
    }
}
