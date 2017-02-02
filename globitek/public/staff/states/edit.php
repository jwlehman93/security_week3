<?php
require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to('../index.php');
}
$states_result = find_state_by_id($_GET['id']);
// No loop, only one result
$state = db_fetch_assoc($states_result);

// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $state['name'] = $_POST['name']; }
  if(isset($_POST['code'])) { $state['code'] = $_POST['code']; }
  if(isset($_POST['country_id'])) { $state['country_id'] = $_POST['country_id']; }
  validate_request();
  $result = update_state($state);
  if($result === true) {
    redirect_to('show.php?id=' . $state['id']);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit State ' . $state['name']; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">
  <a href="show.php?id=<?php echo h($state['id']); ?>">Back to State</a><br />

  <h1>Edit State: <?php echo h($state['name']); ?></h1>

<?php 
echo display_errors($errors); 
$inputs = array();
$labels = array(
  'name' => 'Name',
  'code' => 'Code',
);
foreach($state as $key => $value) {
  if($key === 'id' || $key === 'country_id') { continue; }
  $inputs[$key] = [$labels[$key], $value];
}
echo create_csrf_form($inputs, 'edit.php?id=' . h(u($state['id'])), 'Update');
?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
