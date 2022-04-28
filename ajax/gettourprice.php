<?php
    include "../dbcon.php";
    $tid = $_POST['tid'];
    $sql = "SELECT `tprice` FROM `tours` WHERE `tid` = '$tid'";
    $result = mysqli_query($con, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        $tprice = $row['tprice'];
        echo $tprice;
    }
?>