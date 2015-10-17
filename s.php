<?php

require_once 'incs/sign.class.php';

if(isset($_POST['sign_submit'])){

	$data['fname']  = (isset($_POST['fname']))?$_POST['fname']:"";
	$data['lname'] 	= (isset($_POST['lname']))?$_POST['lname']:"";
	$data['email'] 	= (isset($_POST['email']))?$_POST['email']:"";
	$data['pass'] 	= (isset($_POST['pass'])) ? $_POST['pass']:"";
	$data['mobile'] = (isset($_POST['mobile']))?$_POST['mobile']:"";
	// $data['col_acc']= (isset($_POST['col_acc']))?$_POST['col_acc']:"";
	$data['isfc']   = (isset($_POST['isfc']))?$_POST['isfc']:"";
	$data['college'] = (isset($_POST['college']))?$_POST['college']:"";

	$e=0;

	foreach ($data as $key => $value) {
		if($value==""){
			$err = "All fields are compulsory";
			$e=1;
		}
	}
	if($e==0){
		$tom = new sign($data);
		$err = $tom->err;	
	}
	
}


?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/btp/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/index.css">
</head>
<title>Home</title>
<body>

<div id="header">
	<div class="header-wrap">
		<div class="logo">
			Smarty pants
		</div>
		<div class="nav">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">Students list</a></li>
				<li><a href="">Log in</a></li>
				<li><a href="">Start a campaign</a></li>
			</ul>
		</div>
	</div>
</div>


<div id="container">

<div id="form">
<div class="row" style="margin-top:80px">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Please Sign Up <small>It's free and always will be.</small></strong>
			</div>
			<div class="panel-body">
				<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<fieldset>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 								<input type="text" name="fname" id="first_name" class="form-control input-sm input-lg" placeholder="First Name" tabindex="1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 									<input type="text" name="lname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 									<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Your email" tabindex="4">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 									<input type="number" name="mobile" id="mobile_number" class="form-control input-lg" placeholder="Mobile Number" tabindex="2">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 									<input type="text" name="col_acc" class="form-control input-lg" placeholder="College Account Number" tabindex="4">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
 									<input type="text" name="isfc" id="mobile_number" class="form-control input-lg" placeholder="IFSC Code" tabindex="2">
								</div>
							</div>
						</div>

						<div class="row">
						<div class="form-group field col-xs-12 col-sm-6 col-md-6">
							<!-- <input type="text" name="college" class="form-control input-lg" placeholder="College" tabindex="4"> -->
							<select class="form-control input-lg" name="college">
								<option value="asfkj3">College one</option>
								<option value="213dj3">College two</option>
								<option value="sad872">College three</option>
							</select>
						</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group field">
									<input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Password">
								</div>
							</div>
						</div>
						<?PHP
						if(!isset($_SESSION)){
							session_start();
						}
						if(isset($err)){
							// if($err!=""){
								// echo '<div sty;e="color:red">'.$err.'</div>';
							// }
							print_r($err);
						}else if(isset($_SESSION['err'])){
							foreach ($_SESSION['err'] as $value) {
								echo '<div style="color:red">'.$value.'</div>';
							}
								print_r($_SESSION['err']);
							
						}
						?>
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-md-6"><button type="submit" value="submit" name="sign_submit"  class="btn btn-success btn-block btn-lg">Submit</button></div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
</div><!-- /.modal -->

</div>

</div>

</body>
</html>
