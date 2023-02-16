<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$type = $_GET['type'];

	if (isset($type)){
		$path = '../data';
		$json = file_get_contents("{$path}/{$type}.json");

		echo $json;
	}
}

