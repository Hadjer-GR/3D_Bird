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
    return Inertia::render('Delivery_address/create');
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

// public function store(Request $request): RedirectResponse
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
//      Delivery_address::create($validated);
//      return Redirect::route('delivery_address.index');

// }



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
