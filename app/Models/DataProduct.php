<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<string>
     */
    protected $fillable = [
        'network_name',
        'provider_id',
        'product_code',
        'product_id',
        'plan_volume',
        'product_name',
        'product_amount',
        'product_charge_amount',
        'status',
    ];

    /**
     * Scope to only include shipper's shipment.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePurchaseAblePlans($query)
    {
        return $query->where('status', true)->orderBy('provider_id', 'asc');
    }
}
