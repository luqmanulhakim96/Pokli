<?php

  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);


  //Database information
  $servername = "localhost"; // IP
  $username = "root";  //please provide   login username of the database
  $password = "P@ssw0rd123";  //plear provide   password of the database
  $dbname = "live_price_api"; //Please provide   name of the database

  // Create connection in MYSQL
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $doc = new DOMDocument;

  // We don't want to bother with white spaces
  $doc->preserveWhiteSpace = false;

  // Most HTML Developers are chimps and produce invalid markup...
  $doc->strictErrorChecking = false;
  $doc->recover = true;

  $doc->loadHTMLFile('https://www.publicgold.com.my/');

  $xpath = new DOMXPath($doc);

  ////////////////////////////////////////////////--CURL SIVLER PRICE--////////////////////////////////////////////////
  // get the gold current price
  $get_sap_price = "//div[@id='sap-div-table2']";
  $get_sap_price_array = $xpath->query($get_sap_price);
  $silver_price = $get_sap_price_array->item(0)->textContent;

  //get the gram for RM 100 and the price for a gram
  list(, , , , , , $weight_for_a_hundread, , $price_for_a_gram, , ) = explode(' ', $silver_price);

  ////////////////////////////////////////////////--CURL DATETIME--////////////////////////////////////////////////
  // get the datetime for gold update
  $get_datetime = "//div[@id='red-table2']";
  $get_datetime_array = $xpath->query($get_datetime);
  $date_and_time = $get_datetime_array->item(0)->textContent;

  //remove ")" in the string with whitespace
  $date_and_time_new = str_replace(")","",$date_and_time);

  //only pick the date which located after 49 words
  $date_and_time_substr = substr($date_and_time_new ,49);

  //convert $date_and_time_substr to datetime for db compatibility
  $datetime_gold_updated = date("Y/m/d H:i:s", strtotime($date_and_time_substr));


  ////////////////////////////////////////////////--CURL 24K--////////////////////////////////////////////////
  // get the 24k gold current price
  $get_24k_price = "//table[@id='silverbar-table-content2']";
  $get_24k_price_array = $xpath->query($get_24k_price);
  $silver_24k_price = $get_24k_price_array->item(0)->textContent;

  $silver_24k_price = preg_replace('/\s+/', '_', $silver_24k_price);


  list(, , , , , , , , $sell_100g, $buy_100g, , , $sell_250g, $buy_250g, , , $sell_500g, $buy_500g, , , $sell_1000g, $buy_1000g, , , $sell_5000g, $buy_5000g) = explode('_', $silver_24k_price);

  //replace comma with whitespace
  $buy_100g = preg_replace('/[,]+/', '', trim($buy_100g));
  $sell_100g = preg_replace('/[,]+/', '', trim($sell_100g));

  $buy_250g = preg_replace('/[,]+/', '', trim($buy_250g));
  $sell_250g = preg_replace('/[,]+/', '', trim($sell_250g));

  $buy_500g = preg_replace('/[,]+/', '', trim($buy_500g));
  $sell_500g = preg_replace('/[,]+/', '', trim($sell_500g));

  $buy_1000g = preg_replace('/[,]+/', '', trim($buy_1000g));
  $sell_1000g = preg_replace('/[,]+/', '', trim($sell_1000g));

  $buy_5000g = preg_replace('/[,]+/', '', trim($buy_5000g));
  $sell_5000g = preg_replace('/[,]+/', '', trim($sell_5000g));

  ////////////////////////////////////////////////--SQL UPDATE--////////////////////////////////////////////////
  // update gram value for per RM 100
  $sql_update_gram_value = "UPDATE silver_live_price_sap SET gram ='".$weight_for_a_hundread."' WHERE price = '100'";

  if ($conn->query($sql_update_gram_value) === TRUE) {
      echo "Gram per RM100 updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update price per gram
  $sql_update_price_value = "UPDATE silver_live_price_sap SET price ='".$price_for_a_gram."' WHERE gram = '100'";

  if ($conn->query($sql_update_price_value) === TRUE) {
      echo "Price per gram updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update datetime
  $sql_update_datetime = "UPDATE silver_live_price_sap SET last_updated ='".$datetime_gold_updated."'";

  if ($conn->query($sql_update_datetime) === TRUE) {
      echo "Date and time updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update gram value for per RM 100
  $sql_update_gram_value_100g = "UPDATE silver_live_price_24k SET buy ='".$buy_100g."', sell='".$sell_100g."' WHERE gram = '100'";

  if ($conn->query($sql_update_gram_value_100g) === TRUE) {
      echo "Gram 100g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update price per gram
  $sql_update_price_value_200g = "UPDATE silver_live_price_24k SET buy ='".$buy_250g."', sell='".$sell_250g."' WHERE gram = '250'";

  if ($conn->query($sql_update_price_value_200g) === TRUE) {
      echo "Price 250g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_500g = "UPDATE silver_live_price_24k SET buy ='".$buy_500g."', sell='".$sell_500g."' WHERE gram = '500'";

  if ($conn->query($sql_update_price_value_500g) === TRUE) {
      echo "Price 500g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_1000g = "UPDATE silver_live_price_24k SET buy ='".$buy_1000g."', sell='".$sell_1000g."' WHERE gram = '1000'";

  if ($conn->query($sql_update_price_value_1000g) === TRUE) {
      echo "Price 1000g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_5000g = "UPDATE silver_live_price_24k SET buy ='".$buy_5000g."', sell='".$sell_5000g."' WHERE gram = '5000'";

  if ($conn->query($sql_update_price_value_5000g) === TRUE) {
      echo "Price 5000g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }


  $conn->close();

?>
