<?php

namespace App\Http\Controllers;

use App\Models\CentralPurchase;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CentralPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getProduct = CentralPurchase::with('product', 'productCategory')->get();
        // return $getProduct;
        return view('/central-purchase/index', compact('getProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getProduct = Product::all();
        $getProductCategories = ProductCategory::all();
        return view('/central-purchase/create', [
            'getProduct' => $getProduct,
            'getProductCategories' => $getProductCategories,
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
        DB::beginTransaction();

        try {
            $centralPurchase = new CentralPurchase();
            $centralPurchase->product_id = $request->product_id;
            $centralPurchase->product_category_id = $request->product_category_id;
            $centralPurchase->pay_amount = $request->pay_amount;
            $centralPurchase->qty = $request->qty;
            $centralPurchase->save();

            $getProduct = Product::select('stock')->where('id', $centralPurchase->product_id)->get();
            $finalData = $getProduct[0]->stock + ($request->qty);

            $get_id = $centralPurchase->product_id;

            $updateStock = Product::find($get_id);
            $updateStock->stock = $finalData;
            $updateStock->save();
            DB::commit();
            return redirect('/central-sale')->with(
                'status',
                'Data berhasil di tambahkan'
            );
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(
                [
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ],
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
