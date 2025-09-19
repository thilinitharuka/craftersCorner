<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\GeneratedImage;
use App\Models\Order;
use App\Models\CustomizedProduct;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total customers
        $totalCustomers = Customer::count();

        // Today Orders (orders created today)
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();

        $totalProducts = Product::count();

        // Customer requests (customized products count)
        $customerRequests = GeneratedImage::count();

        return view('admin.index', compact(
            'totalCustomers',
            'todayOrders',
            'totalProducts',
            'customerRequests'
        ));
    }
}
