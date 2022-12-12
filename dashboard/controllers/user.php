<?php
error_reporting(0);

include_once("config/index.php");

$user_id = $email = $fname = $lname = $image = $institution = "";
$msg = $status = $errormsg = "";

$user_id = $_SESSION['username'];

$edit_id = $_GET['edit'];
//update user
//user profile
$sql = "SELECT user_id, email, fname, lname, image, institution FROM users WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {

$user_id = $row[0];
$email = $row[1];
$fname = $row[2];
$lname = $row[3];
$image = $row[4];
$institution = $row[5];


  }
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname']))
{

$edit_id = $_GET['edit'];

// Collect the data from post method of form submission //
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$institution = mysqli_real_escape_string($con,$_POST['institution']);

$errormsg = "";
$status = "OK";
$msg="";

if($lname == ""){
$msg=$msg."Last name can not be empty.<BR>";
$status= "NOTOK";
}

else if($fname == ""){
$msg=$msg."First name can not be empty.<BR>";
$status= "NOTOK";
}

else if($email == ""){
$msg=$msg."Email can not be empty.<BR>";
$status= "NOTOK";
}

if($status == 'OK')
{


  $update2 = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', institution = '$institution' WHERE user_id = '$user_id' LIMIT 1";
  $query2 = mysqli_query($con, $update2);


  $errormsg= "
  <div class='alert alert-success'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <i class='fa fa-ban-circle'></i>Information Updated!</div>";

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
//upload picture
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']))
{

  $errormsg = "";
  $status = "OK";
  $msg="Unknown Error";

$todo = mysqli_real_escape_string($con,$_POST['todo']);

  if (!file_exists("users/$user_id")) {
        mkdir("users/$user_id", 0755);
      }

  $target_dir = "users/".$user_id."/";
  $ntarget_dir = "users/".$user_id."/";
  $target_file = $target_dir . basename($_FILES["imageUpload2"]["name"]);
  $ntarget_file = basename($_FILES["imageUpload2"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["imageUpload2"]["tmp_name"]);

  list($width, $height) = getimagesize($_FILES["imageUpload2"]["tmp_name"]);
      if($width < 17 || $height < 17){

        $msg=$msg."Upload Not Accepted.<BR>";
        $status= "NOTOK";

      }

  // Check file size
  else if ($_FILES["imageUpload2"]["size"] > 5058576) {
    $msg=$msg."Upload too large. Should not be more than 5GB.<BR>";
    $status= "NOTOK";
     // exit();
  }
  // Allow certain file formats
  else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {

    $msg=$msg."Images only please.<BR>";
    $status= "NOTOK";

  }

  if($status == 'OK' && move_uploaded_file($_FILES["imageUpload2"]["tmp_name"], $target_file))
  {

$update_dp = "UPDATE users SET image = '$ntarget_file' WHERE user_id = '$user_id' LIMIT 1";
$query = mysqli_query($con, $update_dp);

print "
              <script language='javascript'>
                   window.location = 'profile.php';
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

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password0']))
{

// Collect the data from post method of form submission //
$password0 = mysqli_real_escape_string($con,$_POST['password0']);
$password1 = mysqli_real_escape_string($con,$_POST['password1']);
$password2 = mysqli_real_escape_string($con,$_POST['password2']);

$errormsg = "";
$status = "OK";
$msg="";

$sqlp = "SELECT password FROM users WHERE user_id='$user_id' LIMIT 1";
$queryp = mysqli_query($con, $sqlp);
$row = mysqli_fetch_row($queryp);
$db_pass_str = $row[0];

$ckpassword = md5($password0);

if($ckpassword != $db_pass_str){
  $msg=$msg."Wrong password.<BR>";
  $status= "NOTOK";
}

else if($password0 == $password1){
$msg=$msg."New password is the same as current password.<BR>";
$status= "NOTOK";
}

else if($password1 != $password2){
$msg=$msg."Password do not match.<BR>";
$status= "NOTOK";
}

else if(strlen($password1) < 6 || strlen($password2) < 6){
$msg=$msg."Password should be at least 6 characters.<BR>";
$status= "NOTOK";
}

if($status == 'OK')
{
$password = md5($password1);
  $update2 = "UPDATE users SET password = '$password' WHERE user_id = '$user_id' LIMIT 1";
  $query2 = mysqli_query($con, $update2);


  $errormsg= "
  <div class='alert alert-success'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <i class='fa fa-ban-circle'></i>Password Updated!</div>";

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
