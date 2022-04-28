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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link rel="shortcut icon" href="assets1/images/logo.png">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/materialize.css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="responsivestyle.css"> -->
    <!--<link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/animate.css"> -->

</head>

<body>
    <!-- navbar -->
    <?php include 'navbar2.php';?>

    <section>
        <div class="tr-register" style="height: 99vh;">
            <div class="tr-regi-form">
                <h4>Sign In</h4>
                <p>It's free and always will be.</p>
                <form class="col s12" action="login.php" method="POST">
                    <div class="mb-4">
                        <input type="text" class="form-control" name="uname" id="uname" placeholder="username">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="button" value="submit" id="submit" class="btn btn-primary full-btn" />
                        </div>
                    </div>
                </form>
                <p>
                    Are you a new user ?
                    <a href="register.php">Register</a>
                </p>

            </div>
        </div>
    </section>


    <script>
    $(document).ready(function() {

        $('#submit').on("click", function() {
            const uname = $('#uname').val()
            const pass = $('#pass').val()
            console.log(uname)
            console.log(pass)

            $.ajax({
                url: "backend/login.php",
                type: "POST",
                data: {
                    uname,
                    pass,
                },
                success: function(data) {
                    // alert(data)
                    if (data == 1) {
                        location.href = 'index.php';
                    } else {
                        alert("Please Check your Credentials");
                    }
                }
            })
        })
    })
    </script>

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