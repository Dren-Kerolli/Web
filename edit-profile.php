<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['submit'])) {
        $docspecialization = $_POST['Doctorspecialization'];
        $docname = $_POST['docname'];
        $docaddress = $_POST['clinicaddress'];
        $docfees = $_POST['docfees'];
        $doccontactno = $_POST['doccontact'];
        $docemail = $_POST['docemail'];
        
        $sql = mysqli_query($con, "UPDATE doctors SET specilization='$docspecialization', doctorName='$docname', address='$docaddress', docFees='$docfees', contactno='$doccontactno' WHERE id='".$_SESSION['id']."'");
        
        if($sql) {
            echo "<script>alert('Doctor Details updated Successfully');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Doctor Profile</title>
</head>

<body>
    <h2>Update Doctor Profile</h2>
    <?php
    if (isset($_SESSION['successmsg'])) {
        echo '<p style="color:green;">' . $_SESSION['successmsg'] . '</p>';
        unset($_SESSION['successmsg']);
    }
    ?>
    <form method="POST" action="">
        <label>Specialization:</label>
        <input type="text" name="Doctorspecialization" value="<?php echo $data['specilization']; ?>" required><br>
        <label>Doctor Name:</label>
        <input type="text" name="docname" value="<?php echo $data['doctorName']; ?>" required><br>
        <label>Clinic Address:</label>
        <input type="text" name="clinicaddress" value="<?php echo $data['address']; ?>" required><br>
        <label>Doctor Fees:</label>
        <input type="text" name="docfees" value="<?php echo $data['docFees']; ?>" required><br>
        <label>Contact Number:</label>
        <input type="text" name="doccontact" value="<?php echo $data['contactno']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="docemail" value="<?php echo $data['docEmail']; ?>" required><br>
        <input type="submit" name="submit" value="Update Profile">
    </form>
</body>

</html>
