<?PHP 

require_once '../../incs/db_details.php';

if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	$qry = sprintf("SELECT * FROM users WHERE user_id = '%s'",$uid);
	$con = new mysqli(host,user,pass,'hf');
	$res=$con->query($qry);
	$stuff = mysqli_fetch_assoc($res);
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invite To Your Friends For a good social Cause.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Le styles -->
    <link href="../../assets/btp/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/index.css">

</head>
<body>

<?PHP require_once '../../incs/header.php'; ?>

<div id="container">
<div class="cotainer-wrap">


<div class="row" style="margin-top:80px">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Student Details</strong>
			</div>
			<div class="panel-body">
				<div class="row">	
					<div class="col-xs-12 col-sm-6 col-md-6">
						<img src="<?PHP echo $stuff['user_photo']; ?>" class="img-responsive" alt="Cinque Terre" width="200" height="200"> 
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">

					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<br>
						<div style="padding-left:10px;"><a href="" class="btn btn-primary btn-lg">Start a campaign</a></div>
						<h3 style="padding-left:10px;">Student Name: <?PHP echo $stuff['user_fname'].' '.$stuff['user_lname']; ?></h3>
						<h3 style="padding-left:10px;">College Name: <?PHP echo $stuff['user_college'];?></h3>
						<h3 style="padding-left:10px;">Email: <?PHP echo $stuff['user_email'];?></h3>
					</div>
				</div>
				<hr class="colorgraph">
				<!-- <div class="row">
					<div class="col-xs-12 col-md-6"><input type="submit" value="Button 1" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
 			<div class="col-xs-12 col-md-6"><a href="#/" class="btn btn-success btn-block btn-lg">Button 2</a></div>
 		</div> -->
 	</div>
 </div>
</div>
</div>



</div>
</body>
</html>
