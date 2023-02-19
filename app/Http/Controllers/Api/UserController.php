<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\Utils;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get user wallet history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function walletHistory(Request $request)
    {
        $history = $request->user()->transactions()->latest()->simplePaginate();

        return Utils::successResp($history);
    }

    /**
     * Get user wallet history
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function peers(Request $request)
    {
        $peers = $request->user()->peers()->latest()->simplePaginate(15);

        return Utils::successResp($peers);
    }
}
