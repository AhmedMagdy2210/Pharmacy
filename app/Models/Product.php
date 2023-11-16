<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity', 'photo', 'category_id'];
    protected $with = ['category'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
