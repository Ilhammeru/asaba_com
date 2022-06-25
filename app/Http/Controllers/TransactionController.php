<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Models\Users;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Store transaction to database
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TransactionService $service) {
        $rules = [
            'orders.*.name' => 'required',
            'orders.*.menus' => 'required_with:orders.*.name',
            'orders.*.menus.*.item' => 'required',
            'orders.*.menus.*.qty' => 'required',
        ];
        $messageRules = [
            'orders.*.name.required' => 'Nama Customer Harus Diisi',
            'orders.*.menus.required' => 'Menu Harus Diisi',
            'orders.*.menus.*.item.required' => 'Menu Harus Diisi',
            // 'orders.*.menus.*.qty.required' => 'Jumlah Makanan Harus Diisi',
        ];
        $validation = Validator::make(
            $request->all(),
            $rules,
            $messageRules
        );
        if ($validation->fails()) {
            $error = $validation->errors()->all();
            return sendResponse(
                ['error' => $error],
                'VALIDATION_FAILED',
                500
            );
        }

        try {
            $data = $request->orders;
            $data = collect($data);
            $person = $data->count();
            $data = $data->map(function($d) use($service, $person) {
                $d['name'] = Users::find($d['name'])->name;
                $d['menus'] = array_values($d['menus']);
                $menus = $d['menus'];
                $prices = [];
                for ($a = 0; $a < count($menus); $a++) {
                    $prices[] = $menus[$a]['item'] * $menus[$a]['qty'];
                }
                $discount = $service->identityDiscountPerPerson(array_sum($prices), $person);
                $d['pay'] = $discount;
                $d['total'] = array_sum($prices);
                return $d;
            });
    
            $view = view('transaction._detail-pay', compact('data'))->render();
            return sendResponse(['view' => $view]);
        } catch (\Throwable $th) {
            return sendResponse(
                ['error' => $th->getMessage()],
                'FAILED',
                500
            );
        }
    }
}
