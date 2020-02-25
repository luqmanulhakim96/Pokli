<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  //Database information
  $servername = "localhost";
  $username = "root";
  $password = "P@ssw0rd123";
  $dbname = "local";

  // Create connection in MYSQLi
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $status_sql = "SELECT status,id,created_at FROM customers WHERE status=1";
  $status_query = mysqli_query($conn, $status_sql) or Die("Sorry, dead query");
  while($row = mysqli_fetch_array($status_query))
  {
    $customer[] = $row;
  }

  for ($i=0; $i < count($customer) ; $i++) {
    $customer_id = $customer[$i]['id'];
    $timestamp = strtotime($customer[$i]['created_at']);
    $current_date = time();
    $diff = $current_date - $timestamp;

    $check_purchase_gold_sql = "SELECT SUM(quantity) as sum FROM gold_silver_history WHERE customer_id = '".$customer_id."' AND activity='purchase' AND status='completed' AND product_type='gold' ";
    $check_buyback_gold_sql = "SELECT SUM(quantity) as sum FROM gold_silver_history WHERE customer_id = '".$customer_id."' AND activity='buyback' AND status='completed' AND product_type='gold' ";
    $check_purchase_gold_query = mysqli_query($conn,$check_purchase_gold_sql)or Die("Sorry, dead query");
    $check_buyback_gold_query= mysqli_query($conn,$check_buyback_gold_sql)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($check_purchase_gold_query))
    {
      $purchase[] = $row;
    }
    while($row = mysqli_fetch_array($check_buyback_gold_query))
    {
      $buyback[] = $row;
    }

    $total = $purchase[$i]['sum'] - $buyback[$i]['sum'];
    if($diff > 86400)
    {
      if($total < 1) #check if gold is less than 1 gram
      {
        $update_status_sql = "UPDATE customers SET status=0 WHERE id='".$customer_id."'";
        if ($conn->query($update_status_sql) === TRUE) {
            echo "Updated <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
    else
    {
     echo 'less than 24 hours';
    }
  }
?>
