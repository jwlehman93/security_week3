<?php
include_once('../private/initialize.php');
// verify signature
$keys = $config['rsa_keys'];
if(!isset($_COOKIE['scrt'])) { exit("Cookie not set"); }
$secret = $_COOKIE['scrt'];
const CIPHER_METHOD = 'AES-256-CBC';

// verify


 $message = $secret;
 $key = 'a1b2c3d4e5';

 // Needs a key of length 32 (256-bit)
 $key = str_pad($key, 32, '*');

 // Base64 decode before decrypting
 $iv_with_ciphertext = base64_decode($message);

 // Separate initialization vector and encrypted string
 $iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
 $iv = substr($iv_with_ciphertext, 0, $iv_length);
 $ciphertext = substr($iv_with_ciphertext, $iv_length);

 // Decrypt
 $plaintext = openssl_decrypt($ciphertext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);

 echo $plaintext;

$result = openssl_verify($message, $secret, $keys['public']);
echo $result;
?>
