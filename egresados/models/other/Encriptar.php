<?php

// Configuration of the encryption algorithm
// You must change this string, it must be long and unique
// no one else should know it
// Encryption method
$method = 'aes-256-cbc';


// You can generate a different one using the function $ getIV ()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");


/*
  Encrypts the content of the variable, sent as a parameter.
*/
$encriptar = function ($value) use ($method, $iv) {
    return openssl_encrypt($value, $method, $value, false, $iv);
};


/*
 Decrypt the received text
 */
$desencriptar = function ($value) use ($method, $iv) {
    $encrypted_data = base64_decode($value);
    return openssl_decrypt($value, $method, $value, false, $iv);
};


/*
 Generate a value for IV
*/
$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};
