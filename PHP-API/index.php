<?php
header("Access-Control-Allow-Origin: ");
header('Access-Control-Allow-Headers:');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

if ( $_SERVER['REQUEST_METHOD'] === 'OPTIONS' ) {
    $this->responseCode('200');
}

const METHOD_DELETE = 'DELETE';
const METHOD_GET = 'GET';
const METHOD_POST = 'POST';
const METHOD_PUT = 'PUT';

session_start();

$url_input = filter_input( INPUT_GET, '_url' ) ?? '';

switch ($$url_input) {
    case 'characterInteger':
        characterInteger();
        break;
    
    default:
        # code...
        break;
}

function characterInteger() {
    
}

?>