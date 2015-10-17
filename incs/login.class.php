<?PHP

require_once 'db_details.php';

/*

	Started : 6:13 PM 10-06-2015
	Login class deals with all the login 

	! _sets a session with USER_ID if useris successfully logged in.

*/


class login{

	public $user_id = "";

	function __construct($data){
		$this->db_connect('hf');//pass the database name where user details table contains.
		$this->handle_data($data);
	}

	private function handle_data($stuff){
		// $this->user_id = 	mysqli_real_escape_string($stuff['uid']);
		$this->uemail = mysqli_real_escape_string($this->con,$stuff['umail']);
		$this->upass =  mysqli_real_escape_string($this->con,$stuff['upass']);
		if($this->auth_this_user()){
			$this->log_this_person();
		}else{
			$this->sign_this_person();
		}

	}

	private function db_connect($db = ''){
		if($db!=""){
			$this->con = new mysqli(host,user,pass,$db);
		}else{
			die("Sorry no database name passed in login class");
		}
	}


	private function auth_this_user(){
		$id = $this->user_id;
		$qry = sprintf("SELECT user_id FROM users WHERE user_email = '%s'AND user_pass = '%s'",$this->uemail,$this->upass);
		$r = $this->con->query($qry);
		
		if(mysqli_num_rows($r)==1){
			return true;
		}else{
			return false;
		}

	}

	private function log_this_person(){
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['user_id'] = $this->user_id;
		$url = 'st/u';
		header('Location'.$url);
		exit();
	}

	public function is_logged_in() {
		if(!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION[$this->user_id])){
			return true;
		}else{
			return false;
		}
	}

	private function sign_this_person(){
		$url = "s.php";
		header('Location:'.$url);
		exit();
	}



}







?>