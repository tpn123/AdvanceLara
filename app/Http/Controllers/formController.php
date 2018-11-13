<?php

namespace App\Http\Controllers;

use App\Http\Requests\formValidate;
use Illuminate\Http\Request;

class formController extends Controller
{
	public function index() {
		return view( 'form' );
	}

	public function store(formValidate $request) {

	}
}
