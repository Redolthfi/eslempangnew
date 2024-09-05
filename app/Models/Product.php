<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [
        'id'
    ];
    // buat realasi
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
