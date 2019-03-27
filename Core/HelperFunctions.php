<?php

function dd ($var = '', $type = false) {
	echo "<pre>";

	$dump = [$_SERVER, $_REQUEST, $_ENV];

	if (!empty($var))			// $dump = $var ?? [$_SERVER, $_REQUEST, $_ENV];
		$dump = $var;

	$dumpWith = 'var_dump';

	if ($type)					// $dumpWith = $type ? 'print_r' ? 'var_dump';
		$dumpWith = 'print_r';

	$dumpWith($dump);

	die;
}

function view ($var, $data = [])
{
	foreach ($data as $key => $value) {
		${$key} = $value;
	}

	require __DIR__.'/../views/'.$var.'.view.php';
}