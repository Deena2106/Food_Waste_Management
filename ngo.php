<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Location:http://localhost/food/update/ngologin.php');
}
$flage_next = FALSE;
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fooddetails';
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$sql = "Select * from `food` group by due_time";
$result = $connect->query($sql);
$row = mysqli_fetch_assoc($result);
$deleteId="";
if(array_key_exists('button1', $_POST)) {
    $deleteId=$_POST["button1"];
    $sql1 = 'delete from `food` where id='.'"'.$deleteId.'"';
    $result2 = $con->query($sql1);
    header("Location: ngo.php");
    //button1();
}
function button1() {
    echo "This is Button1 that is selected";
    // echo $deleteId;
    // $sql1 = 'delete from `food` where id='.'"'.$deleteId.'"';
    // $result = $con->query($sql1);
}
function button2() {
    echo "This is Button2 that is selected";
}
?>
 
    


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Management</title>
    <!-- <link rel="stylesheet" href="table.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: serif; */
        }

        body {
            margin: 0;
            padding: 0;
            /* background-color: hsl(220, 33%, 96%); */
            /* background-image: url('food waste.jpg'); */
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(foodwaste2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(2px); */
            background-size: cover;
            background-position-y: center;
            /* position: absolute; */
            font-style: normal;
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

        /* table */
        .center {
            width: 75%;
            margin-left: 20%;
            margin-right: auto;
            margin-top: 8%;
            margin-bottom: 70%;
            padding: 5px 20px;
            text-align: center;
        }

        .center th {
            background-color: grey;
            padding: 20px;
            color: #ffffff;
        }

        .center td {
            padding: 10px;
        }

        table,
        th,
        td {
            border-radius: 25%;
            padding: 5px;
        }

        .log {
            text-align: center;
            right: 7%;
            background-color: green;
            margin-top: 5%;
            margin-bottom: 5px;
            color: #fff;
            padding: 10px 18px;
            position: absolute;
            font-size: 18px;
            cursor: pointer;
        }

        .log i {
            color: #fff;
            font-size: 20px;
        }

        .add {
            text-align: center;
            text-decoration: none;
            right: 66%;
            background-color: teal;
            margin-top: 5%;
            margin-bottom: 5px;
            color: #fff;
            padding: 15px 18px;
            position: absolute;
            font-size: 18px;
            cursor: pointer;
            /* border-radius: 2px; */
            /* font-size: 13px; */
            color: #fff;
            float: left;
            background-color: #f5a425;
            /* padding: 20px 30px; */
            /* display: inline-block; */
            border-radius: 13px;
            font-weight: 500;
            text-transform: uppercase;
            /* transition: all .3s; */
            /* border: none; */
            text-decoration: none;
            /* outline: none; */

        }

        .add:hover {
            /* background-color: teal; */
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            /* opacity: 0.9; */
        }

        .row-canv {
            display: flex;
            background-color: #ccc;
            border-radius: 2%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            /* border: 1px solid black; */
            padding: 8px;
        }

        .food-img {
            width: 200px;
            height: 180px;
            margin-right: 2px;
            border: 1px solid #fff;
        }

        .row-canv-cont {
            margin-left: 5px;
            margin-right: 2px;
            /* background-color: #ffffff; */
            width: 100%;
            height: 180px;
            /* border: 1px solid black; */
        }

        .phone_number {
            padding: 5px 2px;
            justify-content: center;
            color: black;
            float: right;
            /* font-family: serif; */
            /* margin-left: 5px; */
            /* margin-left: 1px; */
        }

        .food {
            width: 78%;
            /* margin-top: 2px; */
            border: none;
            /* border: 1px solid black; */
            height: 85px;
            text-transform:capitalize;
            text-align: center;
            justify-content: center;
            /* margin:2px; */
        }

        .contain {
            width: 99%;
            border: 1px solid black;
            height: 82px;
            padding: 15px 20px;
            margin: 4px;
            text-align: center;
        }

        .address {
            width: 70%;
            border: 1px solid #fff;
            height: 35px;
            margin: 4px;
            font-family: serif;
        }

        .total {
            background-color: white;
            /* border: none; */
            /* border: 2px solid #fff; */
            /* width: 100%; */
        }

        .quantity {
            /* margin-bottom: 5px; */
            padding: 10px 20px;
            height: 100%;
            /* <--font-family:; */
            background-color: #5bccf6;
        }

        .desp {
            width: 100%;
            background-color: white;
            height: 38px;
            float: right;
            margin-right: 2px;
            border: none;
            /* margin: 5px; */
            /* padding: 8px 8px 8px 8px; */
            display: flex;
            /* background-color: #ccc; */
            /* border: 1px solid black ; */
            text-align: center;
            justify-content: center;
        }

        .ad {
            width: 49.5%;
            /* background-color: #fff; */
            background-color: #add8e6;
            font-weight: bolder;
            font-size: 16px;
            /* text-transform:uppercase; */
            text-transform:capitalize;
            text-align:center;
            float: left;
            margin: 2px;
            border: 1px solid black;
            height: 39px;
        }

        .dp {
            width: 100%;
            float: right;
            text-align:center;
            /* text-transform:uppercase; */
            text-transform:capitalize;
            margin: 2px;
            font-weight: bold;
            font-size: 16px;
            border: 1px solid black;
            background-color: #add8e6;
            /* background-color: #5bccf6; */
            height: 39px;
        }

        .date_btn {
            background-color: #4CAF50;
            font-size: 25px;
            padding: 10px 7px;
            border-radius: 5px;
            margin-bottom: 40px;
            margin-top: 20px;
        }

        .form-group {
            float: right;
            margin-top: 30px;
            margin-right: 10%;
            /* font-weight: ; */
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
        .delete{
            padding:12px 20px;
            float:right;
            background-color:green;
            border-radius:10px;
            color:#fff;
            cursor:pointer;
            font-size:18px;
            margin-top:5px;
        }
        .page{
            text-transform:uppercase;
            color:#fff;
        }
        .admin{
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <!-- <img src="food waste1.jpg" class="bobyimage" alt=""> -->
    <div class="wrapper">
        <div class="container" style="width: 250px;">
            <h3 class="gradient-border" id="box">Leftover Food Management</h3>
            <h1 class="admin">NGO's Page</h1>
            <i class="fa-solid fa-house">
                <ul>
                    <li><a href="table.php"><span class="icon"><i class="fa fa-home fa-fw"></i></span><span class="item">HOME</span></a></li>
                    <li><a href="admincontact.php"><i class="fa fa-phone fa-fw"></i> CONTACT US</a></li>
                    <li><a href="about.php"><i class="fa fa-address-card"></i> ABOUT</a></li>
                    <li><a href="ngologin.php">LOG OUT</a></li>
                </ul>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" style="border: none; cursor:pointer;">
            <a align="start" type="button" class="date_btn" style="color: #ffff;"> <?php echo date("F") ?> Day <?php echo date(" d ") ?>
                <?php
                $time_now = mktime(date('h') + 4, date('i') + 30, date('s'));
                $date = date('H:i', $time_now);
                echo $date;
                ?></a>
        </button>
    </div>
        <!-- <h1 style="text-align:center;font-family:verdana;color:white;font-weight:bolder;" class="page" >Admin page</h1> -->
    <!-- <a href="addproduct.php" type="btn" class="add">ADD DETAILS <i class="fa fa-sign-out"></i></a> -->
    <table class="center">
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td>
                            <div class="row-canv" style="background-color:#add8e6;">
                                <img class="food-img" src="<?php echo $row['image'] ?>">
                                <div class="row-canv-cont" style="background-color:white;">
                                    <div style="display: flex; background-color:white;">
                                        <div style="background-color:#add8e6;; width:50%; font-size: 16px; height:42px; margin:2px; font-weight:bold; padding: 5px ; border: 1px solid black; color:#030e12;text-transform:capitalize;">
                                            <?php echo $row['name'] ?>
                                        </div>
                                        <div style="background-color:#add8e6; width:40%; font-size: 16px; height:42px;margin:2px; font-weight:bold; padding: 2px; display:flex;text-align:center; justify-content: center; border: 1px solid black;text-transform:capitalize;">
                                            <div><?php echo $row['due_time']?> </div>
                                        </div>
                                        <div style="background-color:#add8e6; width:40%; height:42px;margin:2px; font-weight:bold; padding: 2px; display:flex;text-align:center; justify-content: center; border: 1px solid black;">
                                            <div>Issue date:<span> <?php echo $row['issue_date'] ?></span></div>
                                        </div>
                                    </div>
                                    <div class="total">
                                        <div class="quantity" style="width:21.8%;height:38px;font-size: 16px;float:right;border: 1px solid black; font-weight:bold; background-color:#add8e6;;padding:2px;margin-bottom:10px;margin-right:2px;">
                                            <a>Quantity : <?php echo $row['quantity'] ?></a>
                                            <div class="phone_number" style="width:100%; margin-top:20px;height:42px; font-weight:bold; border: 1px solid black;background-color:#add8e6;;margin-right:1px;">
                                                <span> <a>Ph no: <?php echo $row['phonenumber'] ?></a></span>
                                            </div>
                                        </div>
                                        <div class="food">
                                            <div class="contain" style="background-color:#add8e6; text-transform:capitalize; font-weight:bold;font-size: 16px;">
                                                <span> <?php echo $row['food_details'] ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desp">
                                        <a class="ad"><?php echo $row['address'] ?></a>
                                        <a class="dp"><?php echo $row['address'] ?></a>
                                    </div>
                                </div>
                            </div>
                            <form method="post">
                                <input type="hidden" name="button1" value="<?php echo $row['id'] ?>" >
                                <button type="submit" class="delete" onclick="mydelete()" >Collected</button>
                            </form>
                            <script>
                                function mydelete(){
                                    alert("Are you sure you collected the food  !!!");
                                }
                            </script>
                        </td>
                    </tr>
                    </tboby>
            <?php
                }
            }
            ?>
    </table>

</body>

</html>