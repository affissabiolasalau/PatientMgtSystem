<!DOCTYPE html>
<html lang="en">

<?php require_once 'controllers/transactions.php' ?>

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
                    <h5>TRANSACTIONS <button class="btn btn-success" data-toggle="modal" href="#myModal">+ Add</button></h5>
                  </div>
<!--                  <p><img src="img/ui-zac.jpg" class="img-circle" width="50"></p>-->
                  <div class="responsive text-justify">
                    <table class="table">
                      <thead>
                      <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Label</th>
                        <th>Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php echo $trans_rec; ?>
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

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">New Transaction</h4>
          </div>
          <div class="modal-body">
            <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>' method='post'>
              <br><p>Amount</p>
              <input type="tel" name="amount" placeholder="Amount" autocomplete="off" class="form-control placeholder-no-fix">
              <br><p>Label</p>
              <input type="tel" name="label" placeholder="Label or Title" autocomplete="off" class="form-control placeholder-no-fix">
              <br><p>Type</p>
              <select class="form-control" name="type" id="type">
                <option value="">Select</option>
                <option value="Credit">Credit</option>
                <option value="Debit">Debit</option>
              </select>
            </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            <button class="btn btn-theme" type="submit">Add Transaction</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal -->
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
