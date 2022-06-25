<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display transaction page to order
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pageTitle = 'Transaksi';
        $customer = Users::all();
        $menu = Product::all();
        return view('transaction.index', compact('pageTitle', 'customer', 'menu'));
    }
}
