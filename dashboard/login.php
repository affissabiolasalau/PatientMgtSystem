<?php

error_reporting(0);

include_once("config/index.php");

if($user_ok == true){
    header("location: index.php");
    exit();
}
?>
<?php
$err = "";
$p = $e = "";
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["email"])){
    // CONNECT TO THE DATABASE
    // GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
    $e = mysqli_real_escape_string($con, $_POST['email']);
    $p = mysqli_real_escape_string($con, $_POST['password']);

    $p = md5($p);
    // GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    // FORM DATA ERROR HANDLING
    if($e == "" || $p == ""){
        $err = "No field should be empty";
    } else {
    // END FORM DATA ERROR HANDLING
        $sql = "SELECT id, user_id, password FROM users WHERE email='$e' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($query);
        $db_id = $row[0];
        $db_username = $row[1];
        $db_pass_str = $row[2];
        if($p != $db_pass_str){
            $err = "Login failed. Check your details and try again";
        } else {
            // CREATE THEIR SESSIONS AND COOKIES
            $newpin = substr(str_shuffle("1234567890"),0,5);
            $_SESSION['userid'] = $db_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['password'] = $db_pass_str;
            setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
            setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
            setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE);

            header("location: index.php");
            exit();

            // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
            /* $sql = "UPDATE investment SET ipaddress='$ip', lastlogin=now(), loginpin='$newpin' WHERE scode='$db_username' LIMIT 1";
            $query = mysqli_query($con, $sql);
            echo $db_username;
            */

$minfo1 = $_SERVER['HTTP_USER_AGENT'];
$minfo1 .= " IP Address:";
$minfo1 .= $_SERVER['REMOTE_ADDR'];

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">

      <form class="form-login" action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post'>
        <h2 class="form-login-heading">sign in</h2>
        <div class="login-wrap">
          <?php if($err != "")
          {

            echo "<div class='alert alert-danger'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <i class='fa fa-ban-circle'></i>$err</font></div>";
          }
          ?>
          <input type="text" class="form-control" placeholder="Email" name="email">
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password">

            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>

          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </form>  <hr>

          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="signup.html">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <form>
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->

    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
