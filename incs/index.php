<?php

// print_r($_POST);
print_r($_FILES);

	handle_image($_FILES['f']['name']);

 function handle_image($fname){
		if($fname!=""){
			$type = $_FILES['f']['type'];
			if($type=="image/jpg" || $type=='image/jpeg' || $type =='image/png'){
				if($_FILES['f']['size'] <=100000 && $_FILES['f']['size']>0){
					if($type=="image/jpg"){
						$type = "jpg";
					}else if($type=="image/png"){
						$type="png";
					}else if($type=="image/jpeg"){
						$type="jpeg";
					}
					$iname = $_FILES['f']['name'].$this->user_id;
					$loc = 'users/img/'.$iname.'.'.$type;
					if(move_uploaded_file($_FILES['f']['tmp_name'], $loc)){
						return true;
						echo "sd";
					}else{
						echo "error";
					}
				}
			}
		}
		return false;		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="f">
	<input type="submit">
</form>


</body>
</html>