<?php

$githubUsername = 'SebastienMerv';
$accessToken = 'lGWsWEn06bIuvmV4Or7oatQUhi19fGIC6fHBuwe8bX0=';

$url = "https://api.github.com/users/{$githubUsername}/repos";
$context = stream_context_create([
    'http' => [
        'header' => "Authorization: token {$accessToken}"
    ]
]);

$response = file_get_contents($url, false, $context);
$repositories = json_decode($response);

var_dump($repositories);
