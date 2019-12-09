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
