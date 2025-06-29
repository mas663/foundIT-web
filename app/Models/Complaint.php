<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'email',
        'subject',
        'message',
        'screenshot',
        'status',
    ];

    /**
     * Relasi ke model User (opsional tapi sangat direkomendasikan).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
