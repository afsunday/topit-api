<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BalanceCode;
use App\Models\DataNetwork;
use App\Models\DataProduct;
use App\Support\Utils;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    /**
     * 
     */
    public function bundle(Request $request)
    {        
        Utils::successResp([
            'networks' =>  DataNetwork::all(),
            'products' => DataProduct::PurchaseAblePlans()->get(),
            'balance' => BalanceCode::all()
        ]);
    }
}
