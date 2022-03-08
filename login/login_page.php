<!-- Script Koneksi -->
<?php
session_start();
$conn = new mysqli ("localhost","root","","prodb");
?>
<!-- Script Koneksi -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>PRO COOL | LOGIN PAGE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../img/logo-ac.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="post">
								<div class="form-group">
									<label for="name">Username</label>
									<input id="name" type="name" class="form-control" name="username" autocomplete="off">
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											<!-- Forgot Password? -->
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password">
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<!-- chekbox remember 
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>
								-->

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" value="login" name="login">
										Login
									</button>

									<!-- Proses Login -->
									<?php
                                    if (isset($_POST['login'])) 
                                    {
                                    	$nama         =    	$_POST["username"];
                                        $password     =     $_POST["password"];
                                        $take = $conn->query("SELECT * FROM customer WHERE nama='$_POST[username]' AND 
                                            password ='$_POST[password]'");
                                        $click = $take->num_rows;
                                        if ($click==1)
                                        {
	                                        #login
                                            $_SESSION['customer']=$take->fetch_assoc();
                                           	echo "<div class='alert alert-info'> Login sukses </div>";
                                            echo "<meta http-equiv='refresh' content='1;url=../home.php'>";
                                        }
                                        else
                                        {
                                        	echo "<div class='alert alert-danger'> Login gagal </div>";
                                            echo "<meta http-equiv='refresh' content='1;url=../login/login_page.php'>";
                                        }
                                    }
                                    ?>
                                    <!-- Proses Login -->

								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; PRO COOL AC 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script src="js/my-login.js"></script> -->
</body>
</html>
