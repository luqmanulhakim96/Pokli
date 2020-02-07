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

  //gold
  $sql_get_gold_24k_05g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='0.5'";
  $query_get_gold_24k_05g = mysqli_query($conn2, $sql_get_gold_24k_05g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_05g))
  {
    $get_gold_24k_05g_gram = $row['gram'];
    $get_gold_24k_05g_price = $row['sell'];
  }

  $sql_get_gold_24k_1g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='1'";
  $query_get_gold_24k_1g = mysqli_query($conn2, $sql_get_gold_24k_1g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_1g))
  {
    $get_gold_24k_1g_gram = $row['gram'];
    $get_gold_24k_1g_price = $row['sell'];
  }

  $sql_get_gold_24k_5g = "SELECT gram, sell FROM gold_live_price_small_24k WHERE gram='5'";
  $query_get_gold_24k_5g = mysqli_query($conn2, $sql_get_gold_24k_5g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_5g))
  {
    $get_gold_24k_5g_gram = $row['gram'];
    $get_gold_24k_5g_price = $row['sell'];
  }

  $sql_get_gold_24k_10g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='10'";
  $query_get_gold_24k_10g = mysqli_query($conn2, $sql_get_gold_24k_10g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_10g))
  {
    $get_gold_24k_10g_gram = $row['gram'];
    $get_gold_24k_10g_price = $row['sell'];
  }

  $sql_get_gold_24k_20g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='20'";
  $query_get_gold_24k_20g = mysqli_query($conn2, $sql_get_gold_24k_20g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_20g))
  {
    $get_gold_24k_20g_gram = $row['gram'];
    $get_gold_24k_20g_price = $row['sell'];
  }

  $sql_get_gold_24k_50g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='50'";
  $query_get_gold_24k_50g = mysqli_query($conn2, $sql_get_gold_24k_50g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_50g))
  {
    $get_gold_24k_50g_gram = $row['gram'];
    $get_gold_24k_50g_price = $row['sell'];
  }

  $sql_get_gold_24k_100g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='100'";
  $query_get_gold_24k_100g = mysqli_query($conn2, $sql_get_gold_24k_100g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_100g))
  {
    $get_gold_24k_100g_gram = $row['gram'];
    $get_gold_24k_100g_price = $row['sell'];
  }

  $sql_get_gold_24k_250g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='250'";
  $query_get_gold_24k_250g = mysqli_query($conn2, $sql_get_gold_24k_250g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_250g))
  {
    $get_gold_24k_250g_gram = $row['gram'];
    $get_gold_24k_250g_price = $row['sell'];
  }

  $sql_get_gold_24k_1000g = "SELECT gram, sell FROM gold_live_price_24k WHERE gram='1000'";
  $query_get_gold_24k_1000g = mysqli_query($conn2, $sql_get_gold_24k_1000g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_gold_24k_1000g))
  {
    $get_gold_24k_1000g_gram = $row['gram'];
    $get_gold_24k_1000g_price = $row['sell'];
  }

  //silver
  $sql_get_silver_24k_100g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='100'";
  $query_get_silver_24k_100g = mysqli_query($conn2, $sql_get_silver_24k_100g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k_100g))
  {
    $get_silver_24k_100g_gram = $row['gram'];
    $get_silver_24k_100g_price = $row['sell'];
  }

  $sql_get_silver_24k_250g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='250'";
  $query_get_silver_24k_250g = mysqli_query($conn2, $sql_get_silver_24k_250g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k_250g))
  {
    $get_silver_24k_250g_gram = $row['gram'];
    $get_silver_24k_250g_price = $row['sell'];
  }

  $sql_get_silver_24k_500g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='500'";
  $query_get_silver_24k_500g = mysqli_query($conn2, $sql_get_silver_24k_500g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k_500g))
  {
    $get_silver_24k_500g_gram = $row['gram'];
    $get_silver_24k_500g_price = $row['sell'];
  }

  $sql_get_silver_24k_1000g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='1000'";
  $query_get_silver_24k_1000g = mysqli_query($conn2, $sql_get_silver_24k_1000g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k_1000g))
  {
    $get_silver_24k_1000g_gram = $row['gram'];
    $get_silver_24k_1000g_price = $row['sell'];
  }

  $sql_get_silver_24k_5000g = "SELECT gram, sell FROM silver_live_price_24k WHERE gram='5000'";
  $query_get_silver_24k_5000g = mysqli_query($conn2, $sql_get_silver_24k_5000g) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_silver_24k_5000g))
  {
    $get_silver_24k_5000g_gram = $row['gram'];
    $get_silver_24k_5000g_price = $row['sell'];
  }


  $sql_get_product_flat = "SELECT id,gos_label, weight_gram_label, type_label FROM product_flat";
  $query_get_product_flat = mysqli_query($conn, $sql_get_product_flat) or Die("Sorry, dead query");

  while($row = mysqli_fetch_array($query_get_product_flat))
  {
    $get_product_flat [] = $row;
  }
  for ($i = 0; $i < count($get_product_flat); $i++){
    if($get_product_flat[$i]['gos_label'] == "Gold")
    {
      if($get_product_flat[$i]['type_label'] == "LBMA")
      {
        if($get_product_flat[$i]['weight_gram_label'] == "0.5")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_05g_price."', product_flat.min_price='".$get_gold_24k_05g_price."',
                  product_flat.max_price='".$get_gold_24k_05g_price."', product_attribute_values.float_value='".$get_gold_24k_05g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='0.5' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 0.5g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "1")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_1g_price."', product_flat.min_price='".$get_gold_24k_1g_price."',
                  product_flat.max_price='".$get_gold_24k_1g_price."', product_attribute_values.float_value='".$get_gold_24k_1g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='1' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 1g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "5")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_5g_price."', product_flat.min_price='".$get_gold_24k_5g_price."',
                  product_flat.max_price='".$get_gold_24k_5g_price."', product_attribute_values.float_value='".$get_gold_24k_5g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='5' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 5g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "10")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_10g_price."', product_flat.min_price='".$get_gold_24k_10g_price."',
                  product_flat.max_price='".$get_gold_24k_10g_price."', product_attribute_values.float_value='".$get_gold_24k_10g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='10' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 10g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "20")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_20g_price."', product_flat.min_price='".$get_gold_24k_20g_price."',
                  product_flat.max_price='".$get_gold_24k_20g_price."', product_attribute_values.float_value='".$get_gold_24k_20g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='20' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 20g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "50")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_50g_price."', product_flat.min_price='".$get_gold_24k_50g_price."',
                  product_flat.max_price='".$get_gold_24k_50g_price."', product_attribute_values.float_value='".$get_gold_24k_50g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='50' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 50g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "100")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_100g_price."', product_flat.min_price='".$get_gold_24k_100g_price."',
                  product_flat.max_price='".$get_gold_24k_100g_price."', product_attribute_values.float_value='".$get_gold_24k_100g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='100' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 100g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "250")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_250g_price."', product_flat.min_price='".$get_gold_24k_250g_price."',
                  product_flat.max_price='".$get_gold_24k_250g_price."', product_attribute_values.float_value='".$get_gold_24k_250g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='250' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 250g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "1000")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_gold_24k_1000g_price."', product_flat.min_price='".$get_gold_24k_1000g_price."',
                  product_flat.max_price='".$get_gold_24k_1000g_price."', product_attribute_values.float_value='".$get_gold_24k_1000g_price."'
                  WHERE product_flat.gos_label='gold' AND product_flat.weight_gram_label='1000' AND product_flat.type_label='LBMA'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 1000g LBMA updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }
      }

      else if($get_product_flat[$i]['type_label'] == "Dinar (24k)")
      {
      }

      else if($get_product_flat[$i]['type_label'] == "Dinar (22k)")
      {
      }

    }

    else if($get_product_flat[$i]['gos_label'] == "Silver")
    {
      if($get_product_flat[$i]['type_label'] == "Bar (999)")
      {
        if($get_product_flat[$i]['weight_gram_label'] == "100")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_silver_24k_100g_price."', product_flat.min_price='".$get_silver_24k_100g_price."',
                  product_flat.max_price='".$get_silver_24k_100g_price."', product_attribute_values.float_value='".$get_silver_24k_100g_price."'
                  WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='100' AND product_flat.type_label='Bar (999)'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 100g Silver Bar (999) updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "250")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_silver_24k_250g_price."', product_flat.min_price='".$get_silver_24k_250g_price."',
                  product_flat.max_price='".$get_silver_24k_250g_price."', product_attribute_values.float_value='".$get_silver_24k_250g_price."'
                  WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='250' AND product_flat.type_label='Bar (999)'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 250g Silver Bar (999) updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "500")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_silver_24k_500g_price."', product_flat.min_price='".$get_silver_24k_500g_price."',
                  product_flat.max_price='".$get_silver_24k_500g_price."', product_attribute_values.float_value='".$get_silver_24k_500g_price."'
                  WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='500' AND product_flat.type_label='Bar (999)'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 500g Silver Bar (999) updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "1000")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_silver_24k_1000g_price."', product_flat.min_price='".$get_silver_24k_1000g_price."',
                  product_flat.max_price='".$get_silver_24k_1000g_price."', product_attribute_values.float_value='".$get_silver_24k_1000g_price."'
                  WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='1000' AND product_flat.type_label='Bar (999)'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 1000g Silver Bar (999) updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }

        else if($get_product_flat[$i]['weight_gram_label'] == "5000")
        {
          $sql = "UPDATE product_flat, product_attribute_values
                  SET product_flat.price='".$get_silver_24k_5000g_price."', product_flat.min_price='".$get_silver_24k_5000g_price."',
                  product_flat.max_price='".$get_silver_24k_5000g_price."', product_attribute_values.float_value='".$get_silver_24k_5000g_price."'
                  WHERE product_flat.gos_label='silver' AND product_flat.weight_gram_label='5000' AND product_flat.type_label='Bar (999)'
                  AND product_flat.id = product_attribute_values.product_id AND product_attribute_values.attribute_id = '11'";

          if ($conn->query($sql) === TRUE) {
              echo "Price 5000g Silver Bar (999) updated successfully <br>";
          } else {
              echo "Error updating record: " . $conn->error;
          }
        }
      }

      else if($get_product_flat[$i]['type_label'] == "Dirham (999)")
      {

      }

    }
  }
  $conn->close();
  $conn2->close();

?>
