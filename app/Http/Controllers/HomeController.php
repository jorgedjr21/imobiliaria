<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $propimg = $user = $count_add = null;
        if(Auth::user()) {
            $user = Auth::user();
            $count_add = DB::table('advertisements')
                ->select(DB::raw('count(user_id) as total'))
                ->where('user_id','=',$user->id)->get();
        }

        $ads = DB::table('advertisements')
            ->join('properties', 'advertisements.property_id', '=', 'properties.id')
            ->join('addresses', 'address_id', '=', 'properties.id')
            ->paginate(6);

        if(count($ads) > 0) {
            foreach ($ads as $ad) {
                $propimg[$ad->id] = DB::table('prop_images')
                    ->where('property_id', '=', $ad->id)
                    ->get();
            }
        }


            return view('home',compact('ads','propimg','user','count_add'));

	}

}
