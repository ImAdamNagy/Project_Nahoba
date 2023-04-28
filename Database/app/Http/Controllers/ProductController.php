<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\EnableRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Connection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }
    public function enable()
    {
        $products = Product::where("product_enable", true)->get();
        return ProductResource::collection($products);
    }
    public function disable()
    {
        $products = Product::where("product_enable", false)->get();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $file = $request->file('img');
        $file_name = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);

        $newproduct = new Product($request->validated());
        $newproduct->product_enable = false;
        $newproduct->seller_id = Auth::id();
        $newproduct->product_img = $file_name;
        $newproduct->save();

        return new ProductResource($newproduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function userproducts($id){
        $data = Product::where('seller_id', $id)->where("product_enable", true)->get();
        return ProductResource::collection($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update($request->validated());
        $product->save();
        return new ProductResource($product);
    }
    
    public function updateEnable(EnableRequest $request, Product $product)
    {
        $product->update($request->validated());
        $product->save();
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
    public function deleteUsersProducts($userid){
       $data = Product::where('seller_id', $userid)->get();

       for ($i=0; $i < count($data); $i++) { 
            $data[$i]->delete();
       }
       
    }
}