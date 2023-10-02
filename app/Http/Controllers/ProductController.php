<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
   public function index(){
      $products=Product::with('categories')->paginate(4);

      return Inertia::render('Admin/products/index',compact('products'));

   }


}
