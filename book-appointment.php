<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1;
$docstatus=1;
$query=mysqli_query($con,"insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}

}
?>

<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{

?>
<?php } ?>
				

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>
</head>
<body>
<form method="POST" action="">
  <label for="Doctorspecialization">Doctor Specialization:</label>
  <select name="Doctorspecialization" id="Doctorspecialization">
    <?php
    $ret = mysqli_query($con,"select * from doctorspecilization");
    while($row = mysqli_fetch_array($ret)) {
      echo "<option value='".$row['specialization']."'>".$row['specialization']."</option>";
    }
    ?>
  </select><br><br>

  <label for="doctor">Doctor:</label>
  <select name="doctor" id="doctor">
    <!-- populate doctors based on selected specialization -->
	<option value="dreni"></option>
  </select><br><br>

  <label for="fees">Consultancy Fees:</label>
  <input type="text" name="fees" id="fees"><br><br>

  <label for="appdate">Appointment Date:</label>
  <input type="date" name="appdate" id="appdate"><br><br>

  <label for="apptime">Appointment Time:</label>
  <input type="time" name="apptime" id="apptime"><br><br>

  <input type="submit" name="submit" value="Book Appointment">
</form>
</body>
</html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>


<!-- rezervimi i termini