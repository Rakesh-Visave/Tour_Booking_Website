<?php
include "../dbcon.php";
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM `user` WHERE `uname` = '$uname' AND `upass` = '$pass'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if($num == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['loggedin'] = true;
    $_SESSION['no'] = $row['no'];
    echo 1;
} else {
    echo 0;
}
?>