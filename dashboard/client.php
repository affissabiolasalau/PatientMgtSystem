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

             <div class="col-md-6 centered">
               <div class="profile-pic">
                 <p><img src="clients/<?php echo $client_id; ?>/<?php echo $image; ?>" class="img-circle"></p>
                 <p><?php echo $email; ?> </p>
                 <p><?php echo $phone1; ?> | <?php echo $phone2; ?> </p>
                 <p>
                   <button class="btn btn-theme02" data-toggle="modal" href="#myModal">Change Profile Picture</button>
                   <a href="editclient.php?edit=<?php echo $client_id; ?>"><button class="btn btn-theme">Update Profile</button></a>
                   <a href="addhistory.php?addhistory=<?php echo $client_id; ?>" style="color:blue"><button class="btn btn-info btn-md">Add History</button></a>
                 </p>
                 <table class="table table-striped">
                   <tr>
                     <th>Date</th>
                     <th>Symptoms</th>
                     <th>Action</th>
                   </tr>
                   <?php echo $diagnosis_; ?>
                 </table>
               </div>
             </div>

             <div class="col-md-6 profile-text card-body">
               <table class="table table-striped">
                 <tr><th>ID</th><td><?php echo $client_id; ?></td></tr>
                 <tr><th>Surname</th><td><?php echo $sname; ?></td></tr>
                 <tr><th>First Name</th><td><?php echo $fname; ?></td></tr>
                 <tr><th>Other Names</th><td><?php echo $othernames; ?></td></tr>
                 <tr><th>Date of Birth</th><td><?php echo $dob; ?></td></tr>
                 <tr><th>Gender</th><td><?php echo $gender; ?></td></tr>
                 <tr><th>Occupation</th><td><?php echo $occupation; ?></td></tr>
                 <tr><th>Home Address</th><td><?php echo $home_address; ?></td></tr>
                 <tr><th>Office Address</th><td><?php echo $office_address; ?></td></tr>
                 <tr><th>Genotype</th><td><?php echo $genotype; ?></td></tr>
                 <tr><th>Blood Group</th><td><?php echo $blood_group; ?></td></tr>
                 <tr><th>Weight</th><td><?php echo $weight; ?></td></tr>
                 <tr><th>Height</th><td><?php echo $height; ?></td></tr>
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

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Change Picure</h4>
          </div>
          <div class="modal-body">
            <form action='<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'utf-8'); ?>' method='post' enctype="multipart/form-data">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                   <img src="clients/<?php echo $client_id; ?>/<?php echo $image; ?>" alt="" />
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
