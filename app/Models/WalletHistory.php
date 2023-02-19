<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    use HasFactory;

    /**
     * The attribute that are mass assignble
     */
    protected $fillable = [
        'user_id',
        'item_image',
        'transaction_ref',
        'amount',
        'description',
        'entry',
        'status',
        'transaction_date',
    ];
}
