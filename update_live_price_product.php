<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  //Database information
  $servername = "localhost";
  $username = "root";
  $password = "P@ssw0rd123";
  $dbname = "pokli";

  $servername2 = "localhost";
  $username2 = "root";
  $password2 = "P@ssw0rd123";
  $dbname2 = "live_price_api";

  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "pokli3";
  //
  // $servername2 = "localhost";
  // $username2 = "root";
  // $password2 = "";
  // $dbname2 = "live_price_api";

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

  //gold_live_price_24k
  $sql_get_gold_24k_10g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='10'";
  $query_get_gold_24k_10g = mysqli_query($conn2, $sql_get_gold_24k_10g) or Die("Sorry, dead query 1");

  while($row = mysqli_fetch_array($query_get_gold_24k_10g))
  {
    $get_gold_24k_10g_gram = $row['gram'];
    $get_gold_24k_10g_price = $row['sell'];
  }

  $sql_get_gold_24k_20g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='20'";
  $query_get_gold_24k_20g = mysqli_query($conn2, $sql_get_gold_24k_20g) or Die("Sorry, dead query 2");

  while($row = mysqli_fetch_array($query_get_gold_24k_20g))
  {
    $get_gold_24k_20g_gram = $row['gram'];
    $get_gold_24k_20g_price = $row['sell'];
  }

  $sql_get_gold_24k_50g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='50'";
  $query_get_gold_24k_50g = mysqli_query($conn2, $sql_get_gold_24k_50g) or Die("Sorry, dead query 3");

  while($row = mysqli_fetch_array($query_get_gold_24k_50g))
  {
    $get_gold_24k_50g_gram = $row['gram'];
    $get_gold_24k_50g_price = $row['sell'];
  }

  $sql_get_gold_24k_100g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='100'";
  $query_get_gold_24k_100g = mysqli_query($conn2, $sql_get_gold_24k_100g) or Die("Sorry, dead query 4");

  while($row = mysqli_fetch_array($query_get_gold_24k_100g))
  {
    $get_gold_24k_100g_gram = $row['gram'];
    $get_gold_24k_100g_price = $row['sell'];
  }

  $sql_get_gold_24k_250g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='250'";
  $query_get_gold_24k_250g = mysqli_query($conn2, $sql_get_gold_24k_250g) or Die("Sorry, dead query 5");

  while($row = mysqli_fetch_array($query_get_gold_24k_250g))
  {
    $get_gold_24k_250g_gram = $row['gram'];
    $get_gold_24k_250g_price = $row['sell'];
  }

  $sql_get_gold_24k_1000g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='1000'";
  $query_get_gold_24k_1000g = mysqli_query($conn2, $sql_get_gold_24k_1000g) or Die("Sorry, dead query 6");

  while($row = mysqli_fetch_array($query_get_gold_24k_1000g))
  {
    $get_gold_24k_1000g_gram = $row['gram'];
    $get_gold_24k_1000g_price = $row['sell'];
  }

  //gold_live_price_gold_wafer_24k
  $sql_get_gold_live_price_gold_wafer_24k_1g = "SELECT gram, sell FROM gold_live_price_gold_wafer_24k WHERE gram='1'";
  $query_get_gold_live_price_gold_wafer_24k_1g = mysqli_query($conn2, $sql_get_gold_live_price_gold_wafer_24k_1g) or Die("Sorry, dead query 7");

  while($row = mysqli_fetch_array($query_get_gold_live_price_gold_wafer_24k_1g))
  {
    $get_gold_live_price_gold_wafer_24k_1g_gram = $row['gram'];
    $get_gold_live_price_gold_wafer_24k_1g_price = $row['sell'];
  }

  $sql_get_gold_live_price_gold_wafer_24k_5g = "SELECT gram, sell FROM gold_live_price_gold_wafer_24k WHERE gram='5'";
  $query_get_gold_live_price_gold_wafer_24k_5g = mysqli_query($conn2, $sql_get_gold_live_price_gold_wafer_24k_5g) or Die("Sorry, dead query 8");

  while($row = mysqli_fetch_array($query_get_gold_live_price_gold_wafer_24k_5g))
  {
    $get_gold_live_price_gold_wafer_24k_5g_gram = $row['gram'];
    $get_gold_live_price_gold_wafer_24k_5g_price = $row['sell'];
  }

  $sql_get_gold_live_price_gold_wafer_24k_10g = "SELECT gram, sell FROM gold_live_price_gold_wafer_24k WHERE gram='10'";
  $query_get_gold_live_price_gold_wafer_24k_10g = mysqli_query($conn2, $sql_get_gold_live_price_gold_wafer_24k_10g) or Die("Sorry, dead query 9");

  while($row = mysqli_fetch_array($query_get_gold_live_price_gold_wafer_24k_10g))
  {
    $get_gold_live_price_gold_wafer_24k_10g_gram = $row['gram'];
    $get_gold_live_price_gold_wafer_24k_10g_price = $row['sell'];
  }

  //gold_live_price_flexibar_24k
  $sql_get_gold_live_price_flexibar_24k_50g = "SELECT gram, sell FROM gold_live_price_flexibar_24k WHERE gram='50'";
  $query_get_gold_live_price_flexibar_24k_50g = mysqli_query($conn2, $sql_get_gold_live_price_flexibar_24k_50g) or Die("Sorry, dead query 10");

  while($row = mysqli_fetch_array($query_get_gold_live_price_flexibar_24k_50g))
  {
    $get_gold_live_price_flexibar_24k_50g_gram = $row['gram'];
    $get_gold_live_price_flexibar_24k_50g_price = $row['sell'];
  }

  //gold_live_price_taifook_24k
  $sql_get_gold_live_price_taifook_24k_10g = "SELECT gram, sell FROM gold_live_price_taifook_24k WHERE gram='10'";
  $query_get_gold_live_price_taifook_24k_10g = mysqli_query($conn2, $sql_get_gold_live_price_taifook_24k_10g) or Die("Sorry, dead query 11");

  while($row = mysqli_fetch_array($query_get_gold_live_price_taifook_24k_10g))
  {
    $get_gold_live_price_taifook_24k_10g_gram = $row['gram'];
    $get_gold_live_price_taifook_24k_10g_price = $row['sell'];
  }

  $sql_get_gold_live_price_taifook_24k_20g = "SELECT gram, sell FROM gold_live_price_taifook_24k WHERE gram='20'";
  $query_get_gold_live_price_taifook_24k_20g = mysqli_query($conn2, $sql_get_gold_live_price_taifook_24k_20g) or Die("Sorry, dead query 12");

  while($row = mysqli_fetch_array($query_get_gold_live_price_taifook_24k_20g))
  {
    $get_gold_live_price_taifook_24k_20g_gram = $row['gram'];
    $get_gold_live_price_taifook_24k_20g_price = $row['sell'];
  }

  $sql_get_gold_live_price_taifook_24k_50g = "SELECT gram, sell FROM gold_live_price_taifook_24k WHERE gram='50'";
  $query_get_gold_live_price_taifook_24k_50g = mysqli_query($conn2, $sql_get_gold_live_price_taifook_24k_50g) or Die("Sorry, dead query 13");

  while($row = mysqli_fetch_array($query_get_gold_live_price_taifook_24k_50g))
  {
    $get_gold_live_price_taifook_24k_50g_gram = $row['gram'];
    $get_gold_live_price_taifook_24k_50g_price = $row['sell'];
  }

  $sql_get_gold_live_price_taifook_24k_100g = "SELECT gram, sell FROM gold_live_price_taifook_24k WHERE gram='100'";
  $query_get_gold_live_price_taifook_24k_100g = mysqli_query($conn2, $sql_get_gold_live_price_taifook_24k_100g) or Die("Sorry, dead query 14");

  while($row = mysqli_fetch_array($query_get_gold_live_price_taifook_24k_100g))
  {
    $get_gold_live_price_taifook_24k_100g_gram = $row['gram'];
    $get_gold_live_price_taifook_24k_100g_price = $row['sell'];
  }

  //gold_live_price_small_24k
  $sql_get_gold_live_price_small_24k_05g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='0.5'";
  $query_get_gold_live_price_small_24k_05g = mysqli_query($conn2, $sql_get_gold_live_price_small_24k_05g) or Die("Sorry, dead query 15");

  while($row = mysqli_fetch_array($query_get_gold_live_price_small_24k_05g))
  {
    $get_gold_live_price_small_24k_05g_gram = $row['gram'];
    $get_gold_live_price_small_24k_05g_price = $row['sell'];
  }

  $sql_get_gold_live_price_small_24k_1g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='1'";
  $query_get_gold_live_price_small_24k_1g = mysqli_query($conn2, $sql_get_gold_live_price_small_24k_1g) or Die("Sorry, dead query 16");

  while($row = mysqli_fetch_array($query_get_gold_live_price_small_24k_1g))
  {
    $get_gold_live_price_small_24k_1g_gram = $row['gram'];
    $get_gold_live_price_small_24k_1g_price = $row['sell'];
  }

  $sql_get_gold_live_price_small_24k_1dinar = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='1/2'";
  $query_get_gold_live_price_small_24k_1dinar = mysqli_query($conn2, $sql_get_gold_live_price_small_24k_1dinar) or Die("Sorry, dead query 17");

  while($row = mysqli_fetch_array($query_get_gold_live_price_small_24k_1dinar))
  {
    $get_gold_live_price_small_24k_1dinar_gram = $row['gram'];
    $get_gold_live_price_small_24k_1dinar_price = $row['sell'];
  }

  $sql_get_gold_live_price_small_24k_5g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='5'";
  $query_get_gold_live_price_small_24k_5g = mysqli_query($conn2, $sql_get_gold_live_price_small_24k_5g) or Die("Sorry, dead query 18");

  while($row = mysqli_fetch_array($query_get_gold_live_price_small_24k_5g))
  {
    $get_gold_live_price_small_24k_5g_gram = $row['gram'];
    $get_gold_live_price_small_24k_5g_price = $row['sell'];
  }

  //gold_live_price_gold_wafer_22k
  $sql_get_gold_live_price_gold_wafer_22k_1g = "SELECT gram, sell FROM gold_live_price_gold_wafer_22k WHERE gram='1'";
  $query_get_gold_live_price_gold_wafer_22k_1g = mysqli_query($conn2, $sql_get_gold_live_price_gold_wafer_22k_1g) or Die("Sorry, dead query 19");

  while($row = mysqli_fetch_array($query_get_gold_live_price_gold_wafer_22k_1g))
  {
    $get_gold_live_price_gold_wafer_22k_1g_gram = $row['gram'];
    $get_gold_live_price_gold_wafer_22k_1g_price = $row['sell'];
  }

  //gold_live_price_jewellary_22k
  $sql_get_gold_live_price_jewellary_22k_1g = "SELECT gram, buy FROM gold_live_price_jewellary_22k WHERE gram='1'";
  $query_get_gold_live_price_jewellary_22k_1g = mysqli_query($conn2, $sql_get_gold_live_price_jewellary_22k_1g) or Die("Sorry, dead query 20");

  while($row = mysqli_fetch_array($query_get_gold_live_price_gold_wafer_22k_1g))
  {
    $get_gold_live_price_jewellary_22k_1g_gram = $row['gram'];
    $get_gold_live_price_jewellary_22k_1g_price = $row['buy'];
  }

  //silver_live_price_24k
  $sql_get_silver_24k_100g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='100'";
  $query_get_silver_24k_100g = mysqli_query($conn2, $sql_get_silver_24k_100g) or Die("Sorry, dead query 21");

  while($row = mysqli_fetch_array($query_get_silver_24k_100g))
  {
    $get_silver_24k_100g_gram = $row['gram'];
    $get_silver_24k_100g_price = $row['sell'];
  }

  $sql_get_silver_24k_250g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='250'";
  $query_get_silver_24k_250g = mysqli_query($conn2, $sql_get_silver_24k_250g) or Die("Sorry, dead query 22");

  while($row = mysqli_fetch_array($query_get_silver_24k_250g))
  {
    $get_silver_24k_250g_gram = $row['gram'];
    $get_silver_24k_250g_price = $row['sell'];
  }

  $sql_get_silver_24k_500g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='500'";
  $query_get_silver_24k_500g = mysqli_query($conn2, $sql_get_silver_24k_500g) or Die("Sorry, dead query 23");

  while($row = mysqli_fetch_array($query_get_silver_24k_500g))
  {
    $get_silver_24k_500g_gram = $row['gram'];
    $get_silver_24k_500g_price = $row['sell'];
  }

  $sql_get_silver_24k_1000g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='1000'";
  $query_get_silver_24k_1000g = mysqli_query($conn2, $sql_get_silver_24k_1000g) or Die("Sorry, dead query 24");

  while($row = mysqli_fetch_array($query_get_silver_24k_1000g))
  {
    $get_silver_24k_1000g_gram = $row['gram'];
    $get_silver_24k_1000g_price = $row['sell'];
  }

  $sql_get_silver_24k_5000g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='5000'";
  $query_get_silver_24k_5000g = mysqli_query($conn2, $sql_get_silver_24k_5000g) or Die("Sorry, dead query 25");

  while($row = mysqli_fetch_array($query_get_silver_24k_5000g))
  {
    $get_silver_24k_5000g_gram = $row['gram'];
    $get_silver_24k_5000g_price = $row['sell'];
  }

  //silver_live_price_dirham
  $sql_get_silver_live_price_dirham_100g = "SELECT gram, sell FROM silver_live_price_dirham WHERE gram='10'";
  $query_get_silver_live_price_dirham_100g = mysqli_query($conn2, $sql_get_silver_live_price_dirham_100g) or Die("Sorry, dead query 26");

  while($row = mysqli_fetch_array($query_get_silver_live_price_dirham_100g))
  {
    $get_silver_live_price_dirham_1g_gram = $row['gram'];
    $get_silver_live_price_dirham_1g_price = $row['sell'];
  }


  $sql_get_product_flat = "SELECT id,gos_label, weight_gram_label, type_label, price_auto_update_label FROM product_flat";
  $query_get_product_flat = mysqli_query($conn, $sql_get_product_flat) or Die("Sorry, dead query 27 ");

  while($row = mysqli_fetch_array($query_get_product_flat))
  {
    $get_product_flat [] = $row;
  }

  for ($i = 0; $i < count($get_product_flat); $i++){
      if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 10 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_10g_price."', product_flat.min_price='".$get_gold_24k_10g_price."',
                product_flat.max_price='".$get_gold_24k_10g_price."', product_attribute_values.float_value='".$get_gold_24k_10g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 10 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 10 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 20 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_20g_price."', product_flat.min_price='".$get_gold_24k_20g_price."',
                product_flat.max_price='".$get_gold_24k_20g_price."', product_attribute_values.float_value='".$get_gold_24k_20g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 10 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 20 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 50 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_50g_price."', product_flat.min_price='".$get_gold_24k_50g_price."',
                product_flat.max_price='".$get_gold_24k_50g_price."', product_attribute_values.float_value='".$get_gold_24k_50g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 50 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 50 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 100 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_100g_price."', product_flat.min_price='".$get_gold_24k_100g_price."',
                product_flat.max_price='".$get_gold_24k_100g_price."', product_attribute_values.float_value='".$get_gold_24k_100g_prices."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 50 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 100 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 250 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_250g_price."', product_flat.min_price='".$get_gold_24k_250g_price."',
                product_flat.max_price='".$get_gold_24k_250g_price."', product_attribute_values.float_value='".$get_gold_24k_250g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 250 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 250 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Bar (24k) - 1000 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_24k_1000g_price."', product_flat.min_price='".$get_gold_24k_1000g_price."',
                product_flat.max_price='".$get_gold_24k_1000g_price."', product_attribute_values.float_value='".$get_gold_24k_1000g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Bar (24k) - 1000 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Bar (24k) - 1000 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      // LBMA Gold Wafer-Dinar (24k)
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Wafer-Dinar (24k) - 1 Dinar"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_gold_wafer_24k_1g_price."', product_flat.min_price='".$get_gold_live_price_gold_wafer_24k_1g_price."',
                product_flat.max_price='".$get_gold_live_price_gold_wafer_24k_1g_price."', product_attribute_values.float_value='".$get_gold_live_price_gold_wafer_24k_1g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Wafer-Dinar (24k) - 1 Dinar'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Wafer-Dinar (24k) - 1 Dinar updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Wafer-Dinar (24k) - 5 Dinar"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_gold_wafer_24k_5g_price."', product_flat.min_price='".$get_gold_live_price_gold_wafer_24k_5g_price."',
                product_flat.max_price='".$get_gold_live_price_gold_wafer_24k_5g_price."', product_attribute_values.float_value='".$get_gold_live_price_gold_wafer_24k_5g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Wafer-Dinar (24k) - 5 Dinar'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Wafer-Dinar (24k) - 5 Dinar updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Gold Wafer-Dinar (24k) - 10 Dinar"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_gold_wafer_24k_10g_price."', product_flat.min_price='".$get_gold_live_price_gold_wafer_24k_10g_price."',
                product_flat.max_price='".$get_gold_live_price_gold_wafer_24k_10g_price."', product_attribute_values.float_value='".$get_gold_live_price_gold_wafer_24k_10g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Gold Wafer-Dinar (24k) - 10 Dinar'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Gold Wafer-Dinar (24k) - 10 Dinar updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Flexibar (24k) - 50 gram
      else if($get_product_flat[$i]['price_auto_update_label'] == "Flexibar (24k) - 50 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_flexibar_24k_50g_price."', product_flat.min_price='".$get_gold_live_price_flexibar_24k_50g_price."',
                product_flat.max_price='".$get_gold_live_price_flexibar_24k_50g_price."', product_attribute_values.float_value='".$get_gold_live_price_flexibar_24k_50g_price."'
                WHERE product_flat.price_auto_update_label='Flexibar (24k) - 50 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Flexibar (24k) - 50 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Classic | Bungamas | Tai fook (24k)
      else if($get_product_flat[$i]['price_auto_update_label'] == "Classic | Bungamas | Tai fook (24k) - 10 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_taifook_24k_10g_price."', product_flat.min_price='".$get_gold_live_price_taifook_24k_10g_price."',
                product_flat.max_price='".$get_gold_live_price_taifook_24k_10g_price."', product_attribute_values.float_value='".$get_gold_live_price_taifook_24k_10g_price."'
                WHERE product_flat.price_auto_update_label='Classic | Bungamas | Tai fook (24k) - 10 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Classic | Bungamas | Tai fook (24k) - 10 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Classic | Bungamas | Tai fook (24k) - 20 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_taifook_24k_20g_price."', product_flat.min_price='".$get_gold_live_price_taifook_24k_20g_price."',
                product_flat.max_price='".$get_gold_live_price_taifook_24k_20g_price."', product_attribute_values.float_value='".$get_gold_live_price_taifook_24k_20g_price."'
                WHERE product_flat.price_auto_update_label='Classic | Bungamas | Tai fook (24k) - 20 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Classic | Bungamas | Tai fook (24k) - 20 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Classic | Bungamas | Tai fook (24k) - 50 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_taifook_24k_50g_price."', product_flat.min_price='".$get_gold_live_price_taifook_24k_50g_price."',
                product_flat.max_price='".$get_gold_live_price_taifook_24k_50g_price."', product_attribute_values.float_value='".$get_gold_live_price_taifook_24k_50g_price."'
                WHERE product_flat.price_auto_update_label='Classic | Bungamas | Tai fook (24k) - 50 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Classic | Bungamas | Tai fook (24k) - 50 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Classic | Bungamas | Tai fook (24k) - 100 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_taifook_24k_100g_price."', product_flat.min_price='".$get_gold_live_price_taifook_24k_100g_price."',
                product_flat.max_price='".$get_gold_live_price_taifook_24k_100g_price."', product_attribute_values.float_value='".$get_gold_live_price_taifook_24k_100g_price."'
                WHERE product_flat.price_auto_update_label='Classic | Bungamas | Tai fook (24k) - 100 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Classic | Bungamas | Tai fook (24k) - 100 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //LBMA Small Bar | Wafer (24k)
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Small Bar | Wafer (24k) - 0.5 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_small_24k_05g_price."', product_flat.min_price='".$get_gold_live_price_small_24k_05g_price."',
                product_flat.max_price='".$get_gold_live_price_small_24k_05g_price."', product_attribute_values.float_value='".$get_gold_live_price_small_24k_05g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Small Bar | Wafer (24k) - 0.5 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Small Bar | Wafer (24k) - 0.5 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Small Bar | Wafer (24k) - 1 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_small_24k_1g_price."', product_flat.min_price='".$get_gold_live_price_small_24k_1g_price."',
                product_flat.max_price='".$get_gold_live_price_small_24k_1g_price."', product_attribute_values.float_value='".$get_gold_live_price_small_24k_1g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Small Bar | Wafer (24k) - 1 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Small Bar | Wafer (24k) - 1 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Small Bar | Wafer (24k) - 1/2 Dinar"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_small_24k_1dinar_price."', product_flat.min_price='".$get_gold_live_price_small_24k_1dinar_price."',
                product_flat.max_price='".$get_gold_live_price_small_24k_1dinar_price."', product_attribute_values.float_value='".$get_gold_live_price_small_24k_1dinar_price."'
                WHERE product_flat.price_auto_update_label='LBMA Small Bar | Wafer (24k) - 1/2 Dinar'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Small Bar | Wafer (24k) - 1/2 Dinar updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "LBMA Small Bar | Wafer (24k) - 5 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_small_24k_5g_price."', product_flat.min_price='".$get_gold_live_price_small_24k_5g_price."',
                product_flat.max_price='".$get_gold_live_price_small_24k_5g_price."', product_attribute_values.float_value='".$get_gold_live_price_small_24k_5g_price."'
                WHERE product_flat.price_auto_update_label='LBMA Small Bar | Wafer (24k) - 5 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price LBMA Small Bar | Wafer (24k) - 5 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Gold Wafer - Dinar (22k) - 1 Dinar
      else if($get_product_flat[$i]['price_auto_update_label'] == "Gold Wafer - Dinar (22k) - 1 Dinar"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_gold_wafer_22k_1g_price."', product_flat.min_price='".$get_gold_live_price_gold_wafer_22k_1g_price."',
                product_flat.max_price='".$get_gold_live_price_gold_wafer_22k_1g_price."', product_attribute_values.float_value='".$get_gold_live_price_gold_wafer_22k_1g_price."'
                WHERE product_flat.price_auto_update_label='Gold Wafer - Dinar (22k) - 1 Dinar'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Gold Wafer - Dinar (22k) - 1 Dinar updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Gold Wafer - Dinar (22k) - 1 Dinar
      else if($get_product_flat[$i]['price_auto_update_label'] == "Gold Jewellery (22k) - 1 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_gold_live_price_jewellary_22k_1g_price."', product_flat.min_price='".$get_gold_live_price_jewellary_22k_1g_price."',
                product_flat.max_price='".$get_gold_live_price_jewellary_22k_1g_price."', product_attribute_values.float_value='".$get_gold_live_price_jewellary_22k_1g_price."'
                WHERE product_flat.price_auto_update_label='Gold Jewellery (22k) - 1 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Gold Jewellery (22k) - 1 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Silver Bar (999)
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Bar (999) - 100 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_24k_100g_price."', product_flat.min_price='".$get_silver_24k_100g_price."',
                product_flat.max_price='".$get_silver_24k_100g_price."', product_attribute_values.float_value='".$get_silver_24k_100g_price."'
                WHERE product_flat.price_auto_update_label='Silver Bar (999) - 100 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Bar (999) - 100 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Bar (999) - 250 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_24k_250g_price."', product_flat.min_price='".$get_silver_24k_250g_price."',
                product_flat.max_price='".$get_silver_24k_250g_price."', product_attribute_values.float_value='".$get_silver_24k_250g_price."'
                WHERE product_flat.price_auto_update_label='Silver Bar (999) - 250 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Bar (999) - 250 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Bar (999) - 500 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_24k_500g_price."', product_flat.min_price='".$get_silver_24k_500g_price."',
                product_flat.max_price='".$get_silver_24k_500g_price."', product_attribute_values.float_value='".$get_silver_24k_500g_price."'
                WHERE product_flat.price_auto_update_label='Silver Bar (999) - 500 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Bar (999) - 500 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Bar (999) - 1000 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_24k_1000g_price."', product_flat.min_price='".$get_silver_24k_1000g_price."',
                product_flat.max_price='".$get_silver_24k_1000g_price."', product_attribute_values.float_value='".$get_silver_24k_1000g_price."'
                WHERE product_flat.price_auto_update_label='Silver Bar (999) - 1000 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Bar (999) - 1000 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Bar (999) - 5000 gram"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_24k_5000g_price."', product_flat.min_price='".$get_silver_24k_5000g_price."',
                product_flat.max_price='".$get_silver_24k_5000g_price."', product_attribute_values.float_value='".$get_silver_24k_5000g_price."'
                WHERE product_flat.price_auto_update_label='Silver Bar (999) - 5000 gram'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Bar (999) - 5000 gram updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

      //Silver Bar (999)
      else if($get_product_flat[$i]['price_auto_update_label'] == "Silver Wafer - Dirham (999) - 10 Dirham"){
        $sql = "UPDATE product_flat, product_attribute_values
                SET product_flat.price='".$get_silver_live_price_dirham_1g_price."', product_flat.min_price='".$get_silver_live_price_dirham_1g_price."',
                product_flat.max_price='".$get_silver_live_price_dirham_1g_price."', product_attribute_values.float_value='".$get_silver_live_price_dirham_1g_price."'
                WHERE product_flat.price_auto_update_label='Silver Wafer - Dirham (999) - 10 Dirham'
                AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

        if ($conn->query($sql) === TRUE) {
            echo "Price Silver Wafer - Dirham (999) - 10 Dirham updated successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }

  }

  // for ($i = 0; $i < count($get_product_flat); $i++){
  //   if($get_product_flat[$i]['gos_label'] == "Gold")
  //   {
  //     if($get_product_flat[$i]['type_label'] == "LBMA")
  //     {
  //       if($get_product_flat[$i]['weight_gram_label'] == "0.5")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_05g_price."', product_flat.min_price='".$get_gold_24k_05g_price."',
  //                 product_flat.max_price='".$get_gold_24k_05g_price."', product_attribute_values.float_value='".$get_gold_24k_05g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='0.5' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 0.5g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "1")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_1g_price."', product_flat.min_price='".$get_gold_24k_1g_price."',
  //                 product_flat.max_price='".$get_gold_24k_1g_price."', product_attribute_values.float_value='".$get_gold_24k_1g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='1' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 1g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "5")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_5g_price."', product_flat.min_price='".$get_gold_24k_5g_price."',
  //                 product_flat.max_price='".$get_gold_24k_5g_price."', product_attribute_values.float_value='".$get_gold_24k_5g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='5' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 5g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "10")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_10g_price."', product_flat.min_price='".$get_gold_24k_10g_price."',
  //                 product_flat.max_price='".$get_gold_24k_10g_price."', product_attribute_values.float_value='".$get_gold_24k_10g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='10' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 10g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "20")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_20g_price."', product_flat.min_price='".$get_gold_24k_20g_price."',
  //                 product_flat.max_price='".$get_gold_24k_20g_price."', product_attribute_values.float_value='".$get_gold_24k_20g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='20' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 20g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "50")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_50g_price."', product_flat.min_price='".$get_gold_24k_50g_price."',
  //                 product_flat.max_price='".$get_gold_24k_50g_price."', product_attribute_values.float_value='".$get_gold_24k_50g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='50' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 50g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "100")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_100g_price."', product_flat.min_price='".$get_gold_24k_100g_price."',
  //                 product_flat.max_price='".$get_gold_24k_100g_price."', product_attribute_values.float_value='".$get_gold_24k_100g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='100' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 100g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "250")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_250g_price."', product_flat.min_price='".$get_gold_24k_250g_price."',
  //                 product_flat.max_price='".$get_gold_24k_250g_price."', product_attribute_values.float_value='".$get_gold_24k_250g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='250' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 250g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "1000")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_gold_24k_1000g_price."', product_flat.min_price='".$get_gold_24k_1000g_price."',
  //                 product_flat.max_price='".$get_gold_24k_1000g_price."', product_attribute_values.float_value='".$get_gold_24k_1000g_price."'
  //                 WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='1000' AND product_flat.type_label='LBMA'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 1000g LBMA updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //     }
  //
  //     else if($get_product_flat[$i]['type_label'] == "Dinar (24k)")
  //     {
  //     }
  //
  //     else if($get_product_flat[$i]['type_label'] == "Dinar (22k)")
  //     {
  //     }
  //
  //   }
  //
  //   else if($get_product_flat[$i]['gos_label'] == "Silver")
  //   {
  //     if($get_product_flat[$i]['type_label'] == "Bar (999)")
  //     {
  //       if($get_product_flat[$i]['weight_gram_label'] == "100")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_silver_24k_100g_price."', product_flat.min_price='".$get_silver_24k_100g_price."',
  //                 product_flat.max_price='".$get_silver_24k_100g_price."', product_attribute_values.float_value='".$get_silver_24k_100g_price."'
  //                 WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='100' AND product_flat.type_label='Bar (999)'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 100g Silver Bar (999) updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "250")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_silver_24k_250g_price."', product_flat.min_price='".$get_silver_24k_250g_price."',
  //                 product_flat.max_price='".$get_silver_24k_250g_price."', product_attribute_values.float_value='".$get_silver_24k_250g_price."'
  //                 WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='250' AND product_flat.type_label='Bar (999)'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 250g Silver Bar (999) updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "500")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_silver_24k_500g_price."', product_flat.min_price='".$get_silver_24k_500g_price."',
  //                 product_flat.max_price='".$get_silver_24k_500g_price."', product_attribute_values.float_value='".$get_silver_24k_500g_price."'
  //                 WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='500' AND product_flat.type_label='Bar (999)'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 500g Silver Bar (999) updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "1000")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_silver_24k_1000g_price."', product_flat.min_price='".$get_silver_24k_1000g_price."',
  //                 product_flat.max_price='".$get_silver_24k_1000g_price."', product_attribute_values.float_value='".$get_silver_24k_1000g_price."'
  //                 WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='1000' AND product_flat.type_label='Bar (999)'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 1000g Silver Bar (999) updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //
  //       else if($get_product_flat[$i]['weight_gram_label'] == "5000")
  //       {
  //         $sql = "UPDATE product_flat, product_attribute_values
  //                 SET product_flat.price='".$get_silver_24k_5000g_price."', product_flat.min_price='".$get_silver_24k_5000g_price."',
  //                 product_flat.max_price='".$get_silver_24k_5000g_price."', product_attribute_values.float_value='".$get_silver_24k_5000g_price."'
  //                 WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='5000' AND product_flat.type_label='Bar (999)'
  //                 AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";
  //
  //         if ($conn->query($sql) === TRUE) {
  //             echo "Price 5000g Silver Bar (999) updated successfully <br>";
  //         } else {
  //             echo "Error updating record: " . $conn->error;
  //         }
  //       }
  //     }
  //
  //     else if($get_product_flat[$i]['type_label'] == "Dirham (999)")
  //     {
  //
  //     }
  //
  //   }
  // }
  $conn->close();
  $conn2->close();

?>
