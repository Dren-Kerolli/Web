<?php
session_start();
error_reporting(0);
include("include/config.php");

if(isset($_POST['submit'])) {
    $puname = $_POST['username'];
    $ppwd = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
    $num = mysqli_fetch_array($ret);
    if($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $pid = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "INSERT INTO userlog(uid, username, userip, status) VALUES ('$pid','$puname','$uip','$status')");
        header("location:dashboard.php");
    }
    else {
        $_SESSION['login'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "INSERT INTO userlog(username, userip, status) VALUES ('$puname','$uip','$status')");
        $_SESSION['errmsg'] = "Invalid username or password";
        header("location:user-login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php if(isset($_SESSION['errmsg'])) { ?>
        <div><?php echo $_SESSION['errmsg']; ?></div>
    <?php } ?>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>


<!-- user log in ku e dergon te dhenat te tabela userslog me tregu kur u log in ni user dhe me pa se a ka hy me sukses apo jo