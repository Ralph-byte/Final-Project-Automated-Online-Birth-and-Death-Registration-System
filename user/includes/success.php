<?php 
if ($_GET['status'] !== "success"){
    header("Location:javascript://history.go(-1)");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Success | Automated Online Birth and Death Registration System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
  <div class="container">
    <h2 style="margin-top: 20px; margin-bottom: 2px;" class="text-center">You've made Payment!!</h2>
    <h5 style="margin-top: 20px; margin-bottom: 10px;" class="text-center">The operation was successfull</h5>

    <p class="text-center">Click to<a  style="margin-top: 20px; margin-bottom: 10px;" class="text-center" href="../certificates-list.php">go back</a> 
  and view the copy of the certificate!! </p>

    <!-- <button type="submit" style="margin-bottom: 15px; background: #03a9f4; color:#fff; border:none;
          padding: 6px; border-radius: 5px;"  OnClick="CallPrint(this.value)"><i class="fa fa-print fa-2x" style="cursor: pointer; margin-right: 4px; font-size:17px;" >
          </i>Print</button> -->
          
  </div>

</body>
</html>