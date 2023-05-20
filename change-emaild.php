<!DOCTYPE html>
<html>
<head>
<title>Update Email</title>
</head>
<body>
<form method="POST" action="">
  <label for="old_email">Old Email:</label>
  <input type="email" name="old_email" id="old_email" required><br><br>

  <label for="new_email">New Email:</label>
  <input type="email" name="new_email" id="new_email" required><br><br>

  <input type="submit" name="submit" value="Update Email">
</form>

<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
  $old_email = $_POST['old_email'];
  $new_email = $_POST['new_email'];
  
  // Verify if the old email matches the user's current email
  $verify_email = mysqli_query($con, "SELECT * FROM users WHERE id='".$_SESSION['id']."' AND email='$old_email'");
  if(mysqli_num_rows($verify_email) > 0)
  {
    // Update the email in the database
    $sql = mysqli_query($con, "UPDATE users SET email='$new_email' WHERE id='".$_SESSION['id']."'");
    if($sql)
    {
      $msg = "Your email updated successfully";
    }
  }
  else
  {
    $error_msg = "Old email does not match your current email";
  }
}
?>

<?php if(isset($msg)) { ?>
  <p><?php echo $msg; ?></p>
<?php } ?>

<?php if(isset($error_msg)) { ?>
  <p><?php echo $error_msg; ?></p>
<?php } ?>
</body>
</html>
