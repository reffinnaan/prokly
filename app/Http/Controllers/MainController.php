<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use User;

class MainController extends Controller
{
    //
	function index()
	{
		return view('login');
	}
}
