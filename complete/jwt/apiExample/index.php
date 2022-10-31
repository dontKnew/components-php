<?php
include_once './config/database.php';
require "../vendor/autoload.php";
use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once ("./config/converter.php");
        $converter = new Converter();
        $secret_key = $converter->stringToBinary("firsttoken");
        $issuer_claim = "failureboy.com"; // this can be the servername
        $audience_claim = "Sajid";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + 60; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => 52,
                "firstname" => "Sajid Ali",
                "email" => "israfil123.a@gmai.com"
        ));
        $jwt = JWT::encode($token, $secret_key, "HS256");
        echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "email" => "israfil123@gmai.com",
                "expireAt" => $expire_claim
            ));

            // $jwt = JWT::decode($token,$);
 

?>
