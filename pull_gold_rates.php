<?php
//URL : http://goldpricez.com/about/api
//Version: 1.1
//		It was not released publically


//Version: 2.0, date:15/12/2018, initial release


//Version: 2.1, date:16/12/2018
//		The current version
//BUG fixing:
//	time of currency updation are added



/*
EULA:
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


//This code requires the PHP CURL Extension/library, which is installed (by default) on most servers.



/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////You can comment this block of code/////////////////////////////////
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Kuala_Lumpur");
////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////





//Database information
$servername = "localhost"; // IP
$username = "root";  //please provide   login username of the database
$password = "P@ssw0rd123";  //plear provide   password of the database
$dbname = "goldApiTest"; //Please provide   name of the database





//Currency code in which you want to see the gold rates. For example, USD, EUR, AUD, INR, PKR, QAR, AED, SAR, KWD etc (support almost all currencies of the world)
$currency_code="MYR"; //You can change it to the currency of your chouce



//Unit type. For example, gram, kg, ounce, grain, baht, tola-india, tola-pakistan, masha, tael-japan etc.
$unit_type="gram"; //You can change the unit type of your chouce, for detail visit page: "gold price api"

$currency_code = strtolower($currency_code);
$unit_type = strtolower($unit_type);




$URL="http://goldpricez.com/api/rates/currency/".$currency_code."/measure/".$unit_type;
$apiKey="552c94b6bfc4aeafdfa2a7d071ba96b1552c94b6";  // Pleaser insert the API key, if you don't have then visit URL:  http://goldpricez.com/about/api

$URL=strtolower($URL);


///////////////////////////////////////////////////////////
/////////////////////////////////////////
//In future, we will add some source code at this place,
//PURPOSE: This file (e.g., CRON JOB) should be accessed from your own server. For example, from your own IP address

//You can also write that code by yourself
////////////////////////////////////////
///////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////
/////////////////////////////////////////
//In future, we will add some source code at this place,
//PURPOSE: To avoid more than 60 requests per hour, that is mandatory requirement

//You can also write that code by yourself
////////////////////////////////////////
///////////////////////////////////////////////////////////




//Call CURL and pass URL and API KEY
function httpGet($url,$apiKey)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
   //curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-API-KEY: ' . $apiKey
    ));
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Call API via CURL
$result=httpGet($URL,$apiKey);
//Note: You can use any other library for retrieving gold rates from our website


/*
Example, API URL: http://goldpricez.com/api/rates/currency/cad/measure/gram
This will return the following like output. Detail of each field can be found at the home page of API(mentioned above)

$result=
"{\"ounce_price_usd\":\"1238.44\",\"gmt_ounce_price_usd_updated\":\"16-12-2018 06:42:02 am\",
  \"ounce_price_ask\":\"1238.44\",\"ounce_price_bid\":\"1238.08\",
  \"ounce_price_usd_today_low\":\"1232.83\",\"ounce_price_usd_today_high\":\"1243.29\

",\"usd_to_cad\":\"1.33835\",\"gmt_cad_updated\":\"16-12-2018 02:05:00 am\",
\"ounce_in_cad\":1657.466174,

\"gram_to_ounce_formula\":0.0321,

\"gram_in_usd\":39.753924,\"gram_in_cad\":53.2046641854}"
*/

$array1 = json_decode($result, true);
$result = json_decode($array1, true);



$current_gold_price=$result[$unit_type.'_in_'.$currency_code];  //Price in the currency of your choice (e.g., CAD)
						 //['gram_in_cad']

$gmt_datetime_gold_updated=$result['gmt_ounce_price_'.$currency_code.'_updated'];    //GMT time of gold price updation online (e.g., when the rates are updated)
						        //['gmt_ounce_price_usd_updated'];


$currency_rate =1;
$gmt_datetime_currency_updated =$gmt_datetime_gold_updated;
if($currency_code!='usd')
{
	$currency_rate =$result['usd_to_'.$currency_code]; //Currrency conversion. 1 usd to currency of your choice (e.g., 1 USD = ... CAD)
					     //['usd_to_cad']

	$gmt_datetime_currency_updated=$result['gmt_'.$currency_code.'_updated'];    //GMT time of gold price updation online (e.g., when the rates are updated)
										//['gmt_pkr_updated'];
}
$result_array=serialize($result);





// Create connection in MYSQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//1. You must create database table with name: gold_rate, you can use the following SQL Code

/*
CREATE TABLE `goldrate` (
  `currency_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gold_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `24karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `22karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `21karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `18karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `16karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `14karat_rate` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmt_datetime_gold_updated` datetime NOT NULL

  `currency_rate` varchar(50) COLLATE utf8mb4_unicode_ci  NULL,
  `gmt_datetime_currency_updated` datetime  NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



//2. You must insert a dummy reocord, that should contain the above currency_code (e.g., CAD or any other) and unit_type (e.g., gram or any other type)
--add dummy record
INSERT INTO `goldrate` ( `currency_code`, `unit_type`,  `gold_rate`, `24karat_rate`, `22karat_rate`, `21karat_rate`, `18karat_rate`,`16karat_rate`,`14karat_rate`, `gmt_datetime_gold_updated`, `currency_rate`,`gmt_datetime_currency_updated`) VALUES
( 'CAD','gram', '11.9747593944', '11.9747593944', '10.96887960527', '10.4779144701', '8.9810695458', '7.9810695458', '6.9810695458', '07-11-2018 02:05:00 pm', '11.9747593944', '07-11-2018 02:05:00 pm');
*/


// $gmt_datetime_gold_updated_corrected = date("Y/m/d H:i:s", strtotime($gmt_datetime_gold_updated));
// $gmt_datetime_currency_updated_corrected = date("Y/m/d H:i:s", strtotime($gmt_datetime_currency_updated));

$sql = "UPDATE goldrate 	SET  gold_rate='".$current_gold_price."',
                                 gmt_datetime_gold_updated = STR_TO_DATE('".$gmt_datetime_gold_updated."','%d-%m-%Y %h:%i:%s %p'),
                                 currency_rate ='".$currency_rate."',
								                 gmt_datetime_currency_updated= STR_TO_DATE('".$gmt_datetime_currency_updated."','%d-%m-%Y %h:%i:%s %p'),
                                 24karat_rate ='".$currency_rate."',
                                 22karat_rate ='". ($currency_rate*0.916) ."',
                                 21karat_rate ='". ($currency_rate*0.875 )."',
                                 18karat_rate ='". ($currency_rate*0.750) ."',
                								 16karat_rate ='". ($currency_rate*0.666) ."',
                								 14karat_rate ='". ($currency_rate*0.5833)."'
                								 WHERE lower(currency_code) like '".strtolower($currency_code)."'
                								 and lower(unit_type) like '".strtolower($unit_type)."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully to goldrate table <br>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
//END


//Note: The source code of this file has not tested. It may contain errors.



//After testing,
//	Execute this file with two minutes interval. For example, in PHP control panel, you can create a cron job with 2 minutes interval.
//	For cron job, you can use the following command
//	wget -q -O - your_website/pull_gold_rates.php >/dev/null 2>&1
//	Your hosting provider can also help you to create the cron job.



//Your contribution are welcomed
//	You can modify and enhance this file. We will love to receive updated version from you.
//	Email: goldpricekg@gmail.com/about/api



?>
