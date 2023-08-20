<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'present_address',
        'permanent_address',
        'license_number',
        'license_expire_date', // New column
        'nid',
        'date_of_birth',
        'status',
    ];

    // Relation with users table user id
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
