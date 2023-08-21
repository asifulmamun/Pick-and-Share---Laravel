<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'pickup',
        'destination',
        'journeyDate',
        'journeyTime',
        'personCount',
        'journeyDetails',
        'created_at',
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}