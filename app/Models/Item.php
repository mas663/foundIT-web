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
}
