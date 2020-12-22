<?php

namespace App\Http\Controllers;

use App\DataOrder;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id){
        // $item = Transaction::with(['transaction_detail', 'travel_package', 'user'])->findOrFail($id);
        $item = Transaction::with(['travel_package'])->findOrFail($id);

        // return $item;
        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function proccess(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $request->validate([
            'adult' => 'required|not_in:0',
            'child' => 'required'
        ]);
        
        $quantity_Adult = $request->adult;
        $quantity_Child = $request->child;
        $quantity_total = $quantity_Adult + $quantity_Child;
        $price = $travel_package->price;
        $total_price = $price * $quantity_total;
        
        $transaction = Transaction::create([
            'travel_packages_id' => $travel_package->id,
            'adults' => $request->adult,
            'childs' => $request->child,
            'transaction_total' => $total_price,
            'transaction_status' => 'IN_CART',
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        $data = $request->validate([
            'title_order' => 'required',
            'first_name_order' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name_order' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone_number_order' => 'required|regex:/^[0-9]+$/',
            'email_order' => 'required|regex:/^.+@.+$/i',
            
            'title_guest.*' => 'required',
            'first_name_guest.*' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name_guest.*' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);

        $transaction = Transaction::findOrFail($id);

        $DataOrder = DataOrder::create([
            'transactions_id' => $transaction->id,
            'travel_packages_id' => $transaction->travel_packages_id,
            'title_order' => $request->title_order,
            'first_name_order' => $request->first_name_order,
            'last_name_order' => $request->last_name_order,
            'phone_number_order' => $request->phone_number_order,
            'email_order' => $request->email_order
        ]);
        
        $loopingFor_transaction_details = count($request->title_guest);
        for ($i=0; $i<$loopingFor_transaction_details; $i++){
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'title_guest' => $request->title_guest[$i],
                'first_name_guest' => $request->first_name_guest[$i],
                'last_name_guest' => $request->last_name_guest[$i]
            ]);
        }
        
        return redirect()->route('checkout-success', $transaction->id);
    }

    public function remove($id)
    {
        $item = TransactionDetail::findOrFail($id);
        
        $transaction = Transaction::with(['transaction_detail', 'travel_package'])->findOrFail($item->transactions_id);

        if($item->is_visa){
            $transaction->transaction_total -= 320000;
            $transaction->additional_visa -= 320000;
        }
        
        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function success($id){
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        
        return view('pages.success');
    }
}
