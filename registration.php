<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
    $fname = $_POST['full_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con, "INSERT INTO users(fullname, address, city, gender, email, password) VALUES ('$fname', '$address', '$city', '$gender', '$email', '$password')");
    
    if($query)
    {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form method="POST" action="">
        <label>Full Name:</label>
        <input type="text" name="full_name" required><br>
        
        <label>Address:</label>
        <input type="text" name="address" required><br>
        
        <label>City:</label>
        <input type="text" name="city" required><br>
        
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>



<!-- Regjistrimi

<!-- Regjistrimi