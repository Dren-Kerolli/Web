<!DOCTYPE html>
<html>
<head>
    <title>Logged in Users</title>
</head>
<body>
    <h2>Logged in Users</h2>
    
    <table>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
        </tr>

        <?php
        session_start();
        include('include/config.php');
        
        if (strlen($_SESSION['id']) == 0) {
            header('location:logout.php');
        } else {
            $sql = mysqli_query($con, "SELECT * FROM userlog");
            $cnt = 1;
            while ($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['loginTime']; ?></td>
                </tr>
                <?php
                $cnt++;
            }
        }
        ?>
    </table>
    
</body>
</html>
