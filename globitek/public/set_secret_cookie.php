<?php
include_once('../private/initialize.php');
if(isset($_COOKIE['scrt'])) { unset($_COOKIE['scrt']) ;}
if(!isset($config['rsa_keys'])) { exit("Error creating secret"); }
$keys = $config['rsa_keys'];

// encrypt
const CIPHER_METHOD = 'AES-256-CBC';

$plaintext = 'I have a secret to tell';
$key = 'a1b2c3d4e5';

// Needs a key of length 32 (256-bit)
$key = str_pad($key, 32, '*');

$iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
$iv = openssl_random_pseudo_bytes($iv_length);

// Encrypt
$encrypted = openssl_encrypt($plaintext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);
// Return $iv at front of string, need it for decoding
$message = $iv . $encrypted;

//sign
openssl_sign($message, $raw_signature, $keys['private']);

setcookie('scrt', base64_encode($message), time() + 60 * 60);
echo "<p>Secret sent</p>";
?>
