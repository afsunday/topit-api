<?php

namespace App\Queries;

use App\Models\WalletHistory;

class WalletQuery
{
    /**
     * Get user minimum wallet history for dashboard preview
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Eloquent\Database\Collection
     */
    public static function getUserWalletHistory($request, int $userId, int $limit = null)
    {
        return WalletHistory::select(
            'wallet_histories.*',
            'data_transactions.oderid as dt_oderid',
            'data_transactions.statuscode AS dt_statuscode',
            'data_transactions.status AS dt_status',
            'data_transactions.ordertype AS dt_ordertype',
            'data_transactions.mobilenetwork AS dt_mobilenetwork',
            'data_transactions.mobilenumber AS dt_mobilenumber',
            'data_transactions.amount_charged AS dt_amount_charged',
            'data_transactions.order_date AS dt_order_date',
        )
        ->leftJoin('data_transactions', 'wallet_histories.data_transaction_id', 'data_transactions.id')
        ->where('wallet_histories.user_id', $userId)
        ->orderBy('id', 'desc')
        ->when(!is_null($limit), function ($query) use ($limit) {
            $query->limit($limit);
        })
        ->when(true, function ($query) use ($limit) {
            is_null($limit)
                ?  $query->simplePaginate()
                :  $query->get();
        });
    }

    /**
     * Get all wallet transaxtion with associated user
     *
     * @param $request
     * @return Object
     */
    public static function getWalletTransactions($request)
    {
        return WalletHistory::select(
            'wallet_history.*',
            'users.firstname',
            'users.lastname',
            'users.email',
            'users.phone',
            'wallets.id as user_wallet_id',
            'wallets.amount as current_balance'
        )
        ->leftJoin('users', 'wallet_history.user_id', '=', 'users.id')
        ->leftJoin('wallets', 'users.id', '=', 'wallets.user_id')
        ->where(function ($query) use ($request) {

            if ($request->has('user')) {
                $query->where('wallet_history.user_id', $request->user);
            }

            if ($request->has('status')) {
                $query->where('wallet_history.status', $request->status);
            }

            if ($request->has('entry')) {
                $query->where('wallet_history.status', $request->entry);
            }

            if ($request->has('search')) {
                $query->where('wallet_history.amount', 'LIKE', "%$request->search%")
                ->orWhere('wallet_history.ref_id', 'LIKE', "%$request->search%")
                ->orWhere('wallet_history.method', 'LIKE', "%$request->search%")
                ->orWhere('wallet_history.description', 'LIKE', "%$request->search%")
                ->orWhere('wallet_history.status', 'LIKE', "%$request->search%")
                ->orWhere('wallet_history.date', 'LIKE', "%$request->search%")
                ->orWhere('users.firstname', 'LIKE', "%$request->search%")
                ->orWhere('users.lastname', 'LIKE', "%$request->search%")
                ->orWhere('users.email', 'LIKE', "%$request->search%");
            }
        })
        ->orderBy('wallet_history.id', 'desc')
        ->paginate(20);
    }
}
