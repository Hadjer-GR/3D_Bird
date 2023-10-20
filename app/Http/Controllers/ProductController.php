<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
   public function index(){

      $products=Product::with('categories')->paginate(4);
      return Inertia::render('Admin/products/index',['products'=>$products]);

   }

   public function create(){
    $loadCategories= Categorie::select('name')->distinct('name')->get();
    $subCategories=Categorie::get();
    return Inertia::render('Admin/products/create',compact('loadCategories','subCategories'));
}


public function show(Product $product)
{
    $selected_cat=Categorie::find($product->cat_id);

    return Inertia::render('Admin/products/show',compact('product','selected_cat'));

}

public function edit(Product $product)
{
    $loadCategories= Categorie::select('name')->distinct('name')->get();
    $subCategories=Categorie::get();
    $selected_cat=Categorie::find($product->cat_id);
    return Inertia::render('Admin/products/edit',compact('loadCategories','subCategories','product','selected_cat'));
}

/**
 * Store a newly created resource in storage.
 */

public function store(Request $request)
{
    $validated=$request->validate([
        "title"=>'required',
        "tags"=>'required',
        "state"=>'required',
        "file_size"=>'required',
        "link_sketshup"=>'required_without_all:link_3ds,link_collada,link_lumion',
        "link_collada"=>'required_without_all:link_3ds,link_sketshup,link_lumion',
        "link_3ds"=>'required_without_all:link_sketshup,link_collada,link_lumion',
        "link_lumion"=>'required_without_all:link_3ds,link_collada,link_sketshup',
        "cat_id"=>'required',
     ]);
     if($request->hasFile('img')){
        $validated['logo']=$request->file('img')->store('logos','public');
    }
     $validated['user_id']=auth()->id();
      Product::create($validated);
     return Redirect::route('product.index')->with('message','Model created seccusfully');

}



/**
 * Update the specified resource in storage.
 */

public function update(Request $request,Product $product)
{
    $validated=$request->validate([
        "title"=>'required',
        "tags"=>'required',
        "state"=>'required',
        "file_size"=>'required',
        "link_sketshup"=>'required_without_all:link_3ds,link_collada,link_lumion',
        "link_collada"=>'required_without_all:link_3ds,link_sketshup,link_lumion',
        "link_3ds"=>'required_without_all:link_sketshup,link_collada,link_lumion',
        "link_lumion"=>'required_without_all:link_3ds,link_collada,link_sketshup',
        "cat_id"=>'required',
     ]);
     if($request->hasFile('img')){
        $validated['logo']=$request->file('img')->store('logos','public');
    }
     $validated['user_id']=auth()->id();
     $product->update($validated);
     return Redirect::route('product.index')->with('message','Model updated seccusfully');

}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Product $product)
{

     $product->delete();
    return Redirect::route('product.index')->with('message','Model deleted seccusfully');

}


}
