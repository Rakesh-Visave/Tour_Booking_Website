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
    <link rel="stylesheet" href="responsivestyle.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css"> -->

    <style>
    .f {
        background-color: black;
        height: 100px;
        width: 100%;
    }
    </style>

</head>

<body>
    <!-- navbar -->
    <?php include 'navbar2.php';?>

    <section class="hot-page2-alp hot-page2-pa-sp-top">
        <div class="container">
            <div class="row inner_banner inner_banner_3 bg-none">
                <div class="hot-page2-alp-tit">
                    <h1>Top Travel Packages</h1>

                    <p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>
                </div>
            </div>
            <div class="row">
                <!-- <div class="hot-page2-alp-con"> -->
                <!--RIGHT LISTINGS-->
                <div class="col-md-9 hot-page2-alp-con-right" style="width:100%;">
                    <div class="hot-page2-alp-con-right-1">
                        <!--LISTINGS-->
                        <?php
                            include "dbcon.php";
                            $sql = "SELECT * FROM `tours` WHERE `status` = 'notcompleted'";
                            $result = mysqli_query($con, $sql);
                            if($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $tid = $row['tid'];
                                    $tname = $row['tname'];
                                    $tprice = $row['tprice'];
                                    $tduration = $row['tduration'];
                                    $pic = $row['pic1'];
                                    $location = $row['tlocation'];
                                    $tdesc = $row['tdesc'];
                                    echo '<div class="row">
                                    <div class="hot-page2-alp-r-list">
                                        <div class="col-md-3 hot-page2-alp-r-list-re-sp">
                                            <a href="">
                                                <div class="hot-page2-hli-1" style="margin-top:7px;"> <img
                                                        src="adminpanel/'.$pic.'" alt=""> </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="trav-list-bod">
                                                <a href="tourdetails.php?tid='.$tid.'">
                                                    <h3>'.$tname.'</h3>
                                                </a>
                                                <p>'.substr($tdesc, 0, 180).'</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                <!-- <div class="hot-page2-alp-r-hot-page-rat">25%Off</div> -->
                                                <span class="hot-list-p3-1">Prices Starting</span> <span
                                                    class="hot-list-p3-2">'.$tprice.' Rs</span><span class="hot-list-p3-4">
                                                    <a href="tourdetails.php?tid='.$tid.'" class="hot-page2-alp-quot-btn">Book Now</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Detail and Includes</h4>
                                                <ul>
                                                    <li><img src="images/icon/a14.png" alt=""> <span>Sightseeing</span></li>
                                                    <li><img src="images/icon/a15.png" alt=""> <span>Hotel</span></li>
                                                    <li><img src="images/icon/a16.png" alt=""> <span>Transfer</span></li>
                                                    <li><img src="images/icon/a17.png" alt=""> <span>Luggage</span></li>
                                                    <li><img src="images/icon/a18.png" alt=""> <span>Duration '.substr($tduration, 0,20).'</span>
                                                    </li>
                                                    <li><img src="images/icon/a19.png" alt=""> <span>Location :
                                                            '.substr($location, 0,20).'</span></li>
                                                    <li><img src="images/icon/dbl4.png" alt=""> <span>Stay Plan</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
        ';
                                }
                            }
                        ?>


                        <!-- LIsting end -->
                    </div>
                </div>
            </div>
            <!--END RIGHT LISTINGS-->
            <!-- </div> -->
        </div>
        </div>
    </section>



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