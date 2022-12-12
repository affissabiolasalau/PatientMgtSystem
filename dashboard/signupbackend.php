<?php
if(!isset($_SESSION)){
   session_start();
}

$con = new mysqli("localhost", "root", "", "babs_pms");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['todo']))
{
// Collect the data from post method of form submission //
$todo=mysqli_real_escape_string($con,$_POST['todo']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$password1=mysqli_real_escape_string($con,$_POST['password1']);
$password2=mysqli_real_escape_string($con,$_POST['password2']);

$errormsg = "";
$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok

      //$walletd = substr(str_shuffle("123456789"),0,1);
 /*      $walleti = substr(str_shuffle("123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ"),0,8);
       $walletid = 'LC'.$walleti.'';

if($walletid==''){
$msg=$msg."Browser not supported, please try another browser.<BR>";
$status= "NOTOK";
}

if(!is_numeric($phone)){
$msg=$msg."Mobile number is invalid.<BR>";
$status= "NOTOK";}
*/

$remail=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE email = '$email'");
$re = mysqli_fetch_row($remail);
$nremail = $re[0];
if($nremail==1){
$msg=$msg."Email already in use.<BR>";
$status= "NOTOK";
}

if (!preg_match("/^[_\.a-zA-Z0-9-]+@[a-zA-Z0-9-][a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/i", trim($_POST ['email']))){
$msg=$msg."Incorrect Email Address Format.<BR>";
$status= "NOTOK";}

if ( strlen($password1) < 6 ){
$msg=$msg."Password should be more than 6 characters<BR>";
$status= "NOTOK";}

if ($password1 != $password2 ){
$msg=$msg."Password do not match<BR>";
$status= "NOTOK";}

if(is_numeric($fname) || is_numeric($lname)){
$msg=$msg."Name Not Accepted.<BR>";
$status= "NOTOK";}

if($fname == "" || $lname == ""){
$msg=$msg."No field should be empty.<BR>";
$status= "NOTOK";}

if (!empty($_SERVER['HTTP_CLIENT_IP'])){
 $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
 $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
 $ip=$_SERVER['REMOTE_ADDR'];
}
//The value of $ip at this point would look something like: "192.0.34.166"
$ip = ip2long($ip);
//The $ip would now look something like: 1073732954
$minfo1 = $_SERVER['HTTP_USER_AGENT'];
//$browser = get_browser();
//print_r($browser);
$minfo1 .= " IP Address:";
$minfo1 .= $_SERVER['REMOTE_ADDR'];


$joindate=date("Y-m-d");
$expiryy=date('Y-m-d H:i:s');
$expiry=date('Y-m-d H:i:s', strtotime($expiryy. ' + 24 hours'));
if ($status=="OK")
{
     /*  $password = substr(str_shuffle("1234567890"),0,5); */
   $p_hash = md5($password1);
$scode=substr(str_shuffle("123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ"),0,8);
$newcode="PMS".$scode."";
$query1=mysqli_query($con,"insert into users(password,email,user_id,fname,lname)
values('$p_hash', '$email', '$newcode','$fname','$lname')");

print "
                               <script language='javascript'>
                   window.location = 'login.php';
               </script>
           ";
}

else
{
$errormsg= "
<div class='alert alert-danger'>
                   <button type='button' class='close' data-dismiss='alert'>&times;</button>
                   <i class='fa fa-ban-circle'></i>".$msg."</div>"; //printing error if found in validation

}

}
?>
<?php
                       if($_SERVER['REQUEST_METHOD'] == 'POST')
                       {
                       print $errormsg;
                       }
                       ?>
