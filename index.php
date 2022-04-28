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
    <!--<link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css"> -->
    <style>
    #home_section {
        background-image: url('assets1/images/home.jpg');
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php include 'navbar.php';?>

    <!-- home section -->
    <div id="home_section" style="">
        <div class="hoome_quote">Greatest Moments We Deliver</div>
        <a href="#contact_us"><button class="reachbtn">Reach Out to us</button></a>
    </div>

    <!-- destination section -->
    <div id="dest_section" style="background-image: url('assets1/images/dest.jpg');">
        <div class="dest_heading">
            <p style="font-size:45px; font-weight:bold;" class="hoome_quote1">Destinations</p>
        </div>

        <div class="dest_container" style="padding:90px;">

            <!--tour cards -->
            <?php 
                include "dbcon.php";
                $sql = "SELECT * FROM `tours` WHERE `status` = 'notcompleted' LIMIT 3";
                $result = mysqli_query($con, $sql);
                if($result) {
                    $i = 0;
                    while(($i < 3) && $row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3">  </div>
                                <img src="adminpanel/'.$row['pic1'].'" alt="">
                            </div>
                            <div class="to-ho-hotel-con-23" style="background-color:white;">
                                <div class="to-ho-hotel-con-2">
                                    <a href="tourdetails.php?tid='.$row['tid'].'">
                                        <h4>'.$row['tname'].'</h4>
                                    </a>
                                </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li> <span style="color: black;"><b>Location : </b></span>: '.$row['tlocation'].'
                                            <div class="dir-rat-star ho-hot-rat-star">
                                                <span style="color: black;"><b>Date : </b></span>
                                                <span>'.$row['tstartdate'].'</span>
                                            </div>
                                        </li>
                                        <li><span class="ho-hot-pri">'.$row['tprice'].' Rs</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $i++;
                    }
                }
            ?>


        </div>
    </div>





    <!--   contact redirect -->
    <span id="contact_us"></span>

    <!-- contact us section -->
    <div class="contact_section" style="background-image: url('assets/images/contact.jpg');">


        <div class="events_info_cont contact_side_cont">

            <div class="events contact_child">
                <div style="text-align: center;">
                    <div class="contact_head">Contact Us</div>
                    <div class="mp_font">Sector 10 <br> Vashi, navi Mumbai</div>
                    <div class="mp_font">info@adventurediares.in</div>
                </div>

            </div>

            <div class="cform">
                <form action="contactdata.php" method="POST">
                    <div class="mb-3 rwidth">
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                            placeholder="Name">
                    </div>

                    <div class="mb-3 rwidth">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone number"
                            name="number">
                    </div>

                    <!-- 
                    <select class="form-select rwidth" aria-label="Default select example" style=" color:#636363;"
                        name="package">
                        <option selected>Select Package</option>
                        <option value="1">Manali - Kasol</option>
                        <option value="2">Dharamshala – McLeod Ganj – Triund</option>
                        <option value="3">Kasol - Kheerganga</option>
                    </select> -->

                    <div class="mb-3 rwidth" style="margin-top:15px;">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"
                            name="more"></textarea>
                    </div>

                    <button class="cbtn">Submit</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Aboutus section -->
    <div class="aboutus_section mb-4" id="about_us">

        <div class="dest_heading">
            <h1 style='font-family: "Corinthia", cursive;font-weight:bold;'>About Us</h1>
        </div>

        <div class="cparas">
            <p>Adventure Diaries is a excursions & tour running employer based by Tushar Kamble & Divyanshu Bisht. </p>
            <p>The employer with its professionally controlled tour engine focuses on organizing Adventure, Cultural,
                Religious, hill station & flora and fauna excursions in India through a sprawling network.</p>
            <p>We offer vacation packages custom designed as consistent with the client’s desires and budget. We excel
                with excellent offerings from our skilled group of workers with over 1+ Years of Experience with inside
                the Travel Industry. </p>
            <p>We have expert group of workers on board to manual Travellers about the location & a nearby manual onsite
                for sightseeing. We Organize DJ Parties, Theme Parties on excursion with enterprise requirements to
                maintain
                exciting our customer</p>
        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script>
    localStorage.removeItem("user_data")
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