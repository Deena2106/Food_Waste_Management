<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'foodmanagement';
$flag_next=FALSE;
$connect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_error()) {
    exit('Error connceting to the database ');
}
$flag_nextpage = FALSE;
$count = mysqli_query($connect, "SELECT username FROM food");
$count = $count->num_rows + 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // do not give empty field
    if ($_POST["from"] === "register") {
        if (empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phonenumber']))) {
            exit('please fill the value');
        }


        if ($stmt = $connect->prepare('SELECT id ,password FROM food WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $stmt->store_result();
            // username or password already exits means 
            if ($stmt->num_rows > 0) {
                echo 'Username or password is alread exits . try again ';
            } else {
                // in database we hide the password
                if ($stmt = $connect->prepare('INSERT INTO food (id,username,password,email,phonenumber) VALUES(?,?,?,?,?)')) {
                    $password = $_POST['password'];
                    $stmt->bind_param('sssss', $count, $_POST['username'], $password, $_POST['email'], $_POST['phonenumber']);
                    $stmt->execute();
                    $table_name = explode('@', $_POST['email'])[0];
                    $create_table = "CREATE TABLE $table_name(id int NOT NULL UNIQUE AUTO_INCREMENT,name varchar(255),qnty_num int , qnty_unit varchar(20),price decimal,purchace_date varchar(40),used varchar(30),available varchar(30))";
                    if ($connect->query($create_table) === TRUE) {
                        $flag_nextpage = TRUE;
                    } else {
                        echo "Error creating table: " . $connect->error;
                    }

                    //header('Location: homepage.html');
                } else {
                    echo 'Error occured please try again';
                }
            }
            // $stmt->close();
        }
    }

    if ($_POST["from"] === "login") {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST["email"];
            //echo isset($email);
            $password = $_POST["password"];
            if (isset($email) && isset($password)) {
                if (empty($email)) {
                    //header("Location: login_index.php? error=Email is is required");
                    //exit();
                    echo "email is required";
                } else if (empty($password)) {
                    //header("Location: login_index.php? error=Password is is required");
                    // exit();
                    echo "password is required";
                }
                $sql = "SELECT * FROM  food WHERE email ='$email' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    //checking
                    $row = mysqli_fetch_assoc($result);
                    if ($row['email'] == $email && $row['password'] == $password) {
                        echo 'successfully loged in';
                        $table_name = explode('@', $email)[0];
                        $flag_next = TRUE;
                    } else {
                        echo "can not log in";
                    }
                } else {
                    echo "Invaild email or password";
                }
            } else {
                echo 'outside of if statement';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Registration and Sign in Page
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="new_style.css" type="text/css">
</head>

<body>
    <div class="Registration">
        <div class="hero">
            <div class="form">
                <div class="button">
                    <div id="color"></div>
                    <button type="button" class="regi" onclick="registration()">Register</button>
                    <button type="button" class="regi" onclick="log_in()">Log In</button>
                </div>
                <form method="POST" id="login" class="input-element2">
                    <div class="input-container">
                        <i style="font-size: 20px;" class="fa fa-envelope icon"></i>
                        <input type="email" class="input-field" name="email" placeholder="Email@gmail.com" required>
                    </div>
                    <div style="display: flex;" class="input-container">
                        <i style="font-size: 20px;" class="fa fa-key icon"></i>
                        <input type="password" class="input-field" name="password" placeholder="password" required>
                    </div>
                    <input type="hidden" name="from" value="login"/>
                    <button type="submit" class="submit">Log In</button>
                </form>
                <?php if ($flag_next === TRUE) : ?>
                    <form id="myForm" action="Table.php" method="post">
                        <input type="hidden" name='name' value='<?php echo $table_name; ?>'>
                        <?php
                        /*foreach ($_POST as $a => $b) {
                            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
                            }*/
                        ?>
                    </form>

                    <script type="text/javascript">
                        document.getElementById('myForm').submit();
                    </script>
                <?php endif ?>
                <form  method="POST" id="register" class="input-element">
                    <div class="input-container">
                        <i style="font-size: 20px;" class="fa fa-user icon"></i>
                        <input type="text" class="input-field" name="username" placeholder="User name" required>
                    </div>
                    <div class="input-container">
                        <i style="font-size: 20px;" class="fa fa-envelope icon"></i>
                        <input type="email" class="input-field" name="email" placeholder="Email@gmail.com" required>
                    </div>
                    <div class="input-container">
                        <i style="font-size: 20px;" class="fa fa-key icon"></i>
                        <input type="password" class="input-field" name="password" placeholder="password" required>
                    </div>
                    <div class="input-container">
                        <i style="font-size: 20px;" class="fa fa-phone icon"></i>
                        <input type="text" class="input-field" name="phonenumber" placeholder="Phone Number" required>
                    </div>
                    <input type="hidden" name="from" value="register" />
                    <button type="submit" class="submit">Register</button>
                </form>
            </div>
        </div>
        <?php if ($flag_nextpage === TRUE) : ?>
            <form id="myForm" action="Table.php" method="post">
                <input type="hidden" name='name' value='<?php echo $table_name; ?>'>
                <?php
                /*foreach ($_POST as $a => $b) {
                echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
            }*/
                ?>
            </form>
        <?php endif ?>
        
    </div>
    <script>
        var a = document.getElementById("register");
        var b = document.getElementById("login");
        var c = document.getElementById("button");
        var d = document.getElementById("color");

        function log_in() {
            d.style.left = "110px";
            a.style.left = "-400px";
            b.style.left = "50px";
            c.style.left = "110px";
        }

        function registration() {
            d.style.left = "0";
            a.style.left = "50px";
            b.style.left = "450px";
            c.style.left = "0";
        }
        document.getElementById('myForm').submit();
    </script>
</body>

</html>