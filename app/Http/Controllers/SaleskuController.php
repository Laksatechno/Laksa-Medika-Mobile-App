<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use App\Models\Invoice;
use App\Models\Invoiceppn;
use App\Models\Invoice_customer;

use App\Models\Product;

use App\Models\Invoice_detail;
use App\Models\Invoice_detailppn;
use App\Models\ProductDetail;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;

class SaleskuController extends Controller
{
    //
    public function index(){
        //views salesku/index.php
        $invoice = Invoice::with(['user', 'customer', 'detail'])
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'DESC')
        ->get(); // Jangan menambahkan parameter ke metode get()
        $invoiceppns  = Invoiceppn::with(['user', 'customer', 'detailppn'])
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'DESC')
        ->get();
        $invoicecustomer  = Invoice_customer::with(['user', 'detail_customer'])->
        where('marketing', Auth::user()->name)
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('salesku.index', compact('invoice', 'invoiceppns', 'invoicecustomer'));
    }
}
