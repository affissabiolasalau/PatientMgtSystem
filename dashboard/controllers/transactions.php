<?php

error_reporting(0);

include_once("config/index.php");

$user_id = $amount = $type = $label = "";
$msg = $status = $errormsg = "";

$user_id = $_SESSION['username'];

//add client
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

// Collect the data from post method of form submission //
$amount = mysqli_real_escape_string($con,$_POST['amount']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$label = mysqli_real_escape_string($con,$_POST['label']);

$errormsg = "";
$status = "OK";
$msg="";

$scode=substr(str_shuffle("1234567890"),0,12);
$newcode="PMS".$scode."";


if($label == "" || $type == ""){
$msg=$msg."No field should be empty.<BR>";
$status= "NOTOK";
}


else if(!is_numeric($amount)){
$msg=$msg."Enter a valid amount.<BR>";
$status= "NOTOK";
}

if($status == 'OK')
{

  $query1=mysqli_query($con,"insert into transactions(user_id, amount, label, type)
  values('$user_id', '$amount', '$label', '$type')");


  $errormsg= "
  <div class='alert alert-success'>
                     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                     <i class='fa fa-ban-circle'></i>Transaction Added</div>";

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
if(isset($_GET['id']))
{

$id = $_GET['id'];

$sql = "DELETE FROM transactions WHERE id = '$id' AND user_id = '$user_id' LIMIT 1";

if ($con->query($sql) === TRUE) {

                     print "
                                   <script language='javascript'>
                                        window.location = 'transactions.php';
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

$trans_rec = "";

$sql = "SELECT amount, label, type, date_added, id FROM transactions WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 100";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {

    if($row[2] == 'Debit')
    {
      $type = '<font style="color:red;">'.$row[2].'</font>';
    }
    else
    {
      $type = '<font style="color:green;">'.$row[2].'</font>';
    }

    $trans_rec .= '<tr>
    <td>'.date('M d, Y', strtotime($row[3])).'</td>
      <td>&#8358;'.number_format($row[0]).'</td>
      <td>'.$row[1].'</td>
      <td>'.$type.'</td>
      <td><a href="transactions.php?id='.$row[4].'">Delete</a></td>
    </tr>';
  }
}

?>
