<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Queries\WalletQuery;
use App\Models\Contact;
use App\Support\Utils;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Get user wallet history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function history(Request $request)
    {
        $history = WalletQuery::getUserWalletHistory($request, $request->user()->id, 15);

        return Utils::successResp($history);
    }
}
