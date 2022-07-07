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

if ($url_input == 'characterIntegerNoValidation') {
    characterIntegerNoValidation();
}

if ($url_input == 'characterIntegerWithValidation') {
    characterIntegerWithValidation();
}

if ($url_input == 'characterIntegerDataStoring') {
    # code...
}





function characterIntegerNoValidation() {

    $time = date('d.m.Y, H:i:s:u');

    $startMeasuringInNanoseconds = hrtime(true);

    if ($_SERVER[ 'REQUEST_METHOD' ] === METHOD_POST) {

        $firstnameCi = filter_input( INPUT_POST, 'firstnameCi' );
        $lastnameCi = filter_input( INPUT_POST, 'lastnameCi' );
        $ageCi = filter_input( INPUT_POST, 'ageCi' );

        http_response_code( 200 );
    } else {
        http_response_code( 400 );
    }

    $resultMeasuredInNanoseconds = hrtime(true) - $startMeasuringInNanoseconds;

    $seconds = $resultMeasuredInNanoseconds / 1000000000;

    echo json_encode( [ 'status' => 'No Validation', 'time-in-nanoseconds' => $resultMeasuredInNanoseconds, 'time-in-seconds' => $seconds, 'start-date' => $time ], JSON_PRETTY_PRINT );

}

function characterIntegerWithValidation() {

    $time = date('d.m.Y, H:i:s:u');

    $startMeasuringInNanoseconds = hrtime(true);

    if ($_SERVER[ 'REQUEST_METHOD' ] === METHOD_POST) {

        $errors = [];

        $firstnameCi = filter_input( INPUT_POST, 'firstnameCi' );
        $lastnameCi = filter_input( INPUT_POST, 'lastnameCi' );
        $ageCi = filter_input( INPUT_POST, 'ageCi' );

        if ( is_null( $firstnameCi ) || empty( $firstnameCi ) ) {
            $errors[ 'firstname' ][] = 'No firstname given';
        }

        if ( strlen( $firstnameCi ) < 2 ) {
            $errors[ 'firstname' ][] = 'firstname is less than 2 characters';
        }

        if ( strlen( $firstnameCi ) > 30 ) {
            $errors[ 'firstname' ][] = 'firstname is more than 30 characterss';
        }

        if ( preg_match( '/[^a-z_A-Z_0-9]/i', $firstnameCi ) ) {
            $errors[ 'firstname' ][] = 'firstname should only contain alphabetic characters';
        }

        if ( is_null( $lastnameCi ) || empty( $lastnameCi ) ) {
            $errors[ 'lastname' ][] = 'No lastname given';
        }

        if ( strlen( $lastnameCi ) < 2 ) {
            $errors[ 'lastname' ][] = 'lastname is less than 2 characters';
        }

        if ( strlen( $lastnameCi ) > 30 ) {
            $errors[ 'lastname' ][] = 'lastname is more than 30 characters';
        }

        if ( preg_match( '/[^a-z_A-Z_0-9]/i', $lastnameCi ) ) {
            $errors[ 'lastname' ][] = 'lastname should only contain alphabetic characters';
        }

        if ( is_null( $ageCi ) || empty( $ageCi ) ) {
            $errors[ 'age' ][] = 'No age given';
        }

        if ( $ageCi < 1 ) {
            $errors[ 'age' ][] = 'age cannot be less than 1';
        }

        if ( $ageCi > 120 ) {
            $errors[ 'age' ][] = 'age cannot be more than 120';
        }

        if ( preg_match( '/[^0-9]/i', $ageCi ) ) {
            $errors[ 'age' ][] = 'age should only contain numeric characters';
        }

        http_response_code( 201 );
    } else {
        http_response_code( 400 );
    }

    $resultMeasuredInNanoseconds = hrtime(true) - $startMeasuringInNanoseconds;

    $seconds = $resultMeasuredInNanoseconds / 1000000000;

    echo json_encode( [ 'status' => 'With Validation', 'time-in-nanoseconds' => $resultMeasuredInNanoseconds, 'time-in-seconds' => $seconds, 'start-date' => $time ], JSON_PRETTY_PRINT );
}

?>