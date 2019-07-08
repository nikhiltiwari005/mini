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
		$users = [];
		// $users = $userObj->select('SELECT * FROM users');
		// $userObj->insert('INSERT INTO users (name) value("sakshi")');
		// $users = User::select('SELECT * FROM users');
		// User::raw('INSERT INTO users (id, name) value(3, "nikhil")');
		return view('index', ['greet' => $greet, 'users' => $users]);
	}

}


