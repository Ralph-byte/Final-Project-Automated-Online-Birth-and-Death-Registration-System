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
   
    <title>Manage Application Form |  Automated Online Birth & Death Registration System </title>
  
    <!-- Google Fonts
		============================================ -->
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
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  
    <div class="wrapper-pro">
      <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
       
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Application Form</span>
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

           <!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Details of Certificate</h1>
                            <div class="sparkline13-outline-icon">
                                <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div id="exampl">
                          <!-- Add logo here -->
                          <div style="text-align: center; margin-bottom: 20px;">
                                <img src="img/logo/l1.png" alt="Logo" style=" vertical-align: middle; margin-right: 8px;width: 40px; height: 40px;">
                                </div>
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <h3 style="text-align: center; color:#03a9f4;">RECEIPT OF CERTIFICATE</h3>

                                <hr color="#eee"/>
                                        <p align="center">This is a receipt of the Birth & Death Certificate!! Please kindly go to the head office for the Original Certificate.</p>

                                <?php
                                $vid=$_GET['viewid'];
                                $sql="SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ID=:vid and  tblapplication.Status='Verified'";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':vid', $vid, PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                foreach($results as $row)
                                {
                                    $certgendate=$row->UpdationDate;
                                ?>
                                <div class="table-responsive">
                                    
    <table align="center" border="1 solid #03a9f4" class="table table-bordered">
        <style>
            table,
            tr,
            th,
            td {
                border-collapse: collapse;
                color: #303030;
            }

            tr,
            th,
            td {
                padding: 10px;
                margin: 5px;
                background-color: #f0f0f0;
            }
        </style>

        <tr align="center">
            <td colspan="4"  >
                <strong> Application Number:</strong> <?php echo $row->ApplicationID; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <h3 style="text-align: center; color:#03a9f4;">CHILD's</h3>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                <strong>Full Name:</strong> <?php echo $row->FullName; ?>
            </td>
            <td colspan="2">
                <strong>Gender:</strong> <?php echo $row->Gender; ?>
            </td>
        </tr>
        <tr>
          <td colspan="2">
                <strong>Email:</strong> <?php echo $row->Email; ?>
            </td>
            <td colspan="2">
                <strong>Postal Address:</strong> <?php echo $row->PostalAdd; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Date of Birth:</strong> <?php echo $row->DateofBirth; ?>
            </td>
            <td colspan="2">
                <strong>Place of Birth:</strong> <?php echo $row->PlaceofBirth; ?>
            </td>
        </tr>
        <tr align="center">
        <td colspan="4">
                <strong>Mobile Number:</strong> <?php echo $row->MobileNumber; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <h3 style="text-align: center; color:#03a9f4;">FATHER</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Name:</strong> <?php echo $row->NameofFather; ?>
            </td>
            <td colspan="2">
                <strong>Address:</strong> <?php echo $row->PermanentAdd; ?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <h3 style="text-align: center; color:#03a9f4;">MOTHER</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Name:</strong> <?php echo $row->NameOfMother; ?>
            </td>
            <td colspan="2">
                <strong>Address:</strong> <?php echo $row->PermanentAdd; ?>
            </td>
        </tr>

        <tr align="center">
          <td colspan="4">
                <strong>Date of Apply: </strong> <?php echo $row->Dateofapply; ?>
            </td>
        </tr>
        <tr align="center">
          <td colspan="4">
                <strong style="text-align: center;">Certificate Date: </strong><?php echo htmlentities($certgendate); ?>
            </td>
        </tr>
    </table>
                                </div>
                                <?php } ?>

                                <button id="printButton" type="submit" style="margin-bottom: 15px; background: #03a9f4; color:#fff; border:none; padding: 6px; border-radius: 5px;" onclick="CallPrint(this.value)">
                                    <i class="fa fa-print fa-2x" style="cursor: pointer; margin-right: 4px; font-size:17px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->

        </div>
    </div>
  <?php include_once('includes/footer.php');?>
   
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
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
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

    <script>
        function enablePrintButton() {
            var paymentStatus = <?php echo $row->PaymentStatus; ?>;
            if (paymentStatus === 1) {
                document.getElementById('printBtn').disabled = false;
            }
        }
    </script>

  <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

</body>

</html><?php }  ?>
