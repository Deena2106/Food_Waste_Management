<?php
$flage_next = FALSE;
$text = "";
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fooddetails';
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$result = mysqli_query($connect, "select * from about");
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

        .center {
            margin-left: 30%;
            margin-right: 20%;
            margin-top: 2%;
            margin-bottom: 20%;
        }

        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            background-color: #fff;
            padding: 20px;
            text-align: center;
            /* text-transform: capitalize; */
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container" style="width: 250px;">
            <h3 class="gradient-border" id="box">Food Waste Management</h3>
            <i class="fa-solid fa-house">
                <ul style="list-style: none;">
                    <li><a href="table.php"><i class="fa fa-home fa-fw"></i> HOME</a></li>
                    <li><a href="contact.php" style="background-color: #fff;color: #0c7db1;"><i class="fa fa-phone fa-fw" style="color: #0c7db1;"></i> CONTACT US</a></li>
                    <li><a href="about.php"><i class="fa fa-address-card"></i> ABOUT</a></li>
                    <li><a href="#"><i class="fa fa-"></i>ABCD</a></li>
                </ul>
        </div>
    </div>
    <div class="center">
        <h1 style="text-align: center; color: #fff;"> Feedback</h1>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <td><?php echo $row['id'] ?> </td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['message'] ?></td>
                </tr>
            <?php
                    }
            ?>
            </tbody>
        </table>
    </div>
    <br><br>
</body>

</html>