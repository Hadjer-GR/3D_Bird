<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Redirect;


class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::get();
        return Inertia::render('Admin/blogs/index',compact('blogs'));
    }



    public function create(){
        return Inertia::render('Admin/blogs/create');
    }


    public function show(Blog $blog)
    {
        return Inertia::render('Admin/blogs/show',compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return Inertia::render('Admin/blogs/edit',compact('blog'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            "title"=>'required',
            "content"=>'required',
            "content_html"=>'required',

         ]);
          Blog::create($validated);
         return Redirect::route('blogs.index')->with('message','Article created seccusfully');

    }
    public function update(Request $request,Blog $blog)
{
    $validated=$request->validate([
        "title"=>'required',
        "content"=>'required',
        "content_html"=>'required',

     ]);
     $blog->update($validated);
     return Redirect::route('blogs.index')->with('message','Article updated seccusfully');

}

/**
 * Remove the specified resource from storage.
 */
    public function destroy(Blog $blog)
    {
         $blog->delete();
        return Redirect::route('blogs.index')->with('message','Article deleted seccusfully');

    }

}
