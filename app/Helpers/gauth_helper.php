<?php
function client()
{
    $client = new Google_Client();
    $client->setClientId('935030474584-494e3qthkr64hi4077ou4gjsjtojcfa0.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setAccessType("offline");
    $client->setIncludeGrantedScopes(true);
    $client->setScopes('https://www.googleapis.com/auth/calendar');
    $client->addScope('email');
    $client->addScope('profile');
    return $client;
}

function Oauth2($client)
{
    $service = new \Google\Service\Oauth2($client);
    return $service;
}
