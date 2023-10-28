<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products_tables";
    protected $fillable=["title","link_lumion","user_id","cat_id","link_collada","tags","state","type","logo","file_size","link_sketshup","link_3ds"];

    public function scopeFilter($query ,array $filters){

        // if($filters['categ'] ?? false){
        //     $categ=request('categ');
        //     $query->orWhereHas('categories',function ($query)use($categ)
        //     {
        //         $query->where('categories.name','Like','%'.$categ.'%');
        //     });
        // }
        if($filters['categ'] ?? false){
            $sub_categ="";
            $categ="";
            if(request('sub_categ')){
                $sub_categ=request('sub_categ');
            }
            if(request('categ')){
                $categ=request('categ');

            }
            $query->orWhereHas('categories',function ($query)use($sub_categ,$categ)
            {
                $query->where('categories.name','Like','%'.$categ.'%');

                $query->where('categories.sub_categorie','Like','%'.$sub_categ.'%');


            });
        }
        if($filters['search_product'] ?? false){
          $query->where("title","like","%" .request('search_product') ."%")
                ->orWhere("state","like","%" .request('search_product') ."%")
                ->orWhere("tags","like","%" .request('search_product') ."%")

                ->orWhere("file_size","like","%" .request('search_product') ."%");
        }
       



      }

    public function categories(){
        return $this->belongsTo(Categorie::class,"cat_id");
   }

}
