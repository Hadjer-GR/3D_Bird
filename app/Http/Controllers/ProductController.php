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

/**
 * Display  specific delivery_address  of the user.
 */
// public function show(Delivery_address $delivery_address)
// {
//     return Inertia::render('delivery_address/show', [
//         'address' => $delivery_address,

//     ]);
// }

// public function edit(Delivery_address $delivery_address)
// {
//     return Inertia::render('Delivery_address/edit', [
//         'address' => $delivery_address->toJson(),


//     ]);
// }

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
     return Redirect::route('product.index');

}



/**
 * Update the specified resource in storage.
 */

// public function update(Request $request,  Delivery_address $delivery_address)
// {
//     $validated=$request->validate([
//         "name"=>'required',
//         "address_line_1"=>'required',
//         "address_line_2"=>'required',
//         "address_line_3"=>['required'],
//         "state"=>'required',
//         "zip_code"=>'required',
//         "contact_number"=>'required'
//      ]);
//      $validated['user_id']=auth()->id();
//      $delivery_address->update($validated);
//      return Redirect::route('delivery_address.index');

// }

/**
 * Remove the specified resource from storage.
 */
public function destroy(Product $product)
{

     $product->delete();
    return Redirect::route('product.index')->with('message','Model deleted seccusfully');

}


}
