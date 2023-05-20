<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
</head>
<body>
<form method="POST" action="">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required><br><br>

  <label for="cpass">Current Password:</label>
  <input type="password" name="cpass" id="cpass" required><br><br>

  <label for="npass">New Password:</label>
  <input type="password" name="npass" id="npass" required><br><br>

  <input type="submit" name="submit" value="Change Password">
</form>

<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Europe/Tirane');
$currentTime = date('d-m-Y h:i:s A', time());

if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $sql = mysqli_query($con, "SELECT password FROM users WHERE password='".md5($_POST['cpass'])."' AND email='$email' AND id='".$_SESSION['id']."'");
  $num = mysqli_fetch_array($sql);

  if($num > 0)
  {
    $con = mysqli_query($con, "UPDATE users SET password='".md5($_POST['npass'])."', updationDate='$currentTime' WHERE id='".$_SESSION['id']."'");
    $_SESSION['msg1'] = "Password Changed Successfully!";
  }
  else
  {
    $_SESSION['msg1'] = "Email or Old Password is incorrect!";
  }
}
?>

<?php if(isset($_SESSION['msg1'])) { ?>
  <p><?php echo $_SESSION['msg1']; ?></p>
<?php
unset($_SESSION['msg1']);
} ?>

</body>
</html>
