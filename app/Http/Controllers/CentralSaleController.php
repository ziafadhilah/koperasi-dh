<?php

namespace App\Http\Controllers;

use App\Exports\CentralSaleExport;
use App\Models\CentralSale;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ReturSale;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CentralSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getProduct = CentralSale::with('product', 'productCategory')->get();
        // return $getProduct;
        return view('/central-sale/index', compact('getProduct'));
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
        return view('/central-sale/create', [
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
            $centralSale = new CentralSale();
            $centralSale->product_id = $request->product_id;
            $centralSale->product_category_id = $request->product_category_id;
            $centralSale->pay_amount = $request->pay_amount;
            $centralSale->qty = $request->qty;
            $centralSale->save();

            $getProduct = Product::select('stock')->where('id', $centralSale->product_id)->get();
            $finalData = $getProduct[0]->stock - ($request->qty);

            $get_id = $centralSale->product_id;

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
    public function edit($id)
    {
        //code
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //code
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CentralSale  $centralSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        CentralSale::destroy($id->id);
        return redirect('/central-sale')->with('status', 'Data telah terhapus!');
    }

    public function exportPdf()
    {
        $centralSale = CentralSale::with('product', 'productCategory')->get();

        $pdf = PDF::loadView('/central-sale/pdf', ['centralSale' => $centralSale]);
        return $pdf->stream();
    }



    public function retur($id)
    {
        $returSale = CentralSale::findOrFail($id);
        return $returSale;
        return view('/central-sale/retur', [
            'returSale' => $returSale
        ]);
    }

    public function returSale(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $statusActive = CentralSale::findOrFail($id);
            $statusActive->status = 0;
            $statusActive->save();

            $retur = new ReturSale();
            $retur->central_sale_id = $request->central_sale_id;
            $retur->stock = $request->qty;
            $retur->type = 'Retur Penjualan';
            $retur->save();

            $getProductId = $request->product_id;
            $retur_qyt = $request->qty;
            $product = Product::findOrFail($getProductId);
            $stockdb = $product['stock'];
            $int_stockdb = (int)$stockdb;
            $product->stock = $int_stockdb + $retur_qyt;
            $product->save();

            DB::commit();
            return redirect('/central-sale')->with(
                'status',
                'Retur Berhasil'
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
}
