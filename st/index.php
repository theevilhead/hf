<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invite To Your Friends For a good social Cause.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Le styles -->
    <link href="../assets/btp/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/index.css">

</head>
<body>

<?PHP require_once '../incs/header.php';
      require_once '../incs/db_details.php';
 ?>

<div id="container">
<div class="cotainer-wrap">

<div class="panel panel-default">
   <div class="panel-heading">
   <strong>Students Repository</strong>
   </div>
   <div class="panel-body">
      <table class="table">
         <thead>
            <tr>
               <th>Profile Image</th>
               <th>Student Name</th>
               <th>College Name</th>
            </tr>
         </thead>
         <?PHP 

         $qry = sprintf("SELECT user_photo,user_id,user_email,user_fname,user_lname,user_college FROM users LIMIT 10");
         $con = new mysqli(host,user,pass,'hf');
         $res = $con->query($qry);
         $stuff = [];
         while($r = $res->fetch_assoc()) {
            $stuff[] = $r;
         }
         $num = mysqli_num_rows($res);

         ?>
         <tbody>
<?PHP
for($i=0;$i<$num;$i++) {
        echo '<tr class="active">
               <td><a href="u?uid='.$stuff[$i]['user_id'].'"><img src="'.$stuff[$i]['user_photo'].'" style="border-radius:50%;" class="img-responsive" width="100" height="100"></a></td>
               <td>'.$stuff[$i]['user_fname'].' '.$stuff[$i]['user_lname'].'</td>';
               '<td>'.$stuff[$i]['user_college'].'</td>';
            '</tr>';
}

?>        </tbody>
      </table>
   </div>
</div>
</div>
</div>


</body>
</html>