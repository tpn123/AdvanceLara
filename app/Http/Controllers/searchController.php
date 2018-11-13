<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class searchController extends Controller
{
	public function index(Request $request) {
		if($request->has('search')){
			$users = User::search($request->get('search'))->get();
		}else{
			$users = null;
		}
//		$users= User::search($search)->get();
		return view( 'search',compact('users') );
	}
}
