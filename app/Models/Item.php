<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
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
