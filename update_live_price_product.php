<?php

  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);


  //Database information
  $servername = "localhost";
  $username = "root";
  $password = "P@ssw0rd123";
  $dbname = "pokli";

  $servername2 = "localhost";
  $username2 = "root";
  $password2 = "P@ssw0rd123";
  $dbname2 = "live_price_api";

  // Create connection in MYSQLi
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
  // Check connection
  if ($conn2->connect_error) {
      die("Connection failed: " . $conn2->connect_error);
  }

  $sql_get_gold_24k = "SELECT gram, sell FROM gold_live_price_24k";
  $query_get_gold_24k = mysqli_query($conn2, $sql_get_gold_24k) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k))
  {
    $get_gold_24k [] = $row;
  }

  $sql_get_silver_24k = "SELECT gram, sell FROM silver_live_price_24k";
  $query_get_silver_24k = mysqli_query($conn2, $sql_get_silver_24k) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k))
  {
    $get_silver_24k [] = $row;
  }

  for ($i = 0; $i < count($get_gold_24k); $i++) {
    echo $array[$i]['gram'];
    echo $array[$i]['sell'];
  }

  for ($i = 0; $i < count($get_silver_24k); $i++) {
    echo $array[$i]['gram'];
    echo $array[$i]['sell'];
  }


  ////////////////////////////////////////////////--SQL UPDATE--////////////////////////////////////////////////
  // $sql_update_price_value_5000g = "UPDATE silver_live_price_24k SET buy ='".$buy_5000g."', sell='".$sell_5000g."' WHERE gram = '5000'";
  //
  // if ($conn->query($sql_update_price_value_5000g) === TRUE) {
  //     echo "Price 5000g updated successfully <br>";
  // } else {
  //     echo "Error updating record: " . $conn->error;
  // }
  //

  $conn->close();

?>
