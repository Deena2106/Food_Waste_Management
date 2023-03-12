<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Details</title>
    <!-- <link rel="stylesheet" href="table.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            background-color: hsl(220, 33%, 96%);
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(foodwaste2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* backdrop-filter: blur(2px); */
            background-size: cover;
            background-position-y: center;
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

        .total {
            margin-left:16.5%;
            /* margin-right:10%; */
            background-color:#fff;
            /* margin-bottom: 80px; */
            opacity: 0.7;
            /* text-align:center; */
        }

        .food_img {
            width: 45%;
            justify-content: center;
            padding: 30px 20px;
            /* height:40px; */
            /* margin-left:30px; */
            margin-left: 7%;
            opacity: 1;
            /* border: 2px solid black; */
        }

        .content {
            font-family: 'Times New Roman', Times, serif;
            /* padding: 20px 40px; */
            /* margin-left:20px; */
            /* margin-right:20px; */
            text-align: center;
            /* text-indent: 50px; */
            font-size: 18px;
            font-weight: 600;
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
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container" style="width:250px;">
            <h3 class="gradient-border" id="box">Food Waste Management</h3>
            <i class="fa-solid fa-house">
                <ul style="list-style: none;">
                    <li><a href="table.php"><i class="fa fa-home fa-fw"></i> HOME</a></li>
                    <li><a href="contact.php"><i class="fa fa-phone fa-fw"></i> CONTACT US</a></li>
                    <li><a href="about.php"><i class="fa fa-address-card"></i> ABOUT</a></li>
                    <li><a href="#"><i class="fa fa-"></i>ABCD</a></li>
                </ul>
        </div>
    </div>
    <div class="total">
        <div style="display:flex;">
        <img src="food.jpg" alt="" class="food_img">
        <p class="content" style=" text-indent: 50px; margin-top:50px;">The severe gradual increase in the food waste can be seen in recent years.
            <br><br>
            According to Food and Agriculture Organization (FAO), one third of food 
            <br><br>
            produced by humans for human consumption is wasted all over the world, which   
            <br><br>
            is almost 1.3 billion ton per year,on another side twenty percentage of people  
            <br><br>
            in all over population struggling for food in severe food shortages as per a 
            <br><br>
            World Health Organization report. This web-based application helps to collect 
            <br><br>
            the food from the donors and to distribute it to the people in need. This is the 
            <br><br>
            basic concept and the main objective of this project.
        </p>
    </div>
        <br>
        <br>
        <h2 class="head" style="font-weight: bold;font-family: 'Times New Roman', Times, serif; margin-left:140px;">INTRODUCTION</h2>
        <br>
        <p class="content" style=" text-indent: 50px;">
            The basic concept of this project entitled “Web based application for Food Waste Management system” is to collect the
            <br><br>
            excess/leftover food from donors such as hotels, restaurants, marriage halls, etc. and distribute to the needy people through NGOs.
            <br><br>
            NGOs will collect the leftover or excess food from above mentioned venues for the distribution to the needy people. This web-based
            <br><br>
            application for food waste management system can assist in collecting leftover food from hotels, restaurants, marriage halls,
            <br><br>
            social, political functions& religious events to distribute among those who are in need. NGOs, that are helping poor communities
            <br><br>
            to battle against starvation and malnutrition, can raise a request for supply of excess/left-over food from restaurants through this 
            <br><br>
            application. Once the request is accepted, the NGOs can collect the food from the venue for distribution. In this way this web-based 
            <br><br>
            application for food waste management will help the donors to reduce food waste and help in feeding the poor and needy people.
    </p>
    <br><br>
        <h2 class="head" style="font-family: 'Times New Roman', Times, serif; margin-left:140px;"> EXISTING SYSTEM </h2>
        <br>
        <p class="content" style="text-indent: 50px;">
            People who wish to donate items need to personally visit the organizations and donate foods or other items. Otherwise, they 
            <br><br>
            must search for some websites to donate surplus food. In general, the large manufacturers,wholesalers, and organized community
            <br><br>
            provide food items to food banks or waste tons of food daily. They must search for some organization that needs food. This process
            <br><br>
            involves a lot of time to contact the organization to check the requirement. If they do not need the food, then the person must contact 
            <br><br>
            another organization. This makes the donor tired and exhausted.
        </p>
    </div>
</body>

</html>