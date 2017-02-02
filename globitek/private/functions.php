<?php

function h($string="") {
  return htmlspecialchars($string);
}
function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function url_for($script_path) {
  return DOC_ROOT . $script_path;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function request_is_same_domain() {
  if(!isset($_SERVER['HTTP_REFERER'])) { return false; }
  $referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
  $server_host = parse_url($_SERVER['HTTP_HOST'], PHP_URL_HOST);
  return ($referer_host === $server_host);
}

function display_errors($errors=array()) {
  $output = '';
  if (!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach ($errors as $error) {
      $output .= "<li>{$error}</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

/*
 * Creates form based on array input, and adds csrf protection
 * $inputs: (form name => [form label, form value]), type: String => [String, String]
 * $action: action for form, type: String
 * $submit: label for submit button, type: String
 */
function create_csrf_form($inputs=array(), $action, $submit="Submit"){
  echo $submit;
  $form = "";
  $form .= '<form action="' . $action . '" method="post">';
  foreach($inputs as $name => $form_info) {
    list($label, $value) = $form_info;
    $form .= $label . ':<br />';
    $form .= '<input type="text" name="' . $name . '" value="' . $value . '"><br />';
  }
  $form .= csrf_token_tag();
  $form .= '<input type="submit" name="submit" value="' . $submit . '" />';
  $form .= '</form>';
  return $form;
}

function validate_request() {
  if(!request_is_same_domain() || !csrf_token_is_valid()) {
    exit("Error: Request Invalid");
  }
}

?>
