<?php 

namespace App\Services;

use App\Models\Discount;
use App\Models\Setting;

class TransactionService {
    public function identityDiscountPerPerson($price, $person) {
        $discounts = Discount::where('status', 1)->get();
        $shipping = Setting::where('name', 'shipping_price')->first()->value;
        $shippingPerPerson = (int)$shipping / $person;
        $list = [];
        $value = 0;
        foreach ($discounts as $discount) {
            $priceDiscount = ($price - ($price * $discount->discount_in_percent / 100)) + $shippingPerPerson;

            $list[] = $priceDiscount;
        }

        //get minimum value of discount
        $value = collect($list)->min();
        return $value;
    }
}