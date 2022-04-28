<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">

    <title>Adventure's</title>


    <link rel="shortcut icon" href="assets1/images/logo.png">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="responsivestyle.css">
    <link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <?php include 'navbar2.php';
    if(!(isset($_SESSION['loggedin']) == true)) {
        header("location: login.php");
    }?>
    <?php
        $tid = $_GET['tid'];
        if(empty($tid)) {
            header("location: index.php");
        }
    ?>
    <section>
        <div class="db">

            <!--CENTER SECTION-->
            <div class="db-2" style="width:100%;">
                <div class="db-2-com db-2-main">
                    <h4>Complete your payment and confirm your booking</h4>
                    <input type="hidden" name="" id="tid" value=<?php echo '"'.$tid.'"'?>>
                    <input type="hidden" name="" id="uname" value=<?php echo '"'.$_SESSION['uname'].'"'?>>
                    <input type="hidden" name="" id="uid" value=<?php echo '"'.$_SESSION['uid'].'"'?>>
                    <div class="db-2-main-com db-2-main-com-table">
                        <table class="responsive-table">
                            <tbody>
                                <?php 
                                   include "dbcon.php";
                                   $sql = "SELECT * FROM `tours` WHERE `tid` = '$tid'";
                                   $result = mysqli_query($con, $sql);
                                   while($row = mysqli_fetch_assoc($result)) {
                                       $tname = $row['tname'];
                                       $uname = $_SESSION['uname'];
                                       $tlocaion = $row['tlocation'];
                                       $tduration = $row['tduration'];
                                       $tprice = $row['tprice'];
                                       
                                       echo '<tr>
                                       <td>Package Name</td>
                                       <td>:</td>
                                       <td>'.$tname.'</td>
                                   </tr>
                                   <tr>
                                       <td>User Name</td>
                                       <td>:</td>
                                       <td>'.$uname.'</td>
                                   </tr>
                                   <tr>
                                       <td>Tour Location</td>
                                       <td>:</td>
                                       <td>'.$tlocaion.'</td>
                                   </tr>
                                   <tr>
                                       <td>Duration</td>
                                       <td>:</td>
                                       <td>'.$tduration.'</td>
                                   </tr>
                                   <tr>
                                       <td>Tour Price</td>
                                       <td>:</td>
                                       <td>'.$tprice.' Rs</td>
                                   </tr>
                                   <input type="hidden" id="tprice" value="'.$tprice.'">
                                   ';
                                   }
                                ?>


                            </tbody>
                        </table>
                        <div class="db-mak-pay-bot">
                            <p>
                                <b style="color: red;">Important</b> : Click on Make Payment button pay the amount by
                                choosing any of the payments options mentioned and
                                complete your booking.
                            <div><button type="button" class="btn btn-primary mt-4" id="submit_button"
                                    onclick="makePayment()">Make Payment</button></div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
    const tid1 = document.getElementById('tid').value;
    const uid = document.getElementById('uid').value;
    const uname = document.getElementById('uname').value;
    let obj = JSON.parse(localStorage.getItem('user_data'));
    if (obj == null) {
        alert("some error occured");
        location.href = "index.php"
    }
    const tid2 = obj[0].tid;
    if (tid1 != tid2) {
        location.href = "index.php"
    }

    function makePayment() {
        let obj = localStorage.getItem("user_data")
        if (obj == null) {
            alert("Some error occured")
            location.href = "index.php"
        } else {
            // get tour price
            let arr = JSON.parse(obj)
            let count = arr.length
            let price = 0;
            $.ajax({
                url: "ajax/gettourprice.php",
                method: "POST",
                data: {
                    tid: tid1
                },
                success: function(data) {
                    price = Number(data)
                    var options = {
                        "key": "rzp_test_EN2aKya3YPwezV", // Enter the Key ID generated from the Dashboard
                        "amount": (price *
                                100
                            ) *
                            count, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Adventure Daries",
                        "description": "Payment for booking",
                        "handler": function(response) {
                            if (response.razorpay_payment_id.length > 0) {
                                let rid = response.razorpay_payment_id;
                                const user_obj = JSON.parse(obj)
                                $.ajax({
                                    url: "ajax/ajax_booking.php",
                                    type: "POST",
                                    data: {
                                        obj: user_obj,
                                        tid: tid1,
                                        uname: uname,
                                        uid: uid,
                                        tprice: price,
                                        rid: rid,
                                    },
                                    success: function(data) {
                                        if (data == 1) {
                                            alert("Register Successfull");
                                            location.href = "index.php";
                                        } else {
                                            alert("Register Failed");
                                            location.href = "index.php";
                                        }
                                    }
                                })
                            }
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            })
        }

    }
    </script>


    <script src="https://kit.fontawesome.com/d62cca87ae.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>