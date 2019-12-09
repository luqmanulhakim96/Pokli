<?php
    $db = mysqli_connect("localhost","root","P@ssw0rd123","live_price_api");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
    $getGAP = "SELECT * FROM gold_live_price_gap";

    $queryGAP= mysqli_query($db,$getGAP)or Die("Sorry, dead query.44");
    while($row = mysqli_fetch_array($queryGAP))
    {
        $data[]=$row;
    } #end of while

 ?>
<body>
      @foreach($data as $key => $value)
        <tr>
          <th>{{$value["last_updated"]}}</th>
          <th>{{$value["gram"]}}</th>
          <th>{{$value["price"]}}</th>            
        </tr>
    @endforeach
</body>
