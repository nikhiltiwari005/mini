<?php

namespace App\Controller;

use App\Core\Request;


class HomeController
{

	public function index(Request $request)
	{
		$greet = 'Hi there!!';
		return view('index', ['greet' => $greet]);
	}

}


