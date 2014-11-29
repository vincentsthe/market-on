<?php

namespace app\api;

use OAuthRequester;

define("CONSUMER_KEY", "bestapp77");
define("CONSUMER_SECRET", "TWA2X");
define("OAUTH_HOST", "http://sandbox.appprime.net");
define("REQUEST_TOKEN_URL", OAUTH_HOST."/TemanDev/rest/RequestToken/");
define("ACCESS_TOKEN_URL", OAUTH_HOST."/TemanDev/rest/AccessToken/");

class BestApp {

	private $options = ['consumer_key' => CONSUMER_KEY,
						'consumer_secret' => CONSUMER_SECRET,
						'server_uri' => OAUTH_HOST,
						'request_token_uri' => REQUEST_TOKEN_URL,
						'access_token_uri' => ACCESS_TOKEN_URL
						];

	public function getToken() {
		$getAuthTokenParams = null;

		try {
			$tokenResultParams = OAuthRequester::requestRequestToken(CONSUMER_KEY, 0, $getAuthTokenParams);
			try {
		        OAuthRequester::requestAccessToken(CONSUMER_KEY, $tokenResultParams["token"], 0, 'POST');
		    } catch (OAuthException2 $e) {
		        var_dump($e);
		        return;
		    }

		    echo "Token success\n";

		} catch(OAuthException2 $e) {
			echo $e->getMessage();
			var_dump($e);
		}
	}

}