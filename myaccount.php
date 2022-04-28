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

</head>

<body>
    <!-- navbar -->
    <?php include 'navbar2.php';?>

    <?php
    if(!(isset($_SESSION['loggedin']) == true)) {
        header("location: login.php");
    }?>

    <section>
        <div class="db" style="height:100vh;">
            <!--LEFT SECTION-->
            <!-- <div class="db-l">
                <div class="db-l-1">
                    <ul>
                        <li><img src="images/db-profile.jpg" alt="" />
                    </ul>
                </div>
            </div> -->
            <!--CENTER SECTION-->
            <div class="db-2" style="width:100%;">
                <div class="db-2-com db-2-main">
                    <h4> <?php echo $_SESSION['uname']?>'s user panel</h4>
                    <div class="db-2-main-com db-2-main-com-table">
                        <h3>Your Upcomming Tours</h3>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Tour Name</th>
                                    <th>Name</th>
                                    <th>Tour Start Date</th>
                                    <th>Fare</th>
                                    <th>Booking Time</th>
                                    <th>More Info</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include "dbcon.php";
                                $uid = $_SESSION['uid'];
                                $sql = "SELECT * FROM `bookings` WHERE `uid` = '$uid'";
                                $result = mysqli_query($con, $sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $tid = $row['tid'];
                                        $sql2 = "SELECT * FROM `tours` WHERE `tid` = '$tid'";
                                        $result2 = mysqli_query($con, $sql2);
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $tname = $row2['tname'];
                                        if($row2['status'] == "notcompleted") {
                                        echo ' <tr>
                                            <td>'.$tname.'</td>
                                            <td>'.$row['pname'].'</td>
                                            <td>'.$row2['tstartdate'].'</td>
                                            <td>'.$row2['tprice'].' Rs</td>
                                            <td>'.$row['btime'].'</td>
                                            </td>
                                            <td><a href="tourdetails.php?tid='.$tid.'" class="db-down-pdf"></i> View</a>
                                            </td>
                                        </tr>';

                                    }
                                    }
                                }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- center section end -->
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