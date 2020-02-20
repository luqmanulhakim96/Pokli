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

  ////////////////////////////////////////////////--CURL GOLD PRICE--////////////////////////////////////////////////
  // get the gold current price
  $get_gap_price = "//div[@id='gap-div-table2']";
  $get_gap_price_array = $xpath->query($get_gap_price);
  $gold_price = $get_gap_price_array->item(0)->textContent;

  //get the gram for RM 100 and the price for a gram
  list(, , , , , , $weight_for_a_hundread, , $price_for_a_gram, , ) = explode(' ', $gold_price);

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
  $get_24k_price = "//table[@id='goldbar-table-content2']";
  $get_24k_price_array = $xpath->query($get_24k_price);
  $gold_24k_price = $get_24k_price_array->item(0)->textContent;

  $gold_24k_price = preg_replace('/\s+/', '_', $gold_24k_price);
  // echo $gold_24k_price;
  // echo "<br>";

  list(, , , , , , , , $sell_10g, $buy_10g, , , $sell_20g, $buy_20g, , , $sell_50g, $buy_50g, , , $sell_100g, $buy_100g, , , $sell_250g, $buy_250g, , ,$sell_1000g,$buy_1000g ) = explode('_', $gold_24k_price);

  //replace comma with whitespace

  $buy_10g = preg_replace('/[,]+/', '', trim($buy_10g));
  $sell_10g = preg_replace('/[,]+/', '', trim($sell_10g));

  $buy_20g = preg_replace('/[,]+/', '', trim($buy_20g));
  $sell_20g = preg_replace('/[,]+/', '', trim($sell_20g));

  $buy_50g = preg_replace('/[,]+/', '', trim($buy_50g));
  $sell_50g = preg_replace('/[,]+/', '', trim($sell_50g));

  $buy_100g = preg_replace('/[,]+/', '', trim($buy_100g));
  $sell_100g = preg_replace('/[,]+/', '', trim($sell_100g));

  $buy_250g = preg_replace('/[,]+/', '', trim($buy_250g));
  $sell_250g = preg_replace('/[,]+/', '', trim($sell_250g));

  $buy_1000g = preg_replace('/[,]+/', '', trim($buy_1000g));
  $sell_1000g = preg_replace('/[,]+/', '', trim($sell_1000g));


  ////////////////////////////////////////////////--CURL SMALL 24K--////////////////////////////////////////////////
  // get the 24k gold current price
  $get_small_24k_price = "//div[@id='lbmasmall-div-table2']";
  $get_small_24k_price_array = $xpath->query($get_small_24k_price);
  $gold_small_24k_price = $get_small_24k_price_array->item(0)->textContent;

  $gold_small_24k_price = preg_replace('/\s+/', '_', $gold_small_24k_price);
  // echo $gold_small_24k_price;
  // echo "<br>";

  list(, , , , , , , , $sell_05g , , , $sell_1g, , , $sell_12dinar, , ,$sell_5g) = explode('_', $gold_small_24k_price);

  //replace comma with whitespace

  $sell_05g = preg_replace('/[,]+/', '', trim($sell_05g));

  $sell_1g = preg_replace('/[,]+/', '', trim($sell_1g));

  $sell_12dinar = preg_replace('/[,]+/', '', trim($sell_12dinar));

  $sell_5g = preg_replace('/[,]+/', '', trim($sell_5g));


  ////////////////////////////////////////////////--CURL LBMA GOLD WAFER - DINAR 24K--////////////////////////////////////////////////
  // get the 24k gold current price
  $get_wafer_dinar_24k_price = "//div[@id='dinar-div-table3']";
  $get_wafer_dinar_24k_price_array = $xpath->query($get_wafer_dinar_24k_price);
  $gold_wafer_dinar_24k_price = $get_wafer_dinar_24k_price_array->item(0)->textContent;

  $gold_wafer_dinar_24k_price = preg_replace('/\s+/', '_', $gold_wafer_dinar_24k_price);

  list(, , , , , , , ,  $dinar_1_sell, $dinar_1_buy, , ,$dinar_5_sell ,$dinar_5_buy , , ,$dinar_10_sell,$dinar_10_buy) = explode('_', $gold_wafer_dinar_24k_price);

  //replace comma with whitespace

  $dinar_1_sell = preg_replace('/[,]+/', '', trim($dinar_1_sell));

  $dinar_1_buy = preg_replace('/[,]+/', '', trim($dinar_1_buy));

  $dinar_5_sell = preg_replace('/[,]+/', '', trim($dinar_5_sell));

  $dinar_5_buy = preg_replace('/[,]+/', '', trim($dinar_5_buy));

  $dinar_10_sell = preg_replace('/[,]+/', '', trim($dinar_10_sell));

  $dinar_10_buy = preg_replace('/[,]+/', '', trim($dinar_10_buy));


  ////////////////////////////////////////////////--CLASSIC / BUNGAMAS / TAIFOOK 24K--////////////////////////////////////////////////
  // get the 24k gold current price
  $get_taifook_24k_price = "//div[@id='bunga-div-table2']";
  $get_taifook_24k_price_array = $xpath->query($get_taifook_24k_price);
  $gold_taifook_24k_price = $get_taifook_24k_price_array->item(0)->textContent;

  $gold_taifook_24k_price = preg_replace('/\s+/', '_', $gold_taifook_24k_price);
  // echo $gold_taifook_24k_price;
  // echo "<br>";
  list(, , , , , , , ,$taifook_10g_sell , $taifook_10g_buy, , ,$taifook_20g_sell , $taifook_20g_buy, , ,$taifook_50g_sell ,$taifook_50g_buy, , , $taifook_100g_sell,$taifook_100g_buy) = explode('_', $gold_taifook_24k_price);
  // echo $taifook_10g_sell;
  // echo "<br>";
  // echo $taifook_10g_buy;
  // echo "<br>";
  // echo $taifook_20g_sell;
  // echo "<br>";
  // echo $taifook_20g_buy;
  // echo "<br>";
  // echo $taifook_50g_sell;
  // echo "<br>";
  // echo $taifook_50g_buy;
  // echo "<br>";

  //
  // //replace comma with whitespace
  //

  $taifook_10g_sell = preg_replace('/[,]+/', '', trim($taifook_10g_sell));

  $taifook_10g_buy = preg_replace('/[,]+/', '', trim($taifook_10g_buy));

  $taifook_20g_sell = preg_replace('/[,]+/', '', trim($taifook_20g_sell));

  $taifook_20g_buy = preg_replace('/[,]+/', '', trim($taifook_20g_buy));

  $taifook_50g_sell = preg_replace('/[,]+/', '', trim($taifook_50g_sell));

  $taifook_50g_buy = preg_replace('/[,]+/', '', trim($taifook_50g_buy));

  $taifook_100g_sell = preg_replace('/[,]+/', '', trim($taifook_100g_sell));

  $taifook_100g_buy = preg_replace('/[,]+/', '', trim($taifook_100g_buy));


  ////////////////////////////////////////////////-- FLEXIBAR(24k) --////////////////////////////////////////////////
  // get the 24k gold current price
  $get_flexibar_24k_price = "//div[@id='flexibar-div-table2']";
  $get_flexibar_24k_price_array = $xpath->query($get_flexibar_24k_price);
  $gold_flexibar_24k_price = $get_flexibar_24k_price_array->item(0)->textContent;

  $gold_flexibar_24k_price = preg_replace('/\s+/', '_', $gold_flexibar_24k_price);
  // echo $gold_flexibar_24k_price;
  // echo "<br>";
  list(, , , , , , , , $flexibar_24k_sell, $flexibar_24k_buy) = explode('_', $gold_flexibar_24k_price);
  // echo $flexibar_24k_sell;
  // echo "<br>";
  // echo $flexibar_24k_buy;
  // echo "<br>";
  //
  // //replace comma with whitespace
  //
  $flexibar_24k_sell = preg_replace('/[,]+/', '', trim($flexibar_24k_sell));
  $flexibar_24k_buy = preg_replace('/[,]+/', '', trim($flexibar_24k_buy));


  ////////////////////////////////////////////////-- GOLD WAFER - DINAR (22k) --////////////////////////////////////////////////
  // get the 24k gold current price
  $get_gold_wafer_22k_price = "//div[@id='old-dinar-div-table3']";
  $get_gold_wafer_22k_price_array = $xpath->query($get_gold_wafer_22k_price);
  $gold_gold_wafer_22k_price = $get_gold_wafer_22k_price_array->item(0)->textContent;

  $gold_gold_wafer_22k_price = preg_replace('/\s+/', '_', $gold_gold_wafer_22k_price);
  // echo $gold_gold_wafer_22k_price;
  // echo "<br>";
  list(, , , , , , , , $gold_wafer_22k_sell, $gold_wafer_22k_buy) = explode('_', $gold_gold_wafer_22k_price);
  // echo $gold_wafer_22k_sell;
  // echo "<br>";
  // echo $gold_wafer_22k_buy;
  // echo "<br>";

  // //replace comma with whitespace
  //
  $gold_wafer_22k_sell = preg_replace('/[,]+/', '', trim($gold_wafer_22k_sell));
  $gold_wafer_22k_buy = preg_replace('/[,]+/', '', trim($gold_wafer_22k_buy));


  ////////////////////////////////////////////////-- GOLD JEWELLARY (22k) --////////////////////////////////////////////////
  // get the 24k gold current price
  $get_jewellary_22k_price = "//div[@id='d-series-div-table2']";
  $get_jewellary_22k_price_array = $xpath->query($get_jewellary_22k_price);
  $gold_jewellary_22k_price = $get_jewellary_22k_price_array->item(0)->textContent;

  $gold_jewellary_22k_price = preg_replace('/\s+/', '_', $gold_jewellary_22k_price);
  // echo $gold_jewellary_22k_price;
  // echo "<br>";
  list(, , , , , ,$gold_jewellary_22k_buy ) = explode('_', $gold_jewellary_22k_price);
  // echo $gold_jewellary_22k_buy;
  // echo "<br>";

  // //replace comma with whitespace
  //
  $gold_jewellary_22k_buy = preg_replace('/[,]+/', '', trim($gold_jewellary_22k_buy));

  ////////////////////////////////////////////////--SQL UPDATE--////////////////////////////////////////////////
  //update gram value for per RM 100
  $sql_update_gram_value = "UPDATE gold_live_price_gap SET gram ='".$weight_for_a_hundread."' WHERE price = '100'";

  if ($conn->query($sql_update_gram_value) === TRUE) {
      echo "Gram per RM100 updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update price per gram
  $sql_update_price_value = "UPDATE gold_live_price_gap SET price ='".$price_for_a_gram."' WHERE gram = '1'";

  if ($conn->query($sql_update_price_value) === TRUE) {
      echo "Price per gram updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update datetime
  $sql_update_datetime = "UPDATE gold_live_price_gap SET last_updated ='".$datetime_gold_updated."'";

  if ($conn->query($sql_update_datetime) === TRUE) {
      echo "Date and time updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_gram_value_10g = "UPDATE gold_live_price_24k SET buy ='".$buy_10g."', sell='".$sell_10g."' WHERE gram = '10'";

  if ($conn->query($sql_update_gram_value_10g) === TRUE) {
      echo "Gram 10g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  //update price per gram
  $sql_update_price_value_05g = "UPDATE gold_live_price_small_24k SET sell='".$sell_05g."' WHERE gram = '0.5'";

  if ($conn->query($sql_update_price_value_05g) === TRUE) {
      echo "Price 0.5g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_1g = "UPDATE gold_live_price_small_24k SET sell='".$sell_1g."' WHERE gram = '1'";

  if ($conn->query($sql_update_price_value_1g) === TRUE) {
      echo "Price 1g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_12dinar = "UPDATE gold_live_price_small_24k SET sell='".$sell_12dinar."' WHERE gram = '2'";

  if ($conn->query($sql_update_price_value_12dinar) === TRUE) {
      echo "Price 1/2 dinar updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_5g = "UPDATE gold_live_price_small_24k SET sell='".$sell_5g."' WHERE gram = '5'";

  if ($conn->query($sql_update_price_value_5g) === TRUE) {
      echo "Price 5g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_20g = "UPDATE gold_live_price_24k SET buy ='".$buy_20g."', sell='".$sell_20g."' WHERE gram = '20'";

  if ($conn->query($sql_update_price_value_20g) === TRUE) {
      echo "Price 20g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_50g = "UPDATE gold_live_price_24k SET buy ='".$buy_50g."', sell='".$sell_50g."' WHERE gram = '50'";

  if ($conn->query($sql_update_price_value_50g) === TRUE) {
      echo "Price 50g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_100g = "UPDATE gold_live_price_24k SET buy ='".$buy_100g."', sell='".$sell_100g."' WHERE gram = '100'";

  if ($conn->query($sql_update_price_value_100g) === TRUE) {
      echo "Price 100g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_250g = "UPDATE gold_live_price_24k SET buy ='".$buy_250g."', sell='".$sell_250g."' WHERE gram = '250'";

  if ($conn->query($sql_update_price_value_250g) === TRUE) {
      echo "Price 250g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_value_1000g = "UPDATE gold_live_price_24k SET buy ='".$buy_1000g."', sell='".$sell_1000g."' WHERE gram = '1000'";

  if ($conn->query($sql_update_price_value_1000g) === TRUE) {
      echo "Price 1000g updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  ////////////////////////////////////////////////-- UPDATE LBMA GOLD WAFER - DINAR 24K--////////////////////////////////////////////////

  $sql_update_price_dinar_1 = "UPDATE gold_live_price_gold_wafer_24k SET buy ='".$dinar_1_buy."', sell='".$dinar_1_sell."' WHERE gram = '1'";

  if ($conn->query($sql_update_price_dinar_1) === TRUE) {
      echo "Price 1g LBMA GOLD WAFER - DINAR 24K updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_dinar_5 = "UPDATE gold_live_price_gold_wafer_24k SET buy ='".$dinar_5_buy."', sell='".$dinar_5_sell."' WHERE gram = '5'";

  if ($conn->query($sql_update_price_dinar_5) === TRUE) {
      echo "Price 5g LBMA GOLD WAFER - DINAR 24K updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_dinar_10 = "UPDATE gold_live_price_gold_wafer_24k SET buy ='".$dinar_10_buy."', sell='".$dinar_10_sell."' WHERE gram = '10'";

  if ($conn->query($sql_update_price_dinar_10) === TRUE) {
      echo "Price 10g LBMA GOLD WAFER - DINAR 24K updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }


  ////////////////////////////////////////////////-- UPDATE TAIFOOK --////////////////////////////////////////////////

  $sql_update_price_taifook_10 = "UPDATE gold_live_price_taifook_24k SET buy ='".$taifook_10g_buy."', sell='".$taifook_10g_sell."' WHERE gram = '10'";

  if ($conn->query($sql_update_price_taifook_10) === TRUE) {
      echo "Price 10g TAIFOOK updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_taifook_20 = "UPDATE gold_live_price_taifook_24k SET buy ='".$taifook_20g_buy."', sell='".$taifook_20g_sell."' WHERE gram = '20'";

  if ($conn->query($sql_update_price_taifook_20) === TRUE) {
      echo "Price 20g TAIFOOK updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_taifook_50 = "UPDATE gold_live_price_taifook_24k SET buy ='".$taifook_50g_buy."', sell='".$taifook_50g_sell."' WHERE gram = '50'";

  if ($conn->query($sql_update_price_taifook_50) === TRUE) {
      echo "Price 50g TAIFOOK updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $sql_update_price_taifook_100 = "UPDATE gold_live_price_taifook_24k SET buy ='".$taifook_100g_buy."', sell='".$taifook_100g_sell."' WHERE gram = '100'";

  if ($conn->query($sql_update_price_taifook_100) === TRUE) {
      echo "Price 100g TAIFOOK updated successfully <br>";
  } else {
      echo "Error updating record: " . $conn->error;
  }

  ////////////////////////////////////////////////-- UPDATE FLEXIBAR(24k) --////////////////////////////////////////////////

    $sql_update_price_flexibar_24k = "UPDATE gold_live_price_flexibar_24k SET buy ='".$flexibar_24k_buy."', sell='".$flexibar_24k_sell."' WHERE gram = '50'";

    if ($conn->query($sql_update_price_flexibar_24k) === TRUE) {
        echo "Price 50g flexibar updated successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

  ////////////////////////////////////////////////-- GOLD WAFER - DINAR (22k) --////////////////////////////////////////////////

    $sql_update_price_gold_wafer_22k = "UPDATE gold_live_price_gold_wafer_22k SET buy ='".$gold_wafer_22k_buy."', sell='".$gold_wafer_22k_sell."' WHERE gram = '1'";

    if ($conn->query($sql_update_price_gold_wafer_22k) === TRUE) {
        echo "Price 1g gold wafer 22k updated successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    ////////////////////////////////////////////////-- GOLD JEWELLARY (22k) --////////////////////////////////////////////////
    $gold_jewellary_22k_buy = preg_replace('/[,]+/', '', trim($gold_jewellary_22k_buy));

    $sql_update_price_jewellary_22k = "UPDATE gold_live_price_jewellary_22k SET buy ='".$gold_jewellary_22k_buy."' WHERE gram = '1'";

    if ($conn->query($sql_update_price_jewellary_22k) === TRUE) {
        echo "Price 1g jewellary updated successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

  $conn->close();

?>
