<?php
$flage_next = FALSE;
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fooddetails';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$message="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["from"] === "login") {
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
			$sql = "SELECT * FROM  regi WHERE email ='$email' AND password = '$password'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1) {
				//checking
				$row = mysqli_fetch_assoc($result);
				if ($row['email'] == $email && $row['password'] == $password) {
					echo 'successfully loged in';
					header("Location: ngo.php");
				} 
				else {
					echo "can not log in";
				}
			} else {
				$message="Invaild email or password";
				// echo "Invaild email or password";
			}
		} else {
			echo 'outside of if statement';
		}
	}
}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
	<style>
		body {
			/* background-image: url(foodwaste.jpg); */
			background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(foodwaste2.jpg);
			background-repeat: no-repeat;
			background-attachment: fixed;
			/* backdrop-filter: blur(2px); */
			background-size: cover;
			background-position-y: center;
		}
	</style>

</head>

<body>
	<section class="ftco-section" style="width: 100%; position:absolute; ">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="color: #fff;font-weight: bold;">Volunteer login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">volunteer</h3>
						<p style="color:red;text-align:center;"><?php echo $message ?></p>
						<form method="POST" class="login-form">
							<div class="form-group">
								<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="hidden" name="from" value="login" />
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<!-- <div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>