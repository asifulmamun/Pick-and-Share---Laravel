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
        'contracted_id',
        'created_at',
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    // contract.id relation book_requests.contracted_id
    // public function contracts()
    // {
    //     return $this->belongsTo(Contracts::class, 'contructed_id');
    // }

    // public function contract()
    // {
    //     return $this->hasOne('App\Models\Contract');
    // }
}