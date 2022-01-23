<?php
function client()
{
    $client = new Google_Client();
    $client->setClientId('60462852072-nhqde119tomacn498543ludgk8s5u3es.apps.googleusercontent.com');
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
