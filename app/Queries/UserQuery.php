<?php

namespace App\Queries;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserQuery
{
    /**
     * Get list of all users with pagination
     *
     * @param $request
     * @return Object
     */
    public static function getAllUsers($request)
    {
        $users = DB::table('users')
            ->select('users.*', 'wallets.amount', 'wallets.id as wallet_id')
            ->leftJoin('wallets', 'wallets.user_id', '=', 'users.id')
            ->where(function ($query) use ($request) {

                if ($request->has('status')) {
                    $query->where('users.status', $request->boolean('status'));
                }

                if ($request->has('role')) {
                    $query->where('users.user_type', $request->role);
                }

                if ($request->has('search')) {
                    $query->where('users.firstname', 'LIKE', "%$request->search%")
                        ->orWhere('users.lastname', 'LIKE', "%$request->search%")
                        ->orWhere('users.account_number', 'LIKE', "%$request->search%")
                        ->orWhere('users.account_name', 'LIKE', "%$request->search%")
                        ->orWhere('users.phone', 'LIKE', "%$request->search%")
                        ->orWhere('users.email', 'LIKE', "%$request->search%");
                }

                if ($request->has('greater')) {
                    $query->where('wallets.amount', '>', $request->greater);
                }

                if ($request->has('lesser')) {
                    $query->where('wallets.amount', '<', $request->lesser);
                }
            })
            ->orderBy('users.id', 'asc')
            ->paginate(20);

        return $users;
    }
}
