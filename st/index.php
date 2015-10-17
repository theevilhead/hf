<?php

if(isset($_POST['sub'])){

			$type = $_FILES['f']['type'];
			$_SESSION['err'] = $type;
			if($type=="image/jpg" || $type=='image/jpeg' || $type =='image/png'){
				if($_FILES['f']['size'] <=100000 && $_FILES['f']['size']>0){
					if($type=="image/jpg"){
						$ty = "jpg";
					}else if($type=="image/png"){
						$ty="png";
					}else if($type=="image/jpeg"){
						$ty="jpeg";
					}
					$iname = $_FILES['f']['name'].$this->user_id;
					$loc = 'users/img/'.$iname.'.'.$ty;
					if(move_uploaded_file($_FILES['f']['tmp_name'], $loc)){
						return true;
						echo "sd";
					}else{
						echo "error";
					}
				}
			}
		}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action=""




</body>
</html>