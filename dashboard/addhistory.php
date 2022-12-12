<!DOCTYPE html>
<html lang="en">

<?php require_once 'controllers/client.php' ?>

<?php
require_once 'layouts/header.php';
?>
<link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
<body style="background-color:#fff;">
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
<?php
require_once 'layouts/header2.php'
?>
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->

        <?php
        require_once 'layouts/navbar.php';
        ?>

    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">

            <div class="row">
<br>
              <!-- TWITTER PANEL -->
              <!-- /col-md-4 -->
              <!-- /col-md-12 -->
<!--
             <div class="col-md-6 centered">
               <div class="profile-pic">
                 <p><img src="img/ui-sam.jpg" class="img-circle"></p>
                 <p>Email: </p>
                 <p>Phone: </p>
                 <p>
                   <button class="btn btn-theme02">Change Profile Picture</button>
                   <button class="btn btn-theme">Update Profile</button>
                 </p>
               </div>
             </div>
-->

             <div class="col-md-12 profile-text card-body">
               <?php
if($errormsg != "")
{
  echo $errormsg;
}
               ?>
               <form action='<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'utf-8'); ?>' method='post' enctype="multipart/form-data">
               <table class="table">
                 <tr><th>Symptoms</th><td><textarea class="form-control" name="symptoms"></textarea></td></tr>
                 <tr><th>Diagnosis</th><td><textarea class="form-control" name="diagnosis"></textarea></td></tr>
                <tr><th>Upload document/image</th><td>
                  <input type="file" class="form-control" name="file1"><br>
                  <input type="file" class="form-control" name="file2"><br>
                  <input type="file" class="form-control" name="file3"><br>
                </td></tr>
                 <tr><th></th><td><button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-check"></i> Add Health History</button></td></tr>
               </table>
             </div>

             <!-- /col-md-4 -->

            </div>
            <!-- /row -->
            </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************

        </div>
        <!-- /row -->
      </div>
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
<?php
require_once 'layouts/footer.php';
 ?>
    <!--footer end-->
  </section>
<?php
require_once 'javascript.php';
?>
<script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>

</body>

</html>
