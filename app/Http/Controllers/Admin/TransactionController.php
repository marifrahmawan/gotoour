<?php

namespace App\Http\Controllers\Admin;

use App\DataOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Transaction;
use App\Http\Requests\Admin\TransactionRequest;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Transaction::with(['transaction_detail', 'travel_package', 'data_order'])->get();
        $items = DataOrder::with(['transaction', 'travel_package'])->get();
        
        // return $items;
        return view('pages.admin.transaction.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('pages.admin.transaction.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with(['transaction_detail', 'travel_package', 'data_order'])->findOrFail($id);

        // return $item;
        return view('pages.admin.transaction.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::with(['data_order'])->findOrFail($id);

        // return $item;
        return view('pages.admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_transactions = Transaction::findOrFail($id);
        $destroy_transactions->delete();

        DataOrder::where('transactions_id', '=', $id)->update(['deleted_at' => Carbon::now()]);

        TransactionDetail::where('transactions_id', '=', $id)->update(['deleted_at' => Carbon::now()]);
        // $destroy_transaction_details->delete();

        return redirect()->route('transaction.index');
    }
}
