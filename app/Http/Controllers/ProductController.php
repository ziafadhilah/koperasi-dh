<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productCategory')->get();
        return view('/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('/product/create', [
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'size' => 'required',
            'stock' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
        ]);
        $product = new Product($request->all());

        try {
            $product->save();
            return redirect('/product')->with('status', 'Data berhasil di tambahkan');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);

        return view('/product/show', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategories = ProductCategory::all();
        $products = Product::findOrFail($id);
        return view('/product/edit', [
            'products' => $products,
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'size' => 'required',
            'stock' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
        ]);

        $product = Product::find($id);
        $product->product_code = $request->product_code;
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->size = $request->size;
        $product->stock = $request->stock;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;

        try {
            $product->save();
            return redirect('/product')->with('status', 'Berhasil di ubah');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $id)
    {
        Product::destroy($id->id);
        return redirect('/product')->with('status', 'Data telah terhapus!');
    }
}
