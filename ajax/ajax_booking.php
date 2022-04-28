<?php
    include "../dbcon.php";
    session_start();
    $obj = $_POST['obj'];
    $tid = $_POST['tid'];
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $count = count($obj);
    $uid = $_SESSION['uid'];
    $no = $_SESSION['no'];
    $uname = $_SESSION['uname'];
    $tprice =  $_POST['tprice'];
    $rid = $_POST['rid'];

    $flag = 0;
    $price = 0;
    for($i = 0; $i < $count; $i++) {
        $name = $obj[$i]["pname"];
        $gender = $obj[$i]["gender"];
        $age = $obj[$i]["age"];
        $tid = $obj[$i]["tid"];
        // need to change sql values after devloping full login system
        $sql = "INSERT INTO `bookings` (`uid`, `tid`, `pgender`, `page`, `pmobile`, `ptour`, `pname`, `btime`, `bstatus`, `price`, `rid`) VALUES ('$uid', '$tid', '$gender', '$age', '$no', '$tid', '$name', current_timestamp(), '1', '$tprice', '$rid')";
        $result = mysqli_query($con, $sql);
        if($result) {
            $flag = 1;
        }
    }
    if($flag == 1) {
        $sql = "INSERT INTO `payments` (`tid`, `uid`, `payment_time`, `uname`, `umobile`, `bstatus`, `price`, `rid`) VALUES ('$tid', '$uid', current_timestamp(), '$uname', '$no', '1', '$tprice', '$rid')";
        $result = mysqli_query($con, $sql);
        if($result) {
            echo "1";
        } else {
            echo "0";
        }
    }
    else {
        echo "0";
    }
?>