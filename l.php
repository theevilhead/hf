<?php

require_once 'incs/login.class.php';
$err = "";

if(isset($_POST['login_submit']))
{
	$data['umail'] = (isset($_POST['email'])) ? $_POST['email'] : "";
	$data['upass'] = (isset($_POST['password'])) ? $_POST['password'] : "";
	$tom = new login($tom);
 }
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/btp/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/index.css">
</head>
<title>Home</title>
<body>

<?PHP

require_once 'incs/header.php';


?>


<div id="container">

<div class="small-form" style="width:48%;float:left;margin-top:50px;">
	<div class="col-xs-12 col-sm-6 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong> Sign in to continue</strong>
			</div>
			<div class="panel-body">
				<form role="form" name="loginForm" method="POST" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
					<fieldset>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group field">
									<input type="text" id="email" class="form-control input-sm input-lg" name="email" placeholder="User Email" tabindex="1">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group field">
									<!-- <label ng-show="form_data.Password" class="show-hide">Password</label> -->
									<input type="password"  name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
								</div>
							</div>
						</div>
							<?PHP 

							if(!empty($err)){
								echo '<span style="color:red">'.$err.'</span>';
							}

							?>

							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-md-6"><button  name="login_submit" type="submit" value="Submit" class="btn btn-primary btn-block btn-lg" tabindex="7">Submit</button></div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="panel-footer ">
					Don't have an account! <a href="s.php"> Sign Up Here </a>
				</div>
			</div>
		</div>
	</div>
<div class="form-beside">
	<h1>Login for your future.</h1>
	<p>
		Somthings go here . and here and here.
	</p>
</div>



</div>
</div>
</body>
</html>