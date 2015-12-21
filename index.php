<?php
function LocalWhois(){

	//Get External Ip Address
	$ip = file_get_contents("http://ipecho.net/plain");	

	//Check if is the $ip is not empty and is is a valid ip;
	if( empty($ip) || !inet_pton($ip)) return;


		exec("whois $ip", $output);

		$data = new stdClass();

		$data->MyExternalIP = $ip;

		foreach ($output as $key => $value) {

			$data->$key = $value;
		}

	return $data;
}

var_dump( LocalWhois() );