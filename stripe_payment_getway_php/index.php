<?php
error_reporting(1);
session_start();
include "../db.php";
require 'stripe/Stripe.php';
$dinst='d-none'; $dstd='d-none';
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
if(mysqli_num_rows($output2)>0){
	$iid=$output2['id']; $dinst='d-block';
}
else{
	$data2 = mysqli_query($conn, "SELECT * FROM student where email='$email'");
	$output2 = mysqli_fetch_assoc($data2);
	$sid=$output2['id']; $dstd='d-block';
}


if(isset($_GET['valid'])){
	$valid=$_GET['valid'];
	if($valid==30){
		$amountcent=500;
		$amount="5.00";
	}
	elseif($valid==60){
	   $amountcent=800;
	   $amount="8.00";
   }elseif($valid==90){
	   $amountcent=1000;
	   $amount="10.00";
   }
   else{ 	$amountcent=1500;
	   $amount="15.00";}
	   $date=date('Y-m-d');
	   $exp_date = date('Y-m-d', strtotime($valid.' days', strtotime($date)));
	 
   }

$publishable_key 	= "pk_test_51HiFJzLKk00ufINsOmlkZ0WJ990coLZMEc54Nviwaq7OdDd3NIQa6k4gDXGCestqr6IGWHPoZsS2NprcdMfdlX8000eKbdU3px";
$secret_key			= "sk_test_51HiFJzLKk00ufINsZUj3YZr2hr87gL36f7joMazvNwGCLfXYkBNLxZN2db8kXCfh0v7P6SbzoBn274Q3pRCr9u8300oWvke62K";

if(isset($_POST['stripeToken'])){
	Stripe::setApiKey($secret_key);
	$description 	= "Invoice #".rand(99999,999999999);
	$amount_cents 	= $amountcent;
	$tokenid		= $_POST['stripeToken'];
	 $name		= $_POST['name'];
	 $lkey		= $_POST['lkey'];
	
	try {
		$charge 		= Stripe_Charge::create(array( 
		"amount" 		=> $amount_cents,
		"currency" 		=> "usd",
		"source" 		=> $tokenid,
		"description" 	=> $description)			  
		);
		
		$id			= $charge['id'];
		$amount 	= $charge['amount'];
        $balance_transaction = $charge['balance_transaction'];
        $currency 	= $charge['currency'];
        $status 	= $charge['status'];
        $date 	= date("Y-m-d H:i:s");
		
		$result = "succeeded";
		
		$lkey =  $_POST['lkey'];
		$insert1 = mysqli_query($conn,"INSERT INTO `lisence`(`lkey`, `iid`, `sid`,`exp_date`)
		VALUES('$lkey','$iid','$sid','$exp_date')");
		/* You can save the above response in DB */
		header("location:index.php?id=".$id);
		exit;
		 //Add LISENCE to DB
			
			// if($insert1){
			// 	echo "<script> alert('Lisence is Assigned Successfully!');window.location.href='students.php' </script>";
			// }
			

		}catch(Stripe_CardError $e) {			
			$error = $e->getMessage();
			$result = "declined";
		}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Stripe Payment Gateway</title>
<meta name="title" content="Registration Form with PHP Captcha Demo"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> 

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Responsive styles-->
<link rel="stylesheet" href="css/demo-style.css"> 
<!-- Font awosome -->
<link rel="stylesheet" href="css/font-awesome.min.css">  

</head>
<body onload='makekey()'>
<a href="../Instructor/lisences.php" class='btn btn-info <?php echo $dinst?>' style="position:absolute; margin-top:2rem;margin-left:300px">< Back to Dashboard</a>
<a href="../index.php" class='btn btn-info <?php echo $dstd?>' style="position:absolute; margin-top:2rem;margin-left:300px">< Back to Dashboard</a>
<section class="pading-bottom-30">
 		<div class="bg_area_1">
 		    <div class="container">  
                <div class="row">
                    <div class="form-box-size login-form-3 box-shadow"> 
               
                        <div class="login-form-title-3">
                            <h3>Stripe Payment Form</h3>
                        </div>  
                        <div class="login-form-box-3">
                            <div class="form-wrapper"> 
                              <form action="" method="post" name="cardpayment" id="payment-form">
								<?php 
								if($_GET['id']!=""){
								?>
								<div class="form-group">
                                  <div class="payment-success">Thanks for your payment. <br/> Your Transaction Id: <?php print $_GET['id']?></div>
                                </div>
								<?php } ?>
								
                                <div class="form-group">
                                  <label class="form-label" for="name">Card Holder Name</label>
                                  <input name="holdername" id="name" class="form-input" type="text"  required />
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                
                                <div class="form-group">
                                  <label class="form-label" for="email">Email</label>
                                  <input name="email" id="email" class="form-input" type="email" required />
                                 <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
								
								<div class="form-group">
                                  <label class="form-label" for="card">Card Number</label>
                                  <input name="cardnumber" id="card" class="form-input" type="text" maxlength="16" data-stripe="number" required />
                                 <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                                </div>


                                <div class="form-group2">
                                  <label class="form-label" for="password">Expiry Month / Year & CVV</label>
								  <select name="month" id="month" class="form-input2" data-stripe="exp_month">
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
								
								<select name="year" id="year" class="form-input2" data-stripe="exp_year">
									<option value="19">2019</option>
									<option value="20">2020</option>
									<option value="21">2021</option>
									<option value="22">2022</option>
									<option value="23">2023</option>
									<option value="24">2024</option>
									<option value="25">2025</option>
									<option value="26">2026</option>
									<option value="27">2027</option>
									<option value="28">2028</option>
									<option value="29">2029</option>
									<option value="30">2030</option>
								</select>
								
								<input name="cvv" id="cvv" class="form-input2" type="text" placeholder="CVV" data-stripe="cvc" required />
							    <label class="form-label" style='margin-top:6rem'for="validity">Lisence Validity and Key</label>
								<input type="text" name="validity" class="form-input2" id="" value="<?php echo $valid?> days" readonly> 
							
								<input name="lkey" id="lkey" class="form-input2" type="text" readonly/>
                                  <i class="fa fa-calendar" aria-hidden="true"></i>
								  
                                </div>
							
								<div class="form-group">
                                  <div class="payment-errors"></div>
                                </div>

                                <div class="button-style">
                                    <button class="button login submit">
                                       PAY NOW($ <?php echo $amount; ?> ) <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                              </form>
                            </div>
                        </div>  
                        
                    </div>
                </div> 
            </div> 
 		</div> 
 	</section>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript"> 
function makekey() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
 
  for (var i = 0; i < 8; i++){
    text += possible.charAt(Math.floor(Math.random() * possible.length));}
    document.getElementById("lkey").value=text ;
	
} 

	Stripe.setPublishableKey('<?php print $publishable_key; ?>');
  
	$(function() {
	  var $form = $('#payment-form');
	  $form.submit(function(event) {
		// Disable the submit button to prevent repeated clicks:
		$form.find('.submit').prop('disabled', true);
	
		// Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);
	
		// Prevent the form from being submitted:
		return false;
	  });
	});

	function stripeResponseHandler(status, response) {
	  // Grab the form:
	  var $form = $('#payment-form');
	
	  if (response.error) { // Problem!
	
		// Show the errors on the form:
		$form.find('.payment-errors').text(response.error.message);
		$form.find('.submit').prop('disabled', false); // Re-enable submission
	
	  } else { // Token was created!
	
		// Get the token ID:
		var token = response.id;

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" name="stripeToken">').val(token));
	
		// Submit the form:
		$form.get(0).submit();
	  }
	};
	
</script>

</body>
</html>