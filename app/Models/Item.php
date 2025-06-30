<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'date',
    'location',
    'description',
    'kontak',
    'category',
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

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
