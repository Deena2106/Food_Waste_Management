<?php
$flag_next = FALSE;
$target_dir = "images/";
$uploadOk = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table_name = 'food';
    $tablename = explode('@', $table_name)[0];
    $flag_next = FALSE;
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'fooddetails';
    $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_error()) {
        exit('Error connceting to the database ');
    }
    $flag_nextpage = FALSE;
    $unit = $_POST['joke'];
    $P_name = $_POST['name'];
    $P_issue_date = $_POST['issue-date'];
    $P_due_date = $_POST['due-date'] . " " . $unit;
    $P_phone = $_POST['phonenumber'];
    $P_details = $_POST['details'];
    $P_quantity = $_POST['quantity'];
    $P_image = $_POST['image'];
    $P_address = $_POST['address'];
    $P_description = $_POST['description'];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $sql = "INSERT INTO  $tablename (name,issue_date,due_time,phonenumber,food_details,quantity,image,address,description) VALUES( '$P_name', '$P_issue_date', '$P_due_date','$P_phone', '$P_details','$P_quantity','$target_file','$P_address','$P_description')";


    if ($conn->query($sql) === TRUE) {
        $flag_nextpage = TRUE;
        echo $target_file;
        header("Location: table.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="addproduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(foodwaste2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(2px); */
            background-size: cover;
            background-position-y: center;
            /* position: absolute; */
            /* font-style: normal; */
            /* padding: 10px; */
            /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
        }

        .container1 {
            /* max-width: 700px; */
            width: 100%;
            /* border: 1px solid black; */
            height: 100%;
            background-color: #fff;
            padding: 6px 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container1 .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            text-align: center;
        }

        .container1 .title::before {
            content: "";
            position: absolute;
            left: 47%;
            /* text-align: center; */
            bottom: 0;
            height: 3px;
            margin-top: 2px;
            width: 50px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .star {
            color: red;
            font-weight: bolder;
        }

        form .input-box-add span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box-add input {
            height: 80px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
            /* text-transform: capitalize; */
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        .user-details .input-box-add input:focus,
        .user-details .input-box-add input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three {
            background: #9b59b6;
            border-color: #d9d9d9;
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            /* height: 100%; */
            text-decoration: none;
            /* width: 100%; */
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .button {
            width: 100%;
            height: 100%;
        }

        form #button a:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }
        }

        .back {
            top: 0%;
            padding: 10px 20px;
            background-color: #71b7e6;
            color: #fff;
            text-align: start;
            float: left;
            text-decoration: none;
            border-radius: 5px;
        }

        .cont {
            /* display: block; */
            display: inline;
            position: relative;
            margin-top: 10px;
            margin-bottom: 12px;
            padding-left: 35px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* .cont label{
    display: flex;
} */
        .cont input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        .cont:hover input~.checkmark {
            background-color: #ccc;
        }

        .cont input:checked~.checkmark {
            background-color: #2196F3;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .cont input:checked~.checkmark:after {
            display: block;
        }

        .cont .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

        #image {
            display: flex;
            width: 100%;
        }

        .upload {
            cursor: pointer;
        }

        .sub {
            /* text-align: center;
            padding: 10px 30px;
            background-color: #2196F3;
            justify-content: center;
            text-decoration: none; */

            text-decoration: none;
            padding: 15px 30px;
            width: 100%;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
    </style>
</head>

<body style="width:100%;">
    <div class="container1">
        <div class="title">Add Details</div>
        <div class="content">
            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name <span class="star">*</span></span>
                        <input type="text" name="name" autocapitalize="on" placeholder="Enter your name" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Issue Date <span class="star">*</span></span>
                        <input type="date" name="issue-date" placeholder="Enter your date" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Due time <span class="star">*</span></span>
                        <input type="time" name="due-date" placeholder="Enter your due time" required />
                        <!-- <label class="cont">AM
                            <input type="radio" checked="checked" name="joke" value="AM" required>
                            <span class="checkmark"></span>
                        </label>
                        <label class="cont">PM <span class="star">*</span>
                            <input type="radio" checked="checked" name="joke" value="PM" required>
                            <span class="checkmark"></span>
                        </label> -->
                    </div>
                    <div class="input-box">
                        <span class="details">Phone number <span class="star">*</span> </span>
                        <input type="text" name="phonenumber" placeholder="Enter your phone number" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Food Details <span class="star">*</span></span>
                        <input type="text" name="details" autocapitalize="on" placeholder="Enter your food details" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Quantity <span class="star">*</span></span>
                        <input type="text" name="quantity" placeholder="Enter Quantity" required />
                    </div>
                    <div class="input-box" id="image">
                        <span class="details">Image </span>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        
                        <!-- <input type="file" name="image" value="image" accept="image/*" style="width: 160%;"/>
                        <input class="upload" type="submit" name="upload" value="upload"/> -->
                    </div>
                    <div class="input-box-add" style="height: 100px; width: 100%">
                        <span class="details">Address <span class="star">*</span> </span>
                        <input type="text" name="address" placeholder="Enter you address" required />
                    </div>
                    <div class="input-box-add" style="height: 80px; width: 100%; margin-top: 10px">
                        <span class="details">Description </span>
                        <input type="text" name="description" placeholder="Enter you Description" />
                    </div>
                </div>
                <div class="button">
                    <input type="submit" href="table.php" value="submit" name="submit" />
                </div>
                <!-- <a class="back" href="table.php" type="button">Back to list </a> -->
            </form>
            <?php if ($flag_next === TRUE) : ?>
                <form id="myform" action="table.php" method="GET">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script> -->
            <?php endif ?>
        </div>
    </div>
</body>

</html>