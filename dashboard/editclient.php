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
                 <tr><th>Surname</th><td><input type="text" class="form-control" name="sname" id="sname" value="<?php echo $sname; ?>"></td></tr>
                 <tr><th>First Name</th><td><input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname; ?>"></td></tr>
                 <tr><th>Other Names</th><td><input type="text" class="form-control" name="othernames" id="othernames" value="<?php echo $othernames; ?>"></td></tr>
                 <tr><th>Date of Birth</th><td><input type="date" class="form-control" name="dob" id="dob" value="<?php echo $dob; ?>"></td></tr>
                 <tr><th>Gender</th><td><input type="radio" name="gender" id="gender" value="Female" <?php if($gender == 'Female'){echo "checked";}?>> Female <input type="radio" name="gender" value="Male" id="gender" <?php if($gender == 'Male'){echo "checked";}?>> Male</td></tr>
                 <tr><th>Phone</th><td><input type="tel" class="form-control" name="phone1" id="phone1" value="<?php echo $phone1; ?>"></td></tr>
                 <tr><th>Alternate Phone</th><td><input type="tel" class="form-control" name="phone2" id="phone2" value="<?php echo $phone2; ?>"></td></tr>
                 <tr><th>Email</th><td><input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>"></td></tr>
                 <tr><th>Occupation</th><td><input type="text" class="form-control" name="occupation" id="occupation" value="<?php echo $occupation; ?>"></td></tr>
                 <tr><th>Home Address</th><td><textarea class="form-control" name="home_address" id="home_address"><?php echo $home_address; ?></textarea></td></tr>
                 <tr><th>Office Address</th><td><textarea class="form-control" name="office_address" id="office_address"> <?php echo $office_address; ?></textarea></td></tr>
                 <tr><th>Genotype</th><td><input class="form-control" name="genotype" id="genotype" value="<?php echo $genotype; ?>">
                 </td></tr>
                 <tr><th>Blood Group</th><td><input class="form-control" name="blood_group" id="blood_group" value="<?php echo $blood_group; ?>"></td></tr>
                 <tr><th>Weight</th><td><input type="number" class="form-control" name="weight" id="weight" value="<?php echo $weight; ?>"></td></tr>
                 <tr><th>Height</th><td><input type="number" class="form-control" name="height" id="height" value="<?php echo $height; ?>"></td></tr>
                 <tr><th></th><td><button type="submit" class="btn btn-success btn-block"> <i class="fa fa-check"></i> Update Record</button></td></tr>
               </table>
             </form>
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
