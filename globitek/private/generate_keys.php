<?php
include_once('initialize.php');
$resource  = openssl_pkey_new($config['ssl']);
openssl_pkey_export_to_file($resource, 'rsa_key');
$key_details = openssl_pkey_get_details($resource);
$public_key = $key_details['key'];
file_put_contents('rsa_key.pub', $public_key);
?>
