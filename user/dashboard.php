<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  
    <title>Dashboard | Automated Online Birth & Death Registration System</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="popup.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
    
    <!-- Header top area start-->
    <div class="wrapper-pro">
    
      <?php include_once('includes/sidebar.php');?>
        <!-- Header top area start-->

            <div class="content">
              <div class="popup">
                <div class="popup-content">
                <img id="close" src="img/logo/closebtn.png" alt="Logo" style="width: 40px; height: 40px;">
                  <h2>Welcome <span><?php  echo $row->FirstName;?></span></h2>
                  <hr>
                  <p> 1. Select either the Birth form or the Death form tab and enter your personal details.</p>
                  <p>2. Proceed to the payment tab to make the necessary payment for the certificate.</p>
                  <p>3. Additionally, click the certificate tab to check the status of your request. Click on the view button to review the details of the certificate.</p>
                  <p>4. Finally, click on the print button to download a receipt for the certificate.
                    Make sure to send this receipt to the head office in order to obtain the original certificate.</p>  
                  
              </div>
            </div>

       <?php include_once('includes/header.php');?>
            <!-- Header top area end-->

           

            <!-- Popup start-->
            <!-- <div class="popup">
              <img id="close" src="img/logo/closebtn.png" alt="Logo" style="width: 50px; height: 50px;">
              <h2>This Is The Title</h2>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Expedita distinctio fugiat alias iure qui, 
                commodi minima magni ullam aliquam dignissimos?
              </p>
              <a href="dashboard.php">Let's Go</a>
            </div> -->
            <!-- Popup end-->

            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                                <div class="row">
                                   
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
      
            <!-- Breadcome End-->
            <!-- income order visit user Start -->
            <div class="income-order-visit-user-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                                <div class="income-title">
                                    <div class="main-income-head">
                                       <?php
$uid=$_SESSION['obcsuid'];
$sql="SELECT FirstName,LastName,MobileNumber from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
                                        <div class="main-income-phara">
                                           <h2> Welcome to the Online Birth & Death Registration System <?php  echo $row->FirstName;?>!!</h2>
                                        </div>
                                        
                                        <?php $cnt=$cnt+1;}} ?>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="income-phara">
              <?php
              $limit = 5; // Number of recent records to display
              $sql = "SELECT * FROM  tblapplication ORDER BY ApplicationID DESC LIMIT :limit";
              $query = $dbh->prepare($sql);
              $query->bindParam(':limit', $limit, PDO::PARAM_INT);
              $query->execute();
              $records = $query->fetchAll(PDO::FETCH_ASSOC);
              ?>
  <h3>Recent Birth & Death Records</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Application</th>
        <th>Date</th>
        <!-- <th>Location</th> -->
      </tr>
    </thead>
    <tbody>
    <?php foreach ($records as $record) : ?>
      <tr>
        <td><?php echo $record['ApplicationID']; ?></td>
        <td><?php echo $record['Dateofapply']; ?></td>
        <!-- <td><?php echo $record['PermanentAdd']; ?></td> -->
      </tr>
  
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>

<style>
.income-phara {
  background-color: #f5f5f5;
  padding: 20px;
  margin-bottom: 20px;
}

table {
  width: 90%;
  border-collapse: collapse;
}

table th,
table td {
  border: 1px solid #ddd;
  padding: 8px;
  
}
h3{
  color: #03a9f4; 
}

table th {
  text-align: left;
  font-weight: bold;
  background-color: #303030;
  /* color: #03a9f4; */
  color: #fff;
}
table td {
  text-align: left;
}
</style>


        </div>
    </div>
    <!-- <?php include_once('includes/data.php'); ?> -->
    <?php include_once('includes/footer.php');?>
    <!-- Footer End-->
   
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/wow/wow.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/Chart.min.js"></script>
    <script src="js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <script src="user.js"></script>
</body>

</html><?php }  ?>