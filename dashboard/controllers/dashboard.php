<?php

include_once("config/index.php");

$user_id = $_SESSION['username'];

$clients_rec = mysqli_query($con,"SELECT COUNT(*) FROM clients_contact WHERE user_id = '".$_SESSION['username']."'");
$numc = mysqli_fetch_row($clients_rec);
$total_clients = $numc[0];

$result = mysqli_query($con, "SELECT SUM(amount) AS value_sum FROM transactions WHERE user_id = '".$_SESSION['username']."' AND type = 'Credit'");
$row = mysqli_fetch_assoc($result);
$revenue = $row['value_sum'];

$result2 = mysqli_query($con, "SELECT SUM(amount) AS debit_sum FROM transactions WHERE user_id = '".$_SESSION['username']."' AND type = 'Debit'");
$row = mysqli_fetch_assoc($result2);
$expenditure = $row['debit_sum'];


?>

<?php

$clients_rec = "";

$sql = "SELECT id, sname, fname, user_id, client_id FROM clients_profile WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 5";

if ($result = $con -> query($sql)) {
  while ($row = $result -> fetch_row()) {


    $clients_rec .= '<tr>
    <td>'.$row[4].'</td>
      <td>'.$row[1].' '.$row[2].'</td>
      <td><a href="client.php?view='.$row[4].'" style="color:blue"><button class="btn btn-primary btn-sm">View</button></a> 
      <a href="addhistory.php?addhistory='.$row[4].'" style="color:blue"><button class="btn btn-info btn-sm">Add History</button></a>
      <a href="clients.php?delete='.$row[4].'" style="color:blue"><button class="btn btn-danger btn-sm">Delete</button></a></td>
    </tr>';
  }
}

?>


<?php

$trans_rec = "";

$sql = "SELECT amount, label, type, date_added, id FROM transactions WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 5";

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
