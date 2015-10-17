<?PHP
require_once 'incs/db_details.php';

class ssign{
  function __construct($data){
    $this->db_connect('hf');
    $this->money  = mysqli_real_escape_string($this->con,$data['money']);
    $this->edate  = mysqli_real_escape_string($this->con,$data['edate']);
    $this->reason = mysqli_real_escape_string($this->con,$data['reason']);
    $this->handle_data();
  }

  private function db_connect($db){
    $this->con = new mysqli(host,user,pass,$db);
  }

  private function handle_data(){
    if($this->is_logged_in()){
      $this->generate_camp_id();
        $qry = sprintf("INSERT INTO user_stuff (campaign_id,user_id,honey) VALUES('%s','%s','%s')",$this->camp_id,$this->user_id,$this->money);
        $r = $this->con->query($qry);
        if($r){
          $this->msg = "Thank your";
        }else{
          $this->msg = "error try later";
        }
      }else{
        header('Location:/s.php');
      }
    }
    
  public function is_logged_in() {
    if(!isset($_SESSION)){
      session_start();
    }
    if(isset($_SESSION['user_id'])){
      return true;
    }else{
      return false;
    }
  }

  private function generate_camp_id(){
    $t = md5(time());
    $this->camp_id = $t;
  }

}


if(isset($_POST['ss_submit'])){
  $err = 0;
  print_r($_FILES['profile_img']);

  $data['amt'] = (isset($_POST['amt']))? $_POST['amt'] : "";
  $data['edate'] = (isset($_POST['edate']))?$_POST['edate']:"";
  $data['reason'] = (isset($_POST['reason']))?$_POST['reason']:"";
  $data['money'] = (isset($_POST['money']))?$_POST['money']:"";
  $data['income_img'] = (isset($_FILES['income_img']['name'])) ? $_FILES['income_img']['name'] : "";
  $data['profile_img'] = (isset($_FILES['profile_img']['name'])) ? $_FILES['profile_img']['name'] :"";
print_r($data);
  // foreach ($data as $value) {
  //   if($value==""){
  //     $err = 1;
  //   }
  // }
  if($err == 1){
    $err = "All fields are mandatory";
  }else{
    $tom = new ssign($data);
    $err = $tom->msg;
  }
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
    <link href="assets/btp/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-bottom: 40px;
     }
 input,textarea{
  width: 100%;
  padding: 10px;
 }
      .form-signin {
        max-width: 500px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
       border: 1px solid #e5e5e5;
       -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
      }

    </style>
    <link href="assets/btp/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/index.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
 
    <!-- Fav and touch icons -->
  </head>
 
  <body>
<?PHP

require_once 'incs/header.php';


?> 

    <div id="container" class="container">
    <center><strong><p class="txt_white">Please fill in to submit your campaign. However, it will be live only after the admin's approval.</p></strong></center>
     <form class="form-signin"  enctype="multipart/form-data" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
 <div class="control-group">
   <label class="control-label"><b>Amount</b></label>
   <div class="controls">
     <input type="text" id="inputAmount" name="amt" placeholder="Enter the Expected Amount">
   </div>
 </div>
 <div class="control-group">
   <label class="control-label"><b>Campaign End Date</b></label>
   <div class="controls">
     <input type="date" name="edate"  id="end">
   </div>
 </div>
 <div class="control-group">
   <label class="control-label"><b>Please Upload Your Image</b></label>
   <div class="controls">
   <input type="file" name="income_img">
   </div>
 </div>
 <div class="control-group">
   <label class="control-label"><b>Upload Your Income Certificate</b></label>
   <div class="controls">
     <input type="file" name="profile_img">
   </div>
 </div>
 <div class="control-group">
   <label class="control-label"><b>Description</b></label>
   <div class="controls">
     <textarea rows="6" name="reason" placeholder="Please Enter your problem in not more than 500 words"></textarea>
   </div>
 </div>
 <?PHP 

 if(isset($err)&&!empty($err)){
  echo '<div>'.$err.'</div>';
 }


 ?>
     <button type="submit" name="ss_submit" class="btn">Submit</button>
   </div>
</form>
 
   </div> <!-- /container -->
 
   <!-- Le javascript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="assets/btp/js/jquery.js"></script>
   <script src="assets/btp/js/bootstrap-transition.js"></script>
   <script src="assets/btp/js/bootstrap-alert.js"></script>
   <script src="assets/btp/js/bootstrap-modal.js"></script>
   <script src="assets/btp/js/bootstrap-dropdown.js"></script>
   <script src="assets/btp/js/bootstrap-scrollspy.js"></script>
   <script src="assets/btp/js/bootstrap-tab.js"></script>
   <script src="assets/btp/js/bootstrap-tooltip.js"></script>
   <script src="assets/btp/js/bootstrap-popover.js"></script>
   <script src="assets/btp/js/bootstrap-button.js"></script>
   <script src="assets/btp/js/bootstrap-collapse.js"></script>
   <script src="assets/btp/js/bootstrap-carousel.js"></script>
   <script src="assets/btp/js/bootstrap-typeahead.js"></script>
 
 </body>
</html>