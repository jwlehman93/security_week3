<?php
require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to('../index.php');
}

// Set default values for all variables the page needs.
$errors = array();
$state = array(
  'name' => '',
  'code' => '',
  'country_id' => $_GET['id']
);

if(is_post_request()){

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $state['name'] = $_POST['name']; }
  if(isset($_POST['code'])) { $state['code'] = $_POST['code']; }
  validate_request();
  $result = insert_state($state);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New State'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">
  <a href="../countries/show.php?id=<?php echo h($state['country_id']); ?>">Back to Country</a><br />

  <h1>New State</h1>

<?php 
echo display_errors($errors); 
$inputs = array();
$labels = array(
  'name' => 'Name',
  'code' => 'Code'
);
foreach($state as $key => $value) {
  if($key === 'id' || $key === 'country_id') { continue; }
  $inputs[$key] = [$labels[$key], $value];
}
echo create_csrf_form($inputs, 'new.php?id=' . h(u($state['country_id'])), 'Update');
?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
