<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return ProductResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $newproduct = new Product();
        $newproduct->seller_id = 1;
        $newproduct->product_name = $request->validated()['product_name'];
        $newproduct->product_price = $request->validated()['product_price'];
        $newproduct->type_id = $request->validated()['type_id'];
        $newproduct->product_img = $request->validated()['product_img'];
        $newproduct->product_description = $request->validated()['product_description'];
        $newproduct->save();
        return new ProductResource($newproduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return new Product($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = Product::findOrFail($id);
        $data->product_name = $request->validated()['product_name'];
        $data->product_price = $request->validated()['product_price'];
        $data->type_id = $request->validated()['type_id'];
        $data->product_img = $request->validated()['product_img'];
        $data->product_description = $request->validated()['product_description'];
        $data->save();
        return new ProductResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id)->delete();
    }
}
