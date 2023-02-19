<?php

namespace App\Queries;

use App\Models\Contact as ContactBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Contact
{
    /**
     * Get a user contacts for item purchase
     *
     * @param  $request
     * @method static
     */
    public static function getUserContactsForPurchase($request)
    {

        $contacts = ContactBook::select(
            'networks.network',
            'contacts.id',
            'contacts.firstname',
            'contacts.lastname',
            'contacts.phone_number',
            'contacts.status'
        )
        ->leftJoin('networks', 'networks.id', '=', 'contacts.network_id')
        ->where(function ($query) use ($request) {

            $query->where('user_id', Auth::user()->id);
        
            if($request->has('searchpb')) {
                $query->where('contacts.firstname', 'LIKE', "%$request->searchpb%")
                ->orWhere('contacts.lastname', 'LIKE', "%$request->searchpb%")
                ->orWhere('contacts.phone_number', 'LIKE', "%$request->searchpb%")
                ->orWhere('networks.network', 'LIKE', "%$request->searchpb%")
                ->orWhere('contacts.email', 'LIKE', "%$request->searchpb%");
            }
        })
        ->orderBy('contacts.id', 'desc')
        ->limit(30)
        ->get();

        return $contacts;
    }

    /**
     * Get a user contacts for item purchase
     *
     * @param  $request
     * @method static
     */
    public static function getUserContactBook($request)
    {
        return ContactBook::select('contacts.*','networks.network')
        ->leftJoin('networks', 'networks.id', '=', 'contacts.network_id')
        ->where(function ($query) use ($request) {

            $query->where('user_id', Auth::user()->id);
        
            if($request->has('qs')) {
                $query->where('contacts.firstname', 'LIKE', "%$request->qs%")
                ->orWhere('contacts.lastname', 'LIKE', "%$request->qs%")
                ->orWhere('contacts.phone_number', 'LIKE', "%$request->qs%")
                ->orWhere('networks.network', 'LIKE', "%$request->qs%")
                ->orWhere('contacts.email', 'LIKE', "%$request->qs%");
            }
        })
        ->orderBy('contacts.id', 'desc')
        ->paginate(10);
    }

    /**
     * Count user total contacts
     * 
     * @method static
     */
    public static function getUserContactsCount()
    {
        return DB::table('contacts')->where('user_id', Auth::user()->id)->count();
    }

}
