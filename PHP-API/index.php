<?php
header("Access-Control-Allow-Origin: ");
header('Access-Control-Allow-Headers:');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

if ( $_SERVER['REQUEST_METHOD'] === 'OPTIONS' ) {
    $this->responseCode('200');
}

$url_input = filter_input( INPUT_GET, '_url' ) ?? '';

var_dump($url_input);

?>