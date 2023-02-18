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
        'transaction_amount',
        'wallet_balance',
        'method',
        'gateway_ref',
        'transaction_ref',
        'description',
        'entry',
        'status',
        'date',
    ];
}
