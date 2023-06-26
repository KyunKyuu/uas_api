<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Produk;

class StripeController extends Controller
{
    public function checkout($id){

    $produk = Produk::findOrFail($id);
       Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'idr',
                        'product_data' => [
                            'name' => $produk->nama,
                        ],
                        'unit_amount' => $produk->harga,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/index'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(){
       return redirect()->to('/');
    }
}
