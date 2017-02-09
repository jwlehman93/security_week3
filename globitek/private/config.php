<?php
$config = array(
  'ssl' => array(
    'digest_alg' => 'sha512',
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA
  ),
  'rsa_keys' => array(
    'private' => openssl_pkey_get_private("file://" . PRIVATE_PATH . '/rsa_key'),
    'public' => openssl_pkey_get_public("file://" . PRIVATE_PATH . '/rsa_key.pub')
  )
);
?>
