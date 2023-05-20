<!DOCTYPE html>
<html>
<head>
    <title>Add Doctor</title>
</head>
<body>
    <form method="POST" action="">
        <label for="Doctorspecialization">Doctor Specialization:</label>
        <input type="text" name="Doctorspecialization" required><br><br>
php
Copy code
    <label for="docname">Doctor Name:</label>
    <input type="text" name="docname" required><br><br>
    
    <label for="clinicaddress">Clinic Address:</label>
    <input type="text" name="clinicaddress" required><br><br>
    
    <label for="docfees">Doctor Fees:</label>
    <input type="text" name="docfees" required><br><br>
    
    <label for="doccontact">Doctor Contact:</label>
    <input type="text" name="doccontact" required><br><br>
    
    <label for="docemail">Doctor Email:</label>
    <input type="email" name="docemail" required><br><br>
    
    <label for="npass">Password:</label>
    <input type="password" name="npass" required><br><br>
    
    <input type="submit" name="submit" value="Add Doctor">
</form>

<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
if($sql)
{
echo "<script>alert('Doctor info added Successfully');</script>";
echo "<script>window.location.href ='manage-doctors.php'</script>";

}
}
?>
<?php } ?>
</body>
</html>




