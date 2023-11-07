<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::with('categories')->where("state","public page")->filter(request(['search_product','categ','sub_categ']))->paginate(4);
        return Inertia::render('General',['products'=>$products]);

    }
}
