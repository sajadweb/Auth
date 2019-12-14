<?php

use \Firebase\JWT\JWT;

function jwt_encode($data)
{
    $payload = array(
        "iss" => "example.org",
        "aud" => "example.com",
//        "iat" => 1356999524,
//        "nbf" => 1357000000,
        "data" => $data
    );

    return JWT::encode($payload,config("auth_picker.private_key"), config("auth_picker.JWT"));
}

