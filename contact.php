<?php
$flage_next = FALSE;
$text ="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'fooddetails';
    $connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_error()) {
        exit('Error connceting to the database ');
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $table_name = 'about';

    $sql = "INSERT INTO $table_name (name,email,subject,message) VALUES('$name','$email','$subject','$message')";
    if($connect->query($sql) === TRUE ){
        $text = "feedback sent successfully ";
    }
    else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- <title> Responsive Contact Us Form  | CodingLab </title>-->
    <title>Add Details</title>
    <!-- <link rel="stylesheet" href="table.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(foodwaste2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(2px); */
            background-size: cover;
            background-position-y: center;
            /* background-color: hsl(220, 33%, 96%); */
            /* font-style: normal; */
        }

        .heading {
            text-align: center;
            background-color: #42942d;
            max-width: 100%;
            padding: 0.1em 2em;
        }

        .wrapper {
            display: flex;
            position: relative;
        }

        .wrapper .container {
            position: fixed;
            width: 200px;
            height: 100%;
            padding: 30px 0;
            background: rgb(5, 68, 104);
            color: #ffff;
        }

        .wrapper .container h3 {
            text-align: center;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif
        }

        .wrapper .container ul li {
            padding: 30px 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            /* color: rgb(206, 240, 253); */
            /* border-top: 1px solid rgba(225, 225, 225, 0.05); */
        }

        .wrapper .container ul li a {
            /* color: #ffffff;
            display: block;
            border-left: 4px solid transparent; */
            display: block;
            padding: 13px 30px;
            /* border-bottom: 1px solid #10558d; */
            color: rgb(241, 237, 237);
            font-size: 16px;
            position: relative;
            text-decoration: none;
        }

        .wrapper .container ul li a .fa {
            /* width: 25px;
            font-size: 20px; */
            color: #dee4ec;
            width: 30px;
            font-size: large;
            display: inline-block;
        }

        /* .wrapper .container ul li:hover {
            background: #7264b6;
            color: #f3f5f9;
        } */

        .wrapper .container ul li a:hover,
        .wrapper .container ul li a:active {
            /* border-left-color: #ffff;
            padding-left: 10px;
            width: 100%;
            color: #fff; */
            color: #0c7db1;
            background: white;
            border-right: 2px solid rgb(5, 68, 104);
        }

        .wrapper .container ul li a:hover .fa,
        .wrapper .container ul li a:active .fa {
            color: #0c7db1;
        }

        .wrapper .container ul li a:hover::before,
        .wrapper .container ul li a:active::before {
            display: block;
        }

        .log {
            text-align: center;
            right: 7%;
            background-color: green;
            margin-top: 5%;
            margin-bottom: 5px;
            color: #5555;
            padding: 10px 18px;
            position: absolute;
            font-size: 18px;
            cursor: pointer;
        }

        .log i {
            color: #fff;
            font-size: 20px;
        }

        /* Google Font CDN Link */
        .container {
            width: 85%;
            background: #fff;
            border-radius: 6px;
            padding: 20px 60px 30px 40px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .container .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container .content .left-side {
            width: 25%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            position: relative;
        }

        .content .left-side::before {
            content: '';
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: #afafb6;
        }

        .content .left-side .details {
            margin: 14px;
            text-align: center;
        }

        .content .left-side .details i {
            font-size: 30px;
            color: #3e2093;
            margin-bottom: 10px;
        }

        .content .left-side .details .topic {
            font-size: 18px;
            font-weight: 500;
            font-weight: bolder;
        }

        .content .left-side .details .text-one,
        .content .left-side .details .text-two {
            font-size: 14px;
            color: #afafb6;
        }

        .content .right-side {
            width: 75%;
            margin-left: 75px;
        }

        .content .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: #3e2093;
        }

        .button input[type="button"]:hover {
            background: #5029bc;
        }

        /* @media (max-width: 950px) {
            .container {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }

            .container .content .right-side {
                width: 75%;
                margin-left: 55px;
            }
        } */

        /* @media (max-width: 820px) {
            .container {
                margin: 40px 0;
                height: 100%;
            }

            .container .content {
                flex-direction: column-reverse;
            }

            .container .content .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .container .content .left-side::before {
                display: none;
            }

            .container .content .right-side {
                width: 100%;
                margin-left: 0;
            }
        } */

        .content {
            background-color: #F0F1F8;
            padding: 20px;
            margin-top: 50px;
        }

        .left-side {
            display: flex;
            padding: 60px;
            margin-left: 250px;
            /* border-top: 100px; */
            border-radius: 30px;
            /* background-color: #555; */
        }

        .details {
            margin-right: 80px;
            height: 400px;
            text-align: center;
            justify-content: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            padding: 70px 30px;
            background: #F0F1F8;
            background-color: #F0F0F0;
        }

        .load {
            /* border: 2px solid #fff; */
            float: right;
            background-color: #fff;
            /* padding: 20px 30px; */
            /* position: absolute; */
            /* margin-bottom: 10%; */
            /* margin-right: 40px; */
            /* width: 70%; */
        }

        .joke {
            /* text-align: center; */
            float: left;
        }

        #box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 220px;
            height: 90px;
            color: white;
            margin-left: 10px;
            font-family: 'Raleway';
            font-size: 2rem;
        }

        .gradient-border {
            --borderWidth: 3px;
            background: #1D1F20;
            position: relative;
            border-radius: var(--borderWidth);
        }

        .gradient-border:after {
            content: '';
            position: absolute;
            top: calc(-1 * var(--borderWidth));
            left: calc(-1 * var(--borderWidth));
            height: calc(100% + var(--borderWidth) * 2);
            width: calc(100% + var(--borderWidth) * 2);
            background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
            border-radius: calc(2 * var(--borderWidth));
            z-index: -1;
            animation: animatedgradient 3s ease alternate infinite;
            background-size: 300% 300%;
        }


        @keyframes animatedgradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
        #text{
            text-align: center;
            color:green;
            text-transform: capitalize;
        }
    </style>
</head>

<body style="background-color: #fff;">
    <div class="wrapper">
        <div class="container" style="width: 250px;">
            <h3 class="gradient-border" id="box">Food Waste Management</h3>
            <i class="fa-solid fa-house">
                <ul style="list-style: none;">
                    <li><a href="table.php"><i class="fa fa-home fa-fw"></i> HOME</a></li>
                    <li><a href="contact.php" style="background-color: #fff;color: #0c7db1;"><i
                                class="fa fa-phone fa-fw" style="color: #0c7db1;"></i> CONTACT US</a></li>
                    <li><a href="about.php"><i class="fa fa-address-card"></i> ABOUT</a></li>
                    <li><a href="#"><i class="fa fa-"></i>ABCD</a></li>
                </ul>
        </div>
    </div>
    <div class="load" id="contact">
        <section class="contact-us" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 align-self-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="contact" action="contact.php" method="post">
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Send the feedback</h2>
                                        </div>
                                        <p id="text"> <?php echo $text; ?> </p>
                                        <!-- <p id="text"> hello </p> -->
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="name" type="text" id="name" placeholder="YOURNAME...*"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <br>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="email" type="email" id="email" pattern="[^ @]*@[^ @]*"
                                                    placeholder="YOUR EMAIL..." required="">
                                            </fieldset>
                                        </div>
                                        <br>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <input name="subject" type="text" id="subject" placeholder="SUBJECT...*"
                                                    required="">
                                            </fieldset>
                                        </div>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message"
                                                    placeholder="YOUR MESSAGE..." required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="button">SEND MESSAGE
                                                    NOW</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="joke">
                            <div class="right-info">
                                <ul>
                                    <li>
                                        <h6>Phone Number</h6>
                                        <span>9876543210</span>
                                    </li>
                                    <li>
                                        <h6>Email Address</h6>
                                        <span>food@gmail.com</span>
                                    </li>
                                    <li>
                                        <h6>Address</h6>
                                        <span>Sona college - Junction main road, Salem</span>
                                    </li>
                                    <li>
                                        <h6>Website URL</h6>
                                        <span>www.food.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>