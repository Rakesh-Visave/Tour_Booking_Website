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
        if(empty($tid)){
            header("location: allpackages.php");
        }
    ?>

    <div class="v2-search-form" style="box-shadow: none;margin-bottom:15vh;border:none;">
        <h2 class="mb-5"> Passenger Details</h2>
        <input type="hidden" name="" id="tid" value=<?php echo '"'.$tid.'"'?>>
        <form class=" contact__form" method="post">
            <!-- passengers -->
            <div id="itbody">
                <h5 class="mb-5" style="margin-top:55px;">Passenger 1</h5>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Name of Passenger 1
                    </label>
                    <input type="text" class="form-control" id="pname1" placeholder="">
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Gender of Passenger 1
                    </label>

                    <select class="form-select form-select-lg mb-3" id="gender1" aria-label=".form-select-lg example">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Age of Passenger 1
                    </label>
                    <input type="text" class="form-control mb-4" id="age1" placeholder="">

                </div>
            </div>


            <button type="button" class="btn btn-primary mt-4" id="itbtn">Add Passenger</button>
            <button type="button" class="btn btn-primary mt-4" id="submit_button" onclick="getData()">Submit</button>

        </form>
    </div>

    <?php include 'footer.php'; ?>





    <script>
    let count = 2;
    localStorage.removeItem("user_data")
    const itbtn = document.getElementById('itbtn');
    const stbtn = document.getElementById('submit_button');
    const itbody = document.getElementById('itbody');
    const tid = document.getElementById('tid').value;
    console.log(tid);


    itbtn.addEventListener("click", () => {
        let string = `
            <div id="it${count}">
            <h5 class="mb-5" style="margin-top:55px;">Passenger ${count}</h5>
                <div class="mb-4" id="">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Name of Passenger ${count}
                    </label>
                    <input type="text" class="form-control" id="pname${count}" placeholder="">
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Gender of Passenger ${count}
                    </label>

                    <select class="form-select form-select-lg mb-3" id="gender${count}" aria-label=".form-select-lg example">
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label"
                        style="font-weight: lighter;font-size: 12px;margin-bottom:8px;">Age of Passenger ${count}
                    </label>
                    <input type="text" class="form-control mb-4" id="age${count}" placeholder="">
                    <button type="button" class="btn btn-danger mt-4" id="" ;
                        style="position: absolute;right:50px;" onclick="del('it${count}', ${count})">Delete</button>
                </div>
                </div>`;
        let it = document.createElement('div');
        it.innerHTML = string;
        itbody.appendChild(it);
        count++;
    })

    let obj = []

    function del(id, count) {
        const btnid = document.getElementById(id);
        btnid.remove();
    }

    function getData() {
        let flag = 0;
        for (let i = 1; i <= count; i++) {
            if ((document.getElementById(`pname${i}`) != null) && (document.getElementById(`gender${i}`) != null) &&
                (document.getElementById(`age${i}`) != null)) {
                let value1 = document.getElementById(`pname${i}`).value;
                let value2 = document.getElementById(`gender${i}`).value;
                let value3 = document.getElementById(`age${i}`).value;
                if (value1.length == 0 || value3.length == 0) {
                    flag = 1;
                    break;
                } else {
                    flag = 0;
                }
            }
        }
        if (flag == 1) {
            alert("Please fill all data")
        } else {
            for (let i = 1; i <= count; i++) {
                if ((document.getElementById(`pname${i}`) != null) && (document.getElementById(`gender${i}`) != null) &&
                    (document.getElementById(`age${i}`) != null)) {
                    let value1 = document.getElementById(`pname${i}`).value;
                    let value2 = document.getElementById(`gender${i}`).value;
                    let value3 = document.getElementById(`age${i}`).value;
                    if ((value1.length != 0) && (value3.length != 0)) {
                        let objData = {
                            pname: value1,
                            gender: value2,
                            age: value3,
                            tid: tid,
                        }
                        obj.push(objData)
                        // if confirm make an ajax call
                        if (i == count - 1) {
                            let con = confirm("Are you sure you want to Submit ?")
                            if (con == true) {
                                itbtn.disabled = true;
                                stbtn.disabled = true;

                                localStorage.setItem("user_data", JSON.stringify(obj));
                                location.href = "paymentsdetails.php?tid=" + tid;

                                // ajax call
                                // for saving data in db

                                // $.ajax({
                                //     url: "ajax/ajax_booking.php",
                                //     type: "POST",
                                //     data: {
                                //         myobj: obj,
                                //         count: count,
                                //     },
                                //     success: function(data) {
                                //         if (data == "1") {
                                //             location.href = "paymentsdetails.php"
                                //         } else {
                                //             alert("Some Error Occured Please Book Again")
                                //             location.href = "index.php";
                                //         }
                                //     }
                                // })
                            }
                        }
                    }

                }
            }
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