<?php

// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders for the authenticated user
        $orders = Order::with('order_details.product')->where('user_id', Auth::id())->get();
//        dd($orders);
        return view('user.userorder', compact('orders'));
    }

    public function customizedOrders()
    {

//        $customizedOrders = Order::with('order_details.product')
//            ->where('user_id', Auth::id())
//            ->get();
//
//        return view('user.customizedorder', compact('customizedOrders'));

        $images = \App\Models\GeneratedImage::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.customizedorder', compact('images'));
    }

}

