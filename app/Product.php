<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'title', 'description', 'price', 'size', 'url_image', 'statut', 'code', 'reference', 'category_id'
    ];

    

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeStatus($query){
        return $query->where('statut', 'publié');
    }

    public function scopeCode($query){
        return $query->where('code', 'soldes');
    }

    

    
}