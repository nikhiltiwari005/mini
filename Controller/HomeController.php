<?php

namespace App\Controller;

use App\Core\Request;
use App\Core\Config;
use App\Model\User;

class HomeController extends Controller
{

	public function index(Request $request)
	{
		$greet = 'Hi there!!';
		$userObj = new User;
		$users = $userObj->all();
		return view('index', ['greet' => $greet, 'users' => $users]);
	}

}


