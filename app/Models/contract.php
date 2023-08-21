<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;
use App\Models\BookRequest;

class contract extends Model
{
    use HasFactory;


    protected $fillable = [
        'book_request_id',
        'requster_user_id',
        'driver_user_id',
        'driver_request_amount',
        'contract_amount',
        'currency',
        'contracted_date',
        'status',
    ];

    // Relation
    public function bookRequest()
    {
        return $this->belongsTo(BookRequest::class, 'book_request_id');
    }

    public function requester()
    {
        return $this->belongsTo(BookRequest::class, 'requester_user_id', 'user_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_user_id', 'user_id');
    }

}
