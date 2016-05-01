<?php

if ( !function_exists('getStravaOauthUrl')){
	/**
     * Generate url for authentication
     */

    function getStravaOauthUrl()
    {
    	$clientId = env('STRAVA_CLIENT_ID');
        $clientSecret = env('STRAVA_CLIENT_SECRET');
        $api = new StravaApi(
            $clientId,
            $clientSecret
        );
        $redirect = env('APP_URL') .'/authorize';
        $url = $api->authenticationUrl($redirect, $approvalPrompt = 'auto', $scope = null, $state = null);
        return $url;
    }
}