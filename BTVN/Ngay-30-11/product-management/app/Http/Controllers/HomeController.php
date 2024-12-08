<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    // view all, view one, create, update, delete
    public function index() {
        $products = Product::all();
        $totalProducts = Product::count();
        $totalSales = Product::sum("price");
        $topProducts = Product::orderBy("rating_rate", "desc")->take(5);        
        return view('dashboard.home', compact('products', 'totalProducts', 'totalSales', 'topProducts'));
    }
}
