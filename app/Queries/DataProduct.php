<?php

namespace App\Queries;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataProduct
{
    /**
     * Get all data plans with complete rows.
     *
     * @param $request
     * @return Array
     */
    public static function getCompleteDataProduct($request)
    {
        $pagingLength = 20;
        if($request->has('paging')) {
            $pagingLength = (int) $request->paging;
        }

        $dataProducts = DB::table('data_products')
            ->where(function ($query) use ($request) {

                if ($request->has('status')) {
                    $query->where('data_products.status', $request->boolean('status'));
                }

                if ($request->has('network')) {
                    $query->where('data_products.provider_id', $request->network);
                }

                if ($request->has('search')) {
                    $query->where('data_products.network_name', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.product_code', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.product_id', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.product_name', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.product_charge_amount', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.created_at', 'LIKE', "%$request->search%")
                        ->orWhere('data_products.updated_at', 'LIKE', "%$request->search%");
                }
            })
            ->orderBy('data_products.provider_id', 'asc')
            ->paginate($pagingLength);

        return $dataProducts;
    }

    /**
     * Get all data plans with complete rows.
     *
     * @param $request
     * @return Array
     */
    public static function getPurchaseAblePlans()
    {
        $dataProducts = DB::table('data_products')
            ->select(
                'data_products.id',
                'data_products.network_name',
                'data_products.provider_id',
                'data_products.product_id',
                'data_products.product_name',
                'data_products.product_charge_amount'
            )
            ->where('status', true)
            ->orderBy('data_products.provider_id', 'asc')
            ->get();

        return $dataProducts;
    }

    /**
     * Get all data plans with complete rows.
     *
     * @param $request
     * @method static
     */
    public static function getPlanById($planId)
    {
        return DB::table('data_products')->where('data_products.id', $planId)->first();
    }

    /**
     * Get selected column of user data transaction
     *
     * @param $request
     * @param $userid
     * @method static
     */
    public static function getUserDataTransaction($request)
    {
        return DB::table('data_transactions')
        ->select(
            'id',
            'orderid',
            'status',
            'ordertype',
            'mobilenetwork',
            'mobilenumber',
            'amount_charged',
            'order_date'
        )
        ->where('user_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->paginate(10);
    }

    /**
     * Get complete data transactions with user table relation.
     *
     * @param $request
     * @method static
     * @return Object
     */
    public static function getAllDataTransactions($request)
    {
        return DB::table('data_transactions')
        ->select('data_transactions.*', 'users.firstname', 'users.lastname', 'users.email', 'users.phone', 'wallets.amount as wallet_balance')
        ->leftJoin('users', 'data_transactions.user_id', '=', 'users.id')
        ->leftJoin('wallets', 'users.id', '=', 'wallets.user_id')
        ->where(function ($query) use ($request) {

            if ($request->has('user')) {
                $query->where('data_transactions.user_id', $request->user);
            }

            if ($request->has('statuscode')) {
                $query->where('data_transactions.statuscode', $request->statuscode);
            }

            if ($request->has('search')) {
                $query->where('data_transactions.orderid', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.statuscode', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.api_status', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.status', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.api_remark', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.ordertype', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.mobilenetwork', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.mobilenumber', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.api_amountcharged', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.amount_charged', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.api_balance', 'LIKE', "%$request->search%")
                    ->orWhere('data_transactions.order_date', 'LIKE', "%$request->search%");
            }
        })
        ->orderBy('data_transactions.id', 'desc')
        ->paginate(20);
    }

    /**
     * Get all data plans with complete rows.
     *
     * @param $request
     * @method static
     */
    public static function getDataBalanceCode()
    {
        return DB::table('data_balance_code')->get();
    }
}
