<?php
$conn = mysqli_connect('localhost', 'root', '', 'dynamic-chart');

// check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MYSQL" . mysqli_connect_error();
  exit();
}
