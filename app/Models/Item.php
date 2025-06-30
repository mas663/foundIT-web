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
    'category',
    'details',
    'image',
    'status',
];
}
