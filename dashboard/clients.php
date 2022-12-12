<!DOCTYPE html>
<html lang="en">

<?php require_once 'controllers/client.php' ?>
<?php require_once 'controllers/searchclient.php' ?>

<?php
require_once 'layouts/header.php';
?>

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



            <div class="row">

              <div class="col-md-12 mb">
                <?php
                if($errormsg != "")
                {
                echo $errormsg;
                }
                ?>
                  <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>CLIENTS <a href="addclient.php"><button class="btn btn-success">+ Add</button></a></h5>

                    <form class="form-inline" role="form" action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post'>
                <div class="form-group">
                  <input type="text" class="form-control" id="search" name="search" placeholder="Enter Client ID">
                </div>
                <button type="submit" class="btn btn-theme">Search</button>
              </form>

                  </div>
<!--                  <p><img src="img/ui-zac.jpg" class="img-circle" width="50"></p>-->
                  <div class="responsive text-justify">
                    <?php echo $search_result; ?>
                    <table class="table">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php echo $clients_rec; ?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- /row -->
            </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************

        </div>
        <!-- /row -->
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
</body>

</html>
