<?php
    include 'dbcon.php';
    echo "yes";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $more = $_POST['more'];
        if(!empty($name) && !empty($number) && !empty($more)) {
            $sql = "INSERT INTO `reg` (`name`, `ph`, `message`) VALUES ('$name', '$number', '$more')";
            $result = mysqli_query($con, $sql);
         }
        
        header('location: index.php');
    }
    
?>