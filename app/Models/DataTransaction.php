<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'orderid',
        'statuscode',
        'api_status',
        'status',
        'api_remark',
        'ordertype',
        'mobilenetwork',
        'mobilenumber',
        'api_amountcharged',
        'amount_charged',
        'api_balance',
        'query_times',
        'order_date',
    ];
}
