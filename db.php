<?php

$conn = mysqli_connect("localhost","root","","lms3");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 