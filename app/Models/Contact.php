<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'network_id',
        'firstname',
        'lastname',
        'phone_number',
        'email',
        'status',
    ];
}
