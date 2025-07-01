<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'name',
    'date',
    'location',
    'description',
    'kontak',
    'category_id',
    'details',
    'image',
    'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
