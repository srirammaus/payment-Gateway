<?php
session_start();
    // include file
    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    // salt for testing env
    $SALT ="-----"; //SALT HERE

    /*
    * Get the API response and verify response is correct or not.
    *
    * params string $easebuzzObj - holds the object of Easebuzz class.
    * params array $_POST - holds the API response array.
    * params string $SALT - holds the merchant salt key.
    * params array $result - holds the API response array after valification of API response.
    *
    * ##Return values
    *
    * - return array $result - hoids API response after varification.
    * 
    * @params string $easebuzzObj - holds the object of Easebuzz class.
    * @params array $_POST - holds the API response array.
    * @params string $SALT - holds the merchant salt key.
    * @params array $result - holds the API response array after valification of API response.
    *
    * @return array $result - hoids API response after varification.
    *
    */
    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null
    , $SALT, $ENV = null);
    
    $result = $easebuzzObj->easebuzzResponse( $_POST );
    $j_d=json_decode($result,true); //insted True
    print_r($result);
    $_SESSION['st']=$j_d['data']['status'];
    echo $_SESSION['st'];
    #$For=$result['1'];
    #print_r($For);
?>

