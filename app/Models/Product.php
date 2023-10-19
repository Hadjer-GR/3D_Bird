<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products_tables";
    protected $fillable=["title","link_lumion","user_id","cat_id","link_collada","tags","state","type","logo","file_size","link_sketshup","link_3ds"];



    public function categories(){
        return $this->belongsTo(Categorie::class,"cat_id");
   }

}
