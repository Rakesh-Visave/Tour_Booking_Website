<?php session_start();?>
<nav class="navbar navbar-expand-lg" style="background-color:white;">
    <div class="container-fluid">
        <!-- logo here -->
        <div class="logo">
            <a href="index.php"><img src="assets1/images/logo.png" alt="Logo here" height="60px"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="ulcont">
                <li class="nav-item">
                    <a class="nav-link active color-black" aria-current="page" href="index.php"
                        style="font-size:16px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  color-black" aria-current="page" href="#about_us" style="font-size:16px;">About
                        us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-black" aria-current="page" href="allpackages.php"
                        style="font-size:16px;">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  color-black" aria-current="page" href="#contact_us"
                        style="font-size:16px;">Contact Us</a>
                </li>
                <?php
                    if(isset($_SESSION['loggedin']) == true) {
                        echo '<li class="nav-item">
                        <a class="nav-link  color-black" aria-current="page" href="myaccount.php"
                            style="font-size:16px;">My Account</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link  color-black" aria-current="page" href="logout.php"
                        style="font-size:16px;">Logout</a>
                </li>';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link  color-black" aria-current="page" href="login.php"
                            style="font-size:16px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  color-black" aria-current="page" href="register.php"
                            style="font-size:16px;">Sign
                            up</a>
                    </li>';
                    }
                ?>

            </ul>
        </div>
    </div>
    <ul class="mobile-nav">
        <li class="mchild">
            <a class="color-black under_line" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="mchild">
            <a class="color-black under_line" aria-current="page" href="#about_us">About Us</a>
        </li>
        <li class="mchild">
            <a class="color-black under_line" aria-current="page" href="allpackages.php">Packages</a>
        </li>
        <li class="mchild">
            <a class="color-black under_line" aria-current="page" href="#contact_us">Contact Us</a>
        </li>

    </ul>

    <div class="mnav">
        <?php
            if(isset($_SESSION['loggedin']) == true) {
                echo '
                <li class="mchild">
            <a class="color-black under_line" style="font-size: 10px;margin-right: 25px;" aria-current="page"
                href="login.php">My Account</a>
        </li>
        <li class="mchild">
            <a class="color-black under_line" style="font-size: 10px;margin-right: 25px;" aria-current="page"
                href="login.php">Logout</a>
        </li>
                ';
            } else {
                echo '
                <li class="mchild">
            <a class="color-black under_line" style="font-size: 10px;margin-right: 25px;" aria-current="page"
                href="login.php">Login</a>
        </li>
        <li class="mchild">
            <a class="color-black under_line" style="font-size: 10px;margin-right: 25x;" aria-current="page"
                href="login.php">Sign Up</a>
        </li>
                ';
            }
        ?>

    </div>

</nav>