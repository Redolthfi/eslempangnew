<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [
        'id'
    ];

    protected function casts(): array
    {
        return [
            'orders' => 'array'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}