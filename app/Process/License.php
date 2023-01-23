<?php

namespace App\Process;

class License
{
	public function verify($request)
	{
		$license = $request->all();
		$code = trim($license['license']);
		$ch = curl_init();
		$personalToken = 'cFAKETOKENabcREPLACEMExyzcdefghj';

		curl_setopt_array($ch, array(
			CURLOPT_URL => "https://sandbox.bailey.sh/v3/market/author/sale?code={$code}",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 20,
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer {$personalToken}",
				"User-Agent: {$request->header('User-Agent')}"
			)
		));

		$response =  @curl_exec($ch);
		$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		return $responseCode;
	}

}
