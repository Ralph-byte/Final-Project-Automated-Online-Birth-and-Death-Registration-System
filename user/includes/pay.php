<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Auomated Online Birth and Death Registration System.</title>

    <!-- Google Fonts
		============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Monsterrat:300,300i,400,400i,700,700i,800" rel="stylesheet">
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

</head>
<body>

<style>
        /* Payment Gateway Integration */

html, body {
    height: 100%;
    font-family: 'Monsterrat', sans-serif;
    font-weight:400;
    background: #ebebeb;
}

body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}        
.container{
	max-width: 750px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
    flex-grow: 1;
}
h3{
	text-align: center;
}
.logo{
    width: 100%;
}
label{
	display: block;
	margin-top: 10px;
    text-align: left;
    width: 120px;
    font-size: 14px;
}
input[type="text"],input[type="email"], 
input[type="tel"]{
	width: 90%;
    height: 35px;
	padding: 0px 35px 0px 10px;
	margin: 10px 0px;
    border: 1px solid #ccc;
}
input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus{
    border: 1px solid #039af4;
    border-radius: 5px;

}
.btn-form{
    margin-top: 15px;
	padding: 10px 20px;
	background-color: #03a9f4;
	color: #fff;
	border: none;
	cursor: pointer;
    transition: all .4s ease 0s;
}
.btn-form:hover:focus{
	background-color: #303030;
    border-radius: 4px;
}

hr{
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #eee;

}

.footer {

    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100px;
    color: #fff;
    text-align: center;
    padding-top: 15px;
    flex-shrink: 0;
    align-items: center;
}
        
    </style>
    <div class="container">
        <h2 style="font-weight: 500; color: #303030;">Automated Online Birth & Death Registration System</h2>
        <hr>
    
        <h3 style="font-weight: 600; color: #039af4;" >Birth & Death Payment</h3>
        <form id="paymentForm">
        <div class="form-group">
          <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
          <input type="email" id="email-address" required />
        </div>
        <div class="form-group">
          <label for="amount"><i class="fas fa-money-bill-alt"></i> Amount (150Ghs)</label>
          <input type="tel" id="amount" required />
        </div>
        <div class="form-group">
          <label for="first-name"><i class="fas fa-user"></i> First Name</label>
          <input type="text" id="first-name" />
        </div>
        <div class="form-group">
          <label for="last-name"><i class="fas fa-user"></i> Last Name</label>
          <input type="text" id="last-name" />
        </div>
        <div class="form-submit">
          <button class="btn btn-primary btn-form " type="submit" onclick="payWithPaystack()">
          <i class="fas fa-credit-card"></i> Pay
        </button></div>

        </form>
    </div>    
      
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_6ae549b1437165e2d8db68ebe43c1e97de618ab4', // Replace with your public key
            email: document.getElementById("email-address").value,
            currency: "GHS",
            amount: document.getElementById("amount").value * 100,
            ref: 'SD'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
              window.location = "http://localhost/finaldbs/user/includes/pay.php?transaction=cancel"
              alert('transaction cancelled.');
            },
            callback: function(response){
              let message = 'Payment complete! Reference: ' + response.reference;
              alert(message);
              window.location = "http://localhost/finaldbs/user/includes/verify_transaction.php?reference=" + response.reference;
            }
        });
        
          handler.openIframe();
    }
        
    </script>

    <footer class="footer=" style="margin-top: 20px;">
    
    <p><img src="../img/logo/l1.png" alt="Logo" style=" vertical-align: middle; margin-right: 8px;width: 30px; height: 30px;"> 
        &copy; 2023 Automated Online Birth and Death Registration System.
    </p>
    </footer>

</body>
</html>