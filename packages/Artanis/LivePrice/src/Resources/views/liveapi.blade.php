<?php
    $db = mysqli_connect("localhost","root","P@ssw0rd123","live_price_api");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
    $getGAP = "SELECT * FROM gold_live_price_gap";
    $getGold24k = "SELECT * FROM gold_live_price_24k";

    $getSAP = "SELECT * FROM silver_live_price_sap";
    $getSilver24k = "SELECT * FROM silver_live_price_24k";

    $queryGAP= mysqli_query($db,$getGAP)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($queryGAP))
    {
        $dataGAP[]=$row;
    } #end of while

    $querySAP= mysqli_query($db,$getSAP)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($querySAP))
    {
        $dataSAP[]=$row;
    } #end of while

 ?>
<style media="screen">
 element.style {
}
.ttr_block_content, .ttr_block_content p {
  padding: 0px;
  margin: 0px;
}
.ttr_block_content, .ttr_block_content p {
  padding-top: 2px;
  padding-left: 2px;
  padding-right: 2px;
  padding-bottom: 2px;
  margin-top: 3px;
  margin-left: 3px;
  margin-right: 3px;
  margin-bottom: 3px;
  background-color: transparent;
  background: rgba(255,255,255,0);
  background-clip: padding-box;
  border-radius: 0px 0px 0px 0px;
  border: solid #D3D3D3;
  border: solid rgba(211,211,211,1);
  border-width: 0px 0px 0px 0px;
  box-shadow: none;
  font-size: 12px;
  font-family: "Trebuchet MS";
  font-weight: 400;
  font-style: normal;
  color: #333333;
  text-shadow: none;
  text-align: left;
  text-decoration: none;
}
* {
  margin: 0;
  padding: 0;
}
* {
  margin: 0;
  padding: 0;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
user agent stylesheet
div {
  display: block;
}
#ttr_content {
  font-size: 14px;
  font-family: "Trebuchet MS";
  font-weight: 400;
  font-style: normal;
  color: #333333;
  text-shadow: none;
  text-align: left;
  text-decoration: none;
}
body {
  font-family: Arial;
  font-size: 14px;
  line-height: 1.42;
  color: #333333;
  background-color: white;
}
html {
  font-size: 10px;
  -webkit-tap-highlight-color: transparent;
}
html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
user agent stylesheet
html {
  color: -internal-root-color;
}
*:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
</style>
<body>
      @foreach($dataGAP as $key => $value)
        <tr>
          <th>{{$value["last_updated"]}}</th>
          <th>{{$value["gram"]}}</th>
          <th>{{$value["price"]}}</th>
        </tr>
    @endforeach

    @foreach($dataSAP as $key => $value)
      <tr>
        <th>{{$value["last_updated"]}}</th>
        <th>{{$value["gram"]}}</th>
        <th>{{$value["price"]}}</th>
      </tr>
  @endforeach
</body>
