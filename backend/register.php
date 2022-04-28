<?php
include "../dbcon.php";
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$no = $_POST['no'];

$sql1 = "SELECT * FROM `user` WHERE `uname` = '$uname'";
$result1 = mysqli_query($con, $sql1);
$num = mysqli_num_rows($result1);

if($num > 0) {
    echo 0;
} else {
    $sql = "INSERT INTO `user` (`uname`, `upass`, `no`) VALUES ('$uname', '$pass', '$no')";    
    $result = mysqli_query($con, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }
}
    
?>