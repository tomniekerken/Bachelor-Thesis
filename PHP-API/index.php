<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Origin, Content-Type');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

// If header has options (e.g. AUTH-Token)
/* if ( $_SERVER['REQUEST_METHOD'] === 'OPTIONS' ) {
    $this->responseCode('200');
} */

const METHOD_DELETE = 'DELETE';
const METHOD_GET = 'GET';
const METHOD_POST = 'POST';
const METHOD_PUT = 'PUT';

session_start();

$url_input = filter_input( INPUT_GET, '_url' ) ?? '';

switch ($url_input) {
    case 'characterInteger':
        characterInteger();
        break;
    
    default:
        # code...
        break;
}

function characterInteger() {
    if ($_SERVER[ 'REQUEST_METHOD' ] === METHOD_POST) {

        $firstnameCi = filter_input( INPUT_POST, 'firstnameCi' );
        $lastnameCi = filter_input( INPUT_POST, 'lastnameCi' );
        $ageCi = filter_input( INPUT_POST, 'ageCi' );

        if ($firstnameCi = 'Tom') {
            http_response_code( 201 );
            json_encode( [ 'success' => true, 'time' => 12 ], JSON_PRETTY_PRINT );
        } else {
            http_response_code( 400 );
            json_encode( [ 'success' => true, 'time' => 12 ], JSON_PRETTY_PRINT );
        }

        // http_response_code( 200 );
        // 
    } else {
        http_response_code( 400 );
    }
}

?>