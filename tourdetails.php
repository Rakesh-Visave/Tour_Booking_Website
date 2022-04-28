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
    <link rel="stylesheet" href="responsivestyle.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--<link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css"> -->

</head>

<body>
    <!-- navbar -->
    <?php include 'navbar2.php';?>
    <?php
                    include "dbcon.php";
                    $tid = $_GET['tid'];
                    if(empty($tid)) {
                        header("location: index.php");
                    }
                    $sql = "SELECT * FROM `tours` WHERE `tid` = '$tid' AND `status` = 'notcompleted'";
                    $result = mysqli_query($con, $sql);
                    if($result) {
                        $row = mysqli_fetch_assoc($result);
                        $tname = $row['tname'];
                        $tdesc = substr($row['tdesc'],0, 900);
                        $pic = $row['pic2'];
                        $tprice = $row['tprice'];
                        $itihead = $row['itihead'];
                        $iti = $row['iti'];
                        $tlocation = $row['tlocation'];
                        $tstartdate = $row['tstartdate'];
                        $tenddate = $row['tenddate'];
                        $tdays = $row['tdays'];
                        $tmonth = $row['tmonths'];
                    }
                ?>
    <!-- banner -->
    <section>
        <div class="rows inner_banner inner_banner_4">
            <div class="container">

                <h2>
                    <div class="mb-3"> <span> Tour </span> Details</div>

                    <p style="margin-top:-10px;">Book travel packages and enjoy your holidays with distinctive
                        experience
                    </p>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- left side start -->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space">

                <div class="col-md-9">

                    <!--====== TOUR TITLE ==========-->
                    <div class="tour_head">
                        <h2><?php echo $tname;?>
                        </h2>
                    </div>
                    <!--====== TOUR DESCRIPTION ==========-->
                    <div class="tour_head1">
                        <h3>Description</h3>
                        <p>
                            <?php echo $tdesc;?>
                        </p>
                    </div>
                    <!--====== ROOMS: HOTEL BOOKING ==========-->
                    <div class="tour_head1 hotel-book-room">
                        <h3>Photo Gallery</h3>
                        <div id="myCarousel1" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner carousel-inner1" role="listbox">
                                <div class="item active"> <?php echo '<img src="adminpanel/'.$pic.'"';?> alt="Chania"
                                    width="460" height="345"> </div>

                            </div>
                        </div>
                    </div>

                    <!--====== ABOUT THE TOUR ==========-->
                    <div class="tour_head1" style="margin-top:-25px;">
                        <h3>Tour Pricing</h3>
                        <table>
                            <tr>
                                <th class="event-res">Tour Name</th>
                                <th class="event-res">Total Tour Price</th>
                            </tr>
                            <tr>
                                <td class="event-res"><?php echo $tname;?></td>
                                <td class="event-res"><?php echo $tprice;?> Rs</td>
                            </tr>

                        </table>
                    </div>
                    <!-- Note -->
                    <div class="tour_head1">
                        <h3>Note</h3>
                        <p>Passenger needs to pay only advance fees throgh online mode by usinng UPI Payments or
                            physically by contacting adventurediaries services as per his/her convienence in order to
                            book his/her seat total price of the
                            tour should be paid before due date of tour.</p>
                    </div>
                    <!--====== DURATION ==========-->
                    <div class="tour_head1 l-info-pack-days days">
                        <h3><?php echo $itihead;?></h3>
                        <ul>
                            <?php 
                                $i = explode(",",$iti);
                                $count = count($i);
                                for($ii = 0; $ii < $count; $ii++) {
                                    echo '<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <h4><span></span>'.$i[$ii].'</h4>
    
                                </li>';
                                }
                            ?>
                        </ul>

                        <a href=<?php echo '"booking.php?tid='.$tid.'"'?> class="link-btn"
                            style="position:absolute; bottom:-70px;">Book Now</a>
                    </div>
                </div>
                <!-- left side end -->

                <!-- right side  -->
                <div class="col-md-3 tour_r">

                    <!--====== TRIP INFORMATION ==========-->
                    <div class="tour_right tour_incl tour-ri-com">
                        <h3>Trip Information</h3>
                        <ul>
                            <li><span style="font-weight: bold;font-size:14px; color: black;">Location</span> :
                                <?php echo $tlocation;?></li>
                            <li><span span style="font-weight: bold;font-size:14px; color: black;"> Starting Date:
                                </span><?php echo $tstartdate;?></li>
                            <li><span span style="font-weight: bold;font-size:14px; color: black;">Ending Date:
                                </span><?php echo $tenddate;?></li>
                            <li><span span style="font-weight: bold;font-size:14px; color: black;">Number of Days :
                                </span> <?php echo $tdays;?> Days</li>
                            <li><span span style="font-weight: bold;font-size:14px; color: black;">Tour Month :
                                </span><?php echo $tmonth;?></li>
                        </ul>
                    </div>
                    <!--====== PACKAGE SHARE ==========-->
                    <!-- <div class="tour_right head_right tour_social tour-ri-com">
                        <h3>Share This Package</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                            <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div> -->
                    <!--====== HELP PACKAGE ==========-->
                    <div class="tour_right head_right tour_help tour-ri-com">
                        <h3>Help & Support</h3>
                        <div class="tour_help_1">
                            <h4 class="tour_help_1_call">Call Us Now</h4>
                            <h4><i class="fa fa-phone" aria-hidden="true"></i> +91 8785874563</h4>
                        </div>
                    </div>
                    <!--====== PUPULAR TOUR PACKAGES ==========-->
                    <?php
                        $sql = "SELECT * FROM `tours` WHERE `status` = 'notcompleted' AND `tid` != '$tid' LIMIT 1";
                        $result = mysqli_query($con, $sql);
                        if($result) {
                            $row = mysqli_fetch_assoc($result);
                            $num = mysqli_num_rows($result);
                            if($num == 1 && $row['tid'] != $tid) {

                                echo '<div class="tour_right tour_rela tour-ri-com">
                                <h3>Popular Packages</h3>
                                
                                <div class="tour_rela_1"> <img src="adminpanel/'.$row['pic1'].'" alt="" />
                                <h4>'.$row['tname'].'</h4>
                                <p>'.substr($row['tdesc'], 0, 100).'</p> <a href="tourdetails.php?tid='.$row['tid'].'" class="link-btn">View this Package</a>
                                </div>
                                </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>




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