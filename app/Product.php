<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = ['name', 'price','description','category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
