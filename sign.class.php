<?php

/*
	class for signing the user up

*/

class sign{

	function __construct($data){

	}

	private function handle_data($stuff){

		foreach ($stuff as $key => $value) {
			switch ($key) {
				case 'fname':if(!$this->validate_name($value)){
									array_push($this->err,"Please enter a first name");
								}
				case 'lname':if(!$this->validate_name($value)){
									array_push($this->err,"Please enter a second name");
								}
				case 'email':if(!$this->validate_email($value))
								{
									array_push($this->err,"Please enter a valid email");
								}
							break;
				case 'college':if(!$this->validate_college($value))
								{
									array_push($this->err,"Please select a valid college");
								}
							break;
				case 'image':if(!$this->handle_image($value)){
									array_push($this->err,"Please upload a proper file");
								}
				default:
					# code...
					break;
			}

		}
	}

	private function validate_name($name){
		// match a name that only contains text nothing else 

		die("sorry bro update validate_name function in sign class");
	}

	private function validate_email($email){
		return filter_var($email,FILTER_VALIDATE_EMAIL);
	}

	private function validate_mobile($num){
		if(!is_integer($num)){
			return false;
		}else{
			// match the pattern of phone number.
		}
	}

	private function validate_college($col){
		$col = array();

		// College list goes here

		$col_cate['pu'] = [
						"21m4o1",
						"126ad2",
						"oi7sdf"
					 ];
		$col_cate['en'] = [
						"asfkj3",
						"213dj3",
						"sad872"
					 ];

		// College list ends here.

		
	    if($cat!=="pu" || $cat!=="en"){
	    	return false;
	    }else{
	    	$col_name = substr($col, start)
			$slen = strlen($col_name);
	   		$cat = strtolower(substr($col,2,$slen));
	    	if(strlen($col_name)>6){
	    		return false;
	    	}
	    	foreach ($col[$cat] as $value) {
	    		if($value===$col_name){
	    			return true;
	    		}
	    	}
	    	return false;
	    }
	}

}


?>