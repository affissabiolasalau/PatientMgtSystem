<!DOCTYPE html>
<html lang="en">

<?php require_once 'controllers/dashboard.php' ?>

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

            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <!-- /col-md-6-->
              <div class="col-md-4 col-sm-6 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>CLIENTS</h5>
                  </div>
                  <h4 class="mt" style="color:#fff;"><b><?php echo $total_clients; ?></b><br/><br></h4>
                </div>
              </div>
              <!-- /col-md-6 -->

              <!-- /col-md-6-->
              <div class="col-md-4 col-sm-6 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>EXPENDITURE</h5>
                  </div>
                  <h4 class="mt" style="color:#fff;"><b>&#8358 <?php echo number_format($expenditure);?></b><br/><br></h4>
                </div>
              </div>
              <!-- /col-md-6 -->

              <!-- /col-md-6 -->
              <div class="col-md-4 col-sm-6 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>REVENUE</h5>
                  </div>
                  <h4 class="mt" style="color:#fff;"><b>&#8358 <?php echo number_format($revenue);?></b><br/><br></h4>
                </div>
              </div>
              <!-- /col-md-6 -->

            </div>

            <!--CUSTOM CHART START -->
<!--            <div class="border-head">
              <h3>USER STATICS</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                <li><span>10.000</span></li>
                <li><span>8.000</span></li>
                <li><span>6.000</span></li>
                <li><span>4.000</span></li>
                <li><span>2.000</span></li>
                <li><span>0</span></li>
              </ul>
              <div class="bar">
                <div class="title">JAN</div>
                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
              </div>
              <div class="bar ">
                <div class="title">FEB</div>
                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
              </div>
              <div class="bar ">
                <div class="title">MAR</div>
                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
              </div>
              <div class="bar ">
                <div class="title">APR</div>
                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
              </div>
              <div class="bar">
                <div class="title">MAY</div>
                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
              </div>
              <div class="bar ">
                <div class="title">JUN</div>
                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
              </div>
              <div class="bar">
                <div class="title">JUL</div>
                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
              </div>
            </div>-->
            <!--custom chart end-->

            <div class="row">
              <!-- TWITTER PANEL -->
              <!-- /col-md-4 -->
              <div class="col-md-12 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>CLIENTS <a href="addclient.php"><button class="btn btn-success">+ Add Client</button></a></h5>
                  </div>
<!--                  <p><img src="img/ui-zac.jpg" class="img-circle" width="50"></p>-->
                  <div class="responsive text-justify">
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
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                      <a href="clients.php"><button class="btn btn-info btn-sm">View All Clients Records</button></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>TRANSACTIONS</h5>
                  </div>

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
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                    <a href="transactions.php"><button class="btn btn-info btn-sm">View All Transactions</button></a>
                    </div>
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
