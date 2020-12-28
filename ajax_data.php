<?php
include "db.php";
//Edit Admin.php
if(isset($_GET['cid'])){
  $cid=$_GET['cid'];
 $sql = mysqli_query($conn, "SELECT * FROM customers where id='$cid'");
 $result = mysqli_fetch_assoc($sql);
    echo $result['b_amount'];
}//Get Borrow price of customer borrow_payment.php

?>
