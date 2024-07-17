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
        $orders = Order::where('id', Auth::id())->get();
        return view('user.userorder', compact('orders'));
    }

}

