<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
   public function index(){
      $loadProducts=Product::with('categories')->get()->toJson();

      return Inertia::render('Admin/products/index',compact('loadProducts'));

   }


}
