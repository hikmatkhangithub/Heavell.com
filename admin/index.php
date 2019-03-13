<html >
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="author" content="Kafle" />
		<!-- Application custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='//fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>

	</head>
	<body id ="formForLogin">
		<div class="login-form">
						<h1>Welcome to Admin Log In</h1>
		<form method="post" action="validation.php" >
					<li>
						<input type="text" class="text" value="User Name" name="userName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="password" value="Password" name ="password"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					
					 <div class ="forgot">
						<input type="submit" name="submit" onclick="myFunction()" value="Sign In" > <a href="#" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
					</div>
				</form>
			</div>				
		</form>



		</div>
	</body>
</html>
