<?php

require_once 'incs/db_details.php';

/*
class for signing the user up
	fname
	lname
	princi
	email
	college
	mobile number
	image
	college account number 
	isfc of the college account bank

*/

class sign{
	public $lname = "";
	public $fname = "";
	public $umail = "";
	public $col = "";
	public $isfc = "";
	public $mob = "";
	public $upass = "";
	public $acc = "";
	public $edate = "";

	public $msg = array();
	public $err = array();

	function __construct($data){
		$this->gen_user_id();
		$this->db_connect('hf');
		$this->handle_data($data);
	}

	private function db_connect($db){
		$this->con = new mysqli(host,user,pass,$db);
	}

	private function handle_data($stuff){
		foreach ($stuff as $key => $value) {
			$stuff[$key] = mysqli_real_escape_string($this->con,$value);
		}
		foreach ($stuff as $key => $value) {
			switch ($key) {
				case 'fname': if(preg_match('/^[a-zA-Z]+$/', $value)!=1){
									array_push($this->err,"Please enter a first name");
								}else{
									$this->fname=$value;
								}
								break;
				case 'pass' : if($value==""){
									array_push($this->err,"Please enter a valid password");
								}else{
									$this->upass = $value;
								}
								break;
				case 'lname': if(preg_match('/^[a-zA-Z]+$/', $value)!=1){
									array_push($this->err,"Please enter a second name");
								}else{
									$this->lname = $value;
								}
								break;
			    // case 'princi':if(preg_match('/^[a-zA-Z]+$/', $value)!=1){
							// 		array_push($this->err,"Please enter a second name");
							// 	}
							// 	break;
				case 'email': if(!$this->validate_email($value))
								{
									array_push($this->err,"Please enter a valid email");
								}
							break;
				case 'college':if(!$this->validate_college($value))
								{
									array_push($this->err,"Please select a valid college");
								}
							break;
				case 'image':  if(!$this->handle_image($value)){
									array_push($this->err,"Please upload a proper file");
								}
							break;
				case 'isfc':   if(!$this->validate_isfc($value))
								{
									array_push($this->err,'Please enter a valid isfc');
								}
							break;
				case 'mobile': if(!$this->validate_mobile($value)){
									array_push($this->err,"Enter a valid mobile number");
								}else{
									$this->mob = $num;
								}
							break;
				case 'edate' : if(empty($value)){
								array_push($this->err,"Enter a valid campaign end date");
							}else{
								$this->edate = $value;
							}
				case 'acc' : $this->acc=$value;
							break;
				default:
					array_push($this->err,"There is something wrong come back later");
					break;
			}
		if($this->is_valid_user()){
			if(count($this->err)==0){
				$this->sign_in();
			}else{
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION['err'] = $this->err;
				header('Location:/s.php');
				exit();
			}
		}	
	}}

	private function is_valid_user(){
		$qry = sprintf("SELECT user_id FROM users WHERE user_email = '%s'",$this->umail);
		$r = $this->con->query($qry);
		if(mysqli_num_rows($r)>0){
			return false;
		}else{
			return true;
		}
	}

	private function handle_image($fname){
		// if($fname!=""){
		// 	$type = $_FILES['f']['type'];
		// 	$_SESSION['err'] = $type;
		// 	if($type=="image/jpg" || $type=='image/jpeg' || $type =='image/png'){
		// 		if($_FILES['f']['size'] <=100000 && $_FILES['f']['size']>0){
		// 			if($type=="image/jpg"){
		// 				$ty = "jpg";
		// 			}else if($type=="image/png"){
		// 				$ty="png";
		// 			}else if($type=="image/jpeg"){
		// 				$ty="jpeg";
		// 			}
		// 			$iname = $_FILES['f']['name'].$this->user_id;
		// 			$loc = 'users/img/'.$iname.'.'.$ty;
		// 			if(move_uploaded_file($_FILES['f']['tmp_name'], $loc)){
		// 				return true;
		// 				echo "sd";
		// 			}else{
		// 				echo "error";
		// 			}
		// 		}
		// 	}
		// }
		// return false;
		return true;		
	}

	private function sign_in(){
		// $qry = sprintf("INSERT INTO users (user_id,user_email,user_pass,user_study,user_mobile,user_fname,user_lname,user_col_acc,user_col_isfc) VALUES('%s','%s','%s','%s','%d','%s','%s','%d','%s')",$this->user_id,$this->umail,$this->upass,$this->col,$this->mob,$this->fname,$this->lname,$this->acc,$this->isfc);
		$qry = sprintf("INSERT INTO users (user_id,user_email,user_pass,user_study,user_mobile,user_fname,user_lname,user_col_acc,user_col_isfc) VALUES('%s','%s','%s','%s','%d','%s','%s','%d','%s')",$this->user_id,$this->umail,$this->upass,$this->col,$this->mob,$this->fname,$this->lname,$this->user_col_acc,$this->user_col_isfc);
		$r = $this->con->query($qry);
		if($r){
			header('Location:/');
			exit();
		}
	}

	private function validate_name($name){
		// match a name that only contains text nothing else 
		if(preg_match('/^[a-zA-Z]+$/', $name)==1){
			return true;
		}
		return false;
	}

	private function validate_email($email){
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			$this->umail = $email;
			return true;
		}
		return false;
	}

	private function validate_mobile($num){
			// $pat = '';
			// if(preg_match($pat, $num)){
				$this->mob = $num;
			// 	return true;
			// }else{
			// 	return false;
			// }
			return true;
	}

	private function validate_college($col){
		// College list goes here

		// $col_cate['pu'] = [
		// 				"21m4o1",
		// 				"126ad2",
		// 				"oi7sdf"
		// 			 ];
		$col_cate = [
						"asfkj3",
						"213dj3",
						"sad872"
					 ];

		// College list ends here.

		$cat = strtolower(substr($col,0,2));
		
	  //   if($cat!=="pu" || $cat!=="en"){
	  //   	return false;
	  //   }else{
	  //   	$col_name = substr($col, start);
			// $slen = strlen($col_name);
	  //  		$cat = strtolower(substr($col,2,$slen));
	  //   	if(strlen($col_name)>6){
	  //   		return false;
	  //   	}
	  //   	foreach ($col[$cat] as $value) {
	  //   		if($value===$col_name){
	  //   			$this->col = $col;
	  //   			return true;
	  //   		}
	  //   	}
	  //   	return false;
	  //   }

	    	foreach ($col_cate as $value) {
	    		if($value==$col){
	    			$this->col = $col;
	    			return true;
	    		}
	    	}
	    	return false;

	}


	private function validate_isfc($i){
		$pat = '/^[a-zA-Z0-9]+$/';
		if(preg_match($pat,$i)==1){
			$this->isfc = $i;
			return true ;
		}
		return false;
	}

	private function gen_user_id(){
		$this->user_id = md5(time());
	}

}


?>