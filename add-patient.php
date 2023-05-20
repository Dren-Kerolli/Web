<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id'])==0) {
    header('location:logout.php');
} else {
    if(isset($_POST['submit'])) {
        $docid=$_SESSION['id'];
        $patname=$_POST['patname'];
        $patcontact=$_POST['patcontact'];
        $patemail=$_POST['patemail'];
        $gender=$_POST['gender'];
        $pataddress=$_POST['pataddress'];
        $patage=$_POST['patage'];
        $medhis=$_POST['medhis'];
        
        $sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
        
        if($sql) {
            echo "<script>alert('Informacioni i pacientit u shtua me sukses.');</script>";
            header('location:add-patient.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shto Pacientin</title>
</head>
<body>
    <h2>Shto Pacientin</h2>
    <form method="post" action="">
        <label for="patname">Emri:</label>
        <input type="text" name="patname" required><br><br>
        
        <label for="patcontact">Kontakti:</label>
        <input type="text" name="patcontact" required><br><br>
        
        <label for="patemail">Emaili:</label>
        <input type="email" name="patemail" required><br><br>
        
        <label for="gender">Gjinia:</label>
        <select name="gender" required>
            <option value="">Zgjedh</option>
            <option value="Mashkull">Mashkull</option>
            <option value="Femër">Femër</option>
        </select><br><br>
        
        <label for="pataddress">Adresa:</label>
        <textarea name="pataddress" required></textarea><br><br>
        
        <label for="patage">Moshi:</label>
        <input type="text" name="patage" required><br><br>
        
        <label for="medhis">Historia e sëmundjeve:</label>
        <textarea name="medhis" required></textarea><br><br>
        
        <input type="submit" name="submit" value="Shto Pacientin">
    </form>
</body>
</html>
