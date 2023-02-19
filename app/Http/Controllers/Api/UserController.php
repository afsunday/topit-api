<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataTransaction;
use App\Queries\DataProductQuery;
use App\Queries\WalletQuery;
use App\Support\Utils;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get user wallet history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataHistory(Request $request)
    {
        $history = $request->user()->dataTransactions->latest()->simplePaginate();

        return Utils::successResp($history);
    }

    /**
     * Get user wallet history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function walletHistory(Request $request)
    {
        $history = WalletQuery::getUserWalletHistory($request, $request->user()->id, $request->limit ?? null);

        return Utils::successResp($history);
    }
}
