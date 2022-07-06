<?php

namespace App\Http\Controllers;

use App\Models\CentralSale;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;

class CentralSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centralSale = CentralSale::all();
        // return $centralSale;
        return view('/central-sale/index', compact('centralSale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $productCategories = ProductCategory::all();
        return view('/central-sale/create', [
            'product' => $product,
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
        $centralSale = new CentralSale();
        $centralSale->product_id = $request->product_id;
        $centralSale->product_category_id = $request->product_category_id;
        $centralSale->pay_amount = $request->pay_amount;
        $centralSale->qty = $request->qty;

        dd($request->all());
        try {
            $centralSale->save();
            return redirect('/central-sale')->with(
                'status',
                'Data berhasil di tambahkan'
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/central-sale/show', [
            'centralSale' => CentralSale::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function edit(CentralSale $centralSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentralSale $centralSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(CentralSale $centralSale)
    {
        //
    }
}
