<?php

error_reporting(0);

include_once("config/index.php");

$search = $msg = $status = $errormsg = "";

$user_id = $_SESSION['username'];

//add client
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']))
{

$search = mysqli_real_escape_string($con,$_POST['search']);

$clients_search = $search_result = "";

$sqls = "SELECT id, sname, fname, user_id, client_id FROM clients_profile
WHERE user_id = '$user_id' AND client_id = '$search'
ORDER BY id DESC LIMIT 10";

if ($results = $con -> query($sqls)) {
  while ($row = $results -> fetch_row())
  {

    $clients_search .= '<tr style="background-color:#F0F0F0;">
    <td>'.$row[4].'</td>
      <td>'.$row[1].' '.$row[2].'</td>
      <td><a href="client.php?view='.$row[4].'" style="color:blue"><button class="btn btn-primary btn-sm">View</button></a> <a href="clients.php?delete='.$row[4].'" style="color:blue"><button class="btn btn-danger btn-sm">Delete</button></a></td>
    </tr>';
  }

}

if($clients_search == ""){
  $clients_search = '<tr>
  <td colspan="3">No result found!</td>
  </tr>';
}
$search_result = '<table class="table table-stribed">'.$clients_search.'</table>';


}
