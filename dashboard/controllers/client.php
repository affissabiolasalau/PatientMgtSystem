<?php

error_reporting(0);

include_once("config/index.php");

$user_id = $sname = $fname = $othernames = $dob = $gender = $occupation = $genotype = $blood_group = $weight = $height = $phone1 = $phone2 = $email = $home_address = $office_address = "";
$msg = $status = $errormsg = "";

$user_id = $_SESSION['username'];

//add client
if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_GET['view']))
{

// Collect the data from post method of form submission //
$sname = mysqli_real_escape_string($con,$_POST['sname']);
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$othernames = mysqli_real_escape_string($con,$_POST['othernames']);
$dob = mysqli_real_escape_string($con,$_POST['dob']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$occupation = mysqli_real_escape_string($con,$_POST['occupation']);
$genotype = mysqli_real_escape_string($con,$_POST['genotype']);
$blood_group = mysqli_real_escape_string($con,$_POST['blood_group']);
$weight = mysqli_real_escape_string($con,$_POST['weight']);
$height = mysqli_real_escape_string($con,$_POST['height']);
$phone1 = mysqli_real_escape_string($con,$_POST['phone1']);
$phone2 = mysqli_real_escape_string($con,$_POST['phone2']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$home_address = mysqli_real_escape_string($con,$_POST['home_address']);
$office_address = mysqli_real_escape_string($con,$_POST['office_address']);

$errormsg = "";
$status = "OK";
$msg="";


$scode=substr(str_shuffle("123456789abcdefghijklmnopqrstuvwxyz"),0,10);
$newcode="PMS".$scode."";


if (!file_exists("clients/$newcode")) {
      mkdir("clients/$newcode", 0755);
    }

$target_dir = "clients/".$newcode."/";
$ntarget_dir = "clients/".$newcode."/";
$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
$ntarget_file = basename($_FILES["imageUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);

list($width, $height) = getimagesize($_FILES["imageUpload"]["tmp_name"]);
    if($width < 17 || $height < 17){

      $msg=$msg."Upload Not Accepted.<BR>";
      $status= "NOTOK";

    }

else if($sname == ""){
$msg=$msg."Surname name can not be empty.<BR>";
$status= "NOTOK";
}

else if($fname == ""){
$msg=$msg."First name can not be empty.<BR>";
$status= "NOTOK";
}

else if(!is_numeric($phone1)){
$msg=$msg."Enter a valid phone number.<BR>";
$status= "NOTOK";
}

// Check file size
else if ($_FILES["imageUpload"]["size"] > 5058576) {
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

if($status == 'OK' && move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file))
{

  $query1=mysqli_query($con,"insert into clients_profile(user_id, client_id, sname, fname, othernames, dob, gender, occupation, genotype, blood_group, weight, height)
  values('$user_id', '$newcode', '$sname', '$fname', '$othernames', '$dob', '$gender', '$occupation', '$genotype', '$blood_group', '$weight', '$height')");

  $query2=mysqli_query($con,"insert into clients_contact(user_id, client_id, phone1, phone2, email, home_address, office_address)
  values('$user_id', '$newcode', '$phone1', '$phone2', '$email', '$home_address', '$office_address')");

  if($query1 && $query2)
  {

    $query3=mysqli_query($con,"insert into clients_picture(client_id, image)
    values('$newcode', '$ntarget_file')");
  }


  print "
                <script language='javascript'>
                     window.location = 'clients.php';
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

if(isset($_GET['delete']))
{

$client_id = $_GET['delete'];

$sql1 = "DELETE FROM clients_contact WHERE client_id = '$client_id' AND user_id = '$user_id' LIMIT 1";
$sql2 = "DELETE FROM clients_profile WHERE client_id = '$client_id' AND user_id = '$user_id' LIMIT 1";
$sql3 = "DELETE FROM clients_picture WHERE client_id = '$client_id' AND user_id = '$user_id' LIMIT 1";

if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE && $con->query($sql3) === TRUE) {

  print "
                <script language='javascript'>
                     window.location = 'clients.php';
                 </script>
             ";

} else {
  $errormsg= "
  <div class='alert alert-danger'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <i class='fa fa-ban-circle'></i>Deletion failed. Try again</div>";
}

$con->close();

}


?>

<?php

$clients_rec = "";

$sql = "SELECT id, sname, fname, user_id, client_id FROM clients_profile WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 100";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {


    $clients_rec .= '<tr>
    <td>'.$row[4].'</td>
      <td>'.$row[1].' '.$row[2].'</td>
      <td><a href="client.php?view='.$row[4].'" style="color:blue"><button class="btn btn-primary btn-sm">View</button></a> 
      <a href="addhistory.php?addhistory='.$row[4].'" style="color:blue"><button class="btn btn-info btn-sm">Add History</button></a>
      <a href="clients.php?delete='.$row[4].'" style="color:blue"><button class="btn btn-danger btn-sm">Delete</button></a>
      </td>
    </tr>';
  }
}

?>

<?php

//client information
if(isset($_GET['view']))
{

  $view_id = $_GET['view'];

  //client profile
  $sql = "SELECT user_id, client_id, sname, fname, othernames, dob, gender, occupation, genotype, blood_group, weight, height FROM clients_profile WHERE user_id = '$user_id' AND client_id = '$view_id' ORDER BY id DESC LIMIT 1";

  if ($result = $con -> query($sql)) {
    while ($row = $result -> fetch_row()) {

  $user_id = $row[0];
  $client_id = $row[1];
  $sname = $row[2];
  $fname = $row[3];
  $othernames = $row[4];
  $dob = $row[5];
  $gender = $row[6];
  $occupation = $row[7];
  $genotype = $row[8];
  $blood_group = $row[9];
  $weight = $row[10];
  $height = $row[11];

  $sql2 = "SELECT image FROM clients_picture WHERE client_id = '$row[1]' ORDER BY id DESC LIMIT 1";

  if ($result = $con -> query($sql2)) {
    while ($row = $result -> fetch_row()) {
      $image = $row[0];
    }
  }

    }
  }

//client contact
$sql = "SELECT phone1, phone2, email, home_address, office_address FROM clients_contact WHERE user_id = '$user_id' AND client_id = '$view_id' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {

$phone1 = $row[0];
$phone2 = $row[1];
$email = $row[2];
$home_address = $row[3];
$office_address = $row[4];

  }
}

//diagnosis

$files = $diagnosis_ = "";

$sql_ = "SELECT symptoms, diagnosis, id, date_added FROM clients_diagnosis WHERE user_id = '$user_id' AND client_id = '$view_id' ORDER BY id DESC LIMIT 20";

if ($result_ = $con -> query($sql_)) {
while ($row1 = $result_ -> fetch_row()) {

$symptoms = $row1[0];
$diagnosis = $row1[1];
$date_added = $row1[3];

$sql2 = "SELECT file FROM diagnosis_file WHERE client_id = '$view_id' AND diagnosis_id = '$row[2]' ORDER BY id DESC LIMIT 3";

if ($result = $con -> query($sql2)) {
while ($row2 = $result -> fetch_row()) {

$files .=  "<a href='clients/".$view_id."/".$row2[0]."'>".$row2[0]."</a>";

}
}

$diagnosis_ .= "<tr><td>".date('Y M, d', strtotime($date_added))."</td><td>".$symptoms."</td><td>
<div class='col'><a href='history.php?viewhistory=".$row1[2]."' class='btn btn-sm btn-primary'>View</a></div>
<!-- <div class='col'><a href='history.php?deletehistory=".$row1[2]."' class='btn btn-sm btn-danger'>Delete</a></div>-->
 </td></tr>";

}
}


}
?>

<?php

if(isset($_GET['viewhistory']))

{

// view diagnosis

  $id = $_GET['viewhistory'];

$files = $symptoms = $diagnosis = $date_added = "";

$sql_ = "SELECT symptoms, diagnosis, id, date_added, client_id FROM clients_diagnosis WHERE user_id = '$user_id' AND id = '$id' ORDER BY id DESC LIMIT 1";

if ($result_ = $con -> query($sql_)) {
while ($row1 = $result_ -> fetch_row()) {

$symptoms = $row1[0];
$diagnosis = $row1[1];
$id = $row1[2];
$date_added = $row1[3];
$view_id = $row1[4];

$sql2 = "SELECT file FROM diagnosis_file WHERE client_id = '$view_id' AND diagnosis_id = '$row1[2]' ORDER BY id DESC LIMIT 3";

if ($result = $con -> query($sql2)) {
while ($row2 = $result -> fetch_row()) {

$files .=  "<a target='_blank' href='clients/".$view_id."/".$row2[0]."'>".$row2[0]."</a><br>";

}
}


}
}

//client profile
  $sql = "SELECT user_id, client_id, sname, fname, othernames, dob, gender, occupation, genotype, blood_group, weight, height FROM clients_profile WHERE user_id = '$user_id' AND client_id = '$view_id' ORDER BY id DESC LIMIT 1";

  if ($result = $con -> query($sql)) {
    while ($row = $result -> fetch_row()) {

  $user_id = $row[0];
  $client_id = $row[1];
  $sname = $row[2];
  $fname = $row[3];
  $othernames = $row[4];
  $dob = $row[5];
  $gender = $row[6];
  $occupation = $row[7];
  $genotype = $row[8];
  $blood_group = $row[9];
  $weight = $row[10];
  $height = $row[11];

  $sql2 = "SELECT image FROM clients_picture WHERE client_id = '$row[1]' ORDER BY id DESC LIMIT 1";

  if ($result = $con -> query($sql2)) {
    while ($row = $result -> fetch_row()) {
      $image = $row[0];
    }
  }

    }
  }

//client contact
$sql = "SELECT phone1, phone2, email, home_address, office_address FROM clients_contact WHERE user_id = '$user_id' AND client_id = '$view_id' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {

$phone1 = $row[0];
$phone2 = $row[1];
$email = $row[2];
$home_address = $row[3];
$office_address = $row[4];

  }
}


}
?>

<?php 

if(isset($_GET['deletehistory']))
{

$id = $_GET['deletehistory'];

$sql1x = "DELETE FROM clients_diagnosis WHERE id = '$id' AND user_id = '$user_id' LIMIT 1";

if ($con->query($sql1x) === TRUE) {

  print "
                <script language='javascript'>
                     window.location = 'clients.php';
                 </script>
             ";

} else {
  print "
  <div class='alert alert-danger'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <i class='fa fa-ban-circle'></i>Deletion failed. Try again</div>";
}

//$con->close();

}

?>


<?php
//upload picture
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['view']))
{
  $errormsg = "";
  $status = "OK";
  $msg="";

  $target_dir = "clients/".$client_id."/";
  $ntarget_dir = "clients/".$client_id."/";
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

$update_dp = "UPDATE clients_picture SET image = '$ntarget_file' WHERE client_id = '$view_id' LIMIT 1";
$query = mysqli_query($con, $update_dp);

print "
              <script language='javascript'>
                   window.location = 'client.php?view=".$client_id."';
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
$edit_id = $_GET['edit'];
//update client
//client profile
$sql = "SELECT user_id, client_id, sname, fname, othernames, dob, gender, occupation, genotype, blood_group, weight, height FROM clients_profile WHERE user_id = '$user_id' AND client_id = '$edit_id' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {

$user_id = $row[0];
$client_id = $row[1];
$sname = $row[2];
$fname = $row[3];
$othernames = $row[4];
$dob = $row[5];
$gender = $row[6];
$occupation = $row[7];
$genotype = $row[8];
$blood_group = $row[9];
$weight = $row[10];
$height = $row[11];

/*
$sql2 = "SELECT image FROM clients_picture WHERE client_id = '$row[1]' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql2)) {
  while ($row = $result -> fetch_row()) {
    $image = $row[0];
  }
}
*/

  }
}

//client contact
$sql = "SELECT phone1, phone2, email, home_address, office_address FROM clients_contact WHERE user_id = '$user_id' AND client_id = '$edit_id' ORDER BY id DESC LIMIT 1";

if ($result = $con -> query($sql)) {
while ($row = $result -> fetch_row()) {

$phone1 = $row[0];
$phone2 = $row[1];
$email = $row[2];
$home_address = $row[3];
$office_address = $row[4];

}
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_GET['view']) && isset($_GET['edit']))
{

$edit_id = $_GET['edit'];

// Collect the data from post method of form submission //
$sname = mysqli_real_escape_string($con,$_POST['sname']);
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$othernames = mysqli_real_escape_string($con,$_POST['othernames']);
$dob = mysqli_real_escape_string($con,$_POST['dob']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$occupation = mysqli_real_escape_string($con,$_POST['occupation']);
$genotype = mysqli_real_escape_string($con,$_POST['genotype']);
$blood_group = mysqli_real_escape_string($con,$_POST['blood_group']);
$weight = mysqli_real_escape_string($con,$_POST['weight']);
$height = mysqli_real_escape_string($con,$_POST['height']);
$phone1 = mysqli_real_escape_string($con,$_POST['phone1']);
$phone2 = mysqli_real_escape_string($con,$_POST['phone2']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$home_address = mysqli_real_escape_string($con,$_POST['home_address']);
$office_address = mysqli_real_escape_string($con,$_POST['office_address']);

$errormsg = "";
$status = "OK";
$msg="";

if($sname == ""){
$msg=$msg."Surname name can not be empty.<BR>";
$status= "NOTOK";
}

else if($fname == ""){
$msg=$msg."First name can not be empty.<BR>";
$status= "NOTOK";
}

else if(!is_numeric($phone1)){
$msg=$msg."Enter a valid phone number.<BR>";
$status= "NOTOK";
}

if($status == 'OK')
{

  $update1 = "UPDATE clients_profile SET sname = '$sname', fname = '$fname',
  othernames = '$othernames', dob = '$dob', gender = '$gender', occupation = '$occupation',
  genotype = '$genotype', blood_group = '$blood_group', weight = '$weight', height = '$height' WHERE user_id = '$user_id' AND client_id = '$edit_id' LIMIT 1";
  $query1 = mysqli_query($con, $update1);

  $update2 = "UPDATE clients_contact SET phone1 = '$phone1', phone2 = '$phone2', email = '$email', home_address = '$home_address', office_address = '$office_address' LIMIT 1";
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

//add health history

if($_SERVER['REQUEST_METHOD'] == 'POST' 
  && !isset($_GET['view']) 
  && !isset($_GET['edit']) 
  && isset($_GET['addhistory']))
{

$client_id = $_GET['addhistory'];

$errormsg = "";
$status = "OK";
$msg="";

  $symptoms = mysqli_real_escape_string($con,$_POST['symptoms']);
  $diagnosis = mysqli_real_escape_string($con,$_POST['diagnosis']);

  if($symptoms == "" || $diagnosis == ""){
$msg=$msg."Please enter symptoms and diagnosis.<BR>";
$status= "NOTOK";
}

//handle files
$target_dir = "clients/".$client_id."/";
$ntarget_dir = "clients/".$client_id."/";

if($_FILES['file1']['size'] != 0 && $_FILES['file1']['error'] == 0)
{

$target_file = $target_dir . basename($_FILES["file1"]["name"]);
$ntarget_file = basename($_FILES["file1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file1"]["tmp_name"]);

list($width, $height) = getimagesize($_FILES["file1"]["tmp_name"]);
    if($width < 17 || $height < 17){

      $msg=$msg."Upload Not Accepted.<BR>";
      $status= "NOTOK";

    }
    else if ($_FILES["file1"]["size"] > 5058576) {
  $msg=$msg."First file Upload too large. Should not be more than 5GB.<BR>";
  $status= "NOTOK";
   // exit();
}

}

if($_FILES['file2']['size'] != 0 && $_FILES['file2']['error'] == 0)
{

$target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
$ntarget_file2 = basename($_FILES["file2"]["name"]);
$uploadOk = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file2"]["tmp_name"]);

list($width, $height) = getimagesize($_FILES["file2"]["tmp_name"]);
    if($width < 17 || $height < 17){

      $msg=$msg."Upload Not Accepted.<BR>";
      $status= "NOTOK";

    }
    else if ($_FILES["file2"]["size"] > 5058576) {
  $msg=$msg."Second file Upload too large. Should not be more than 5GB.<BR>";
  $status= "NOTOK";
   // exit();
}
}

if($_FILES['file3']['size'] != 0 && $_FILES['file3']['error'] == 0)
{

$target_file3 = $target_dir . basename($_FILES["file3"]["name"]);

$ntarget_file3 = basename($_FILES["file3"]["name"]);
$uploadOk = 1;
$imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file3"]["tmp_name"]);

list($width, $height) = getimagesize($_FILES["file3"]["tmp_name"]);
    if($width < 17 || $height < 17){

      $msg=$msg."Upload Not Accepted.<BR>";
      $status= "NOTOK";

    }
    else if ($_FILES["file3"]["size"] > 5058576) {
  $msg=$msg."Second file Upload too large. Should not be more than 5GB.<BR>";
  $status= "NOTOK";
   // exit();
}
}

if($status == 'OK')
  {

$queryf = mysqli_query($con,"insert into clients_diagnosis(symptoms, diagnosis, client_id, user_id)
    values('$symptoms', '$diagnosis', '$client_id', '$user_id')");

if($queryf){
  $sqlf = "SELECT id FROM clients_diagnosis WHERE client_id = '$client_id' ORDER BY id DESC LIMIT 1";
  if ($resultf = $con -> query($sqlf)) 
  {
  while ($rowf = $resultf -> fetch_row()) 
  {
   
   $diagnosis_id = $rowf[0];

   //move files uploaded
   if(move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file))
   {  
    $query1 = mysqli_query($con,"insert into diagnosis_file(diagnosis_id, client_id, file)
    values('$diagnosis_id', '$client_id', '$ntarget_file')");
   }

   if(move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2))
   {  
    $query2 = mysqli_query($con,"insert into diagnosis_file(diagnosis_id, client_id, file)
    values('$diagnosis_id', '$client_id', '$ntarget_file2')");
   }

   if(move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file3))
   {  
    $query3 = mysqli_query($con,"insert into diagnosis_file(diagnosis_id, client_id, file)
    values('$diagnosis_id', '$client_id', '$ntarget_file3')");
   }

  }
  }

}

print "
              <script language='javascript'>
                   window.location = 'client.php?view=".$client_id."';
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


?>
