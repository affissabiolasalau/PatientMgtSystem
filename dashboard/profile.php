<!DOCTYPE html>
<html lang="en">

<?php require_once 'controllers/user.php' ?>

<?php
require_once 'layouts/header.php';
?>

<link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php
    require_once 'layouts/header2.php';
    ?>
    <!--header end-->
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
          <div class="col-lg-12 main-chart">

            <div class="row" style="background-color:#fff;">
<div class="col-lg-12">
<br>
                <?php
             if($errormsg != "")
             {
             echo $errormsg;
             }
                ?>
</div>
             <div style="font-size:15px;" class="col-md-6 profile-text">
               <h3><?php echo fname;?> <?php echo lname;?></h3><br><br>
               <p><b>First Name:</b> <?php echo $fname;?></p>
               <p><b>Last Name:</b> <?php echo $lname;?></p>
               <p><b>Institution:</b> <?php echo $institution;?></p>
               <p>
                 <button class="btn btn-theme" data-toggle="modal" href="#profileModal">Update Profile</button>
                 <button class="btn btn-danger" data-toggle="modal" href="#passwordModal">Change Password</button>
               </p>
             </div>
             <!-- /col-md-4 -->
             <div class="col-md-6 centered">
               <div class="profile-pic">
                 <p><img src="<?php if(strlen($image) < 1){echo 'img/ui-sam.jpg';}else{echo 'users/'.$user_id.'/'.$image.'';} ?>" class="img-circle"></p>
                 <p>Email: <?php echo $email;?></p>
                 <p>
                   <button class="btn btn-theme02" data-toggle="modal" href="#pictureModal">Change Picture</button>
                 </p>
               </div>
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

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="profileModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Profile</h4>
              </div>
              <div class="modal-body">
                <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post'>
                  <br><p>First Name</p>
                  <input type="text" value="<?php echo $fname;?>" name="fname" placeholder="First Name" autocomplete="off" class="form-control placeholder-no-fix">
                  <br><p>Last Name</p>
                  <input type="text" value="<?php echo $lname;?>" name="lname" placeholder="Last Name" autocomplete="off" class="form-control placeholder-no-fix">
                  <br><p>Email</p>
                  <input type="email" value="<?php echo $email;?>" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                  <br><p>Institution</p>
                  <input type="text" name="institution" value="<?php echo $institution;?>" placeholder="Institution" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit">Update Profile</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="passwordModal" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Reset Password</h4>
                  </div>
                  <div class="modal-body">
                    <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post'>
                      <br><p>Current Password</p>
                      <input type="password" name="password0" placeholder="Current Password" autocomplete="off" class="form-control placeholder-no-fix">
                      <br><p>New Password</p>
                      <input type="password" name="password1" placeholder="New Password" autocomplete="off" class="form-control placeholder-no-fix">
                      <br><p>Confirm Password</p>
                      <input type="password" name="password2" placeholder="Confirm Password" autocomplete="off" class="form-control placeholder-no-fix">
                  </div>
                  <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-theme" type="submit">Reset Password</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- modal -->

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pictureModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Change Picure</h4>
          </div>
          <div class="modal-body">
            <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post' enctype="multipart/form-data">
              <input type="hidden" value="todo" name="todo">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                   <img src="<?php if(strlen($image) < 1){echo 'img/ui-sam.jpg';}else{echo 'users/'.$user_id.'/'.$image.'';} ?>" alt="" />
                 </div>
                 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                 <div>
                   <span class="btn btn-theme02 btn-file">
                     <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select Profile Image</span>
                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                   <input type="file" class="default" name="imageUpload2" accept="image/*;capture=camera"/>
                   </span>
                 </div>
               </div>
            </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            <button class="btn btn-theme" type="submit">Upload</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal -->
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
