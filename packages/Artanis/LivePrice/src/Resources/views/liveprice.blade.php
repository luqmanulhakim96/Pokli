<?php
    $db = mysqli_connect("localhost","root","P@ssw0rd123","live_price_api");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

    $getLast = "SELECT DATE_FORMAT(`last_updated`, '%d-%M-%Y %H:%i:%S') as dateLast FROM `gold_live_price_gap` GROUP BY `last_updated`";

    $getGAP = "SELECT * FROM gold_live_price_gap";
    $getGold24k = "SELECT * FROM gold_live_price_24k";

    $getSAP = "SELECT * FROM silver_live_price_sap";
    $getSilver24k = "SELECT * FROM silver_live_price_24k";

    $queryLast= mysqli_query($db,$getLast)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($queryLast))
    {
        $dataLast[]=$row;
    } #end of while


    $queryGAP= mysqli_query($db,$getGAP)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($queryGAP))
    {
        $dataGAP[]=$row;
    } #end of while

    $queryGold24k= mysqli_query($db,$getGold24k)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($queryGold24k))
    {
        $dataGold24k[]=$row;
    } #end of while

    $querySAP= mysqli_query($db,$getSAP)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($querySAP))
    {
        $dataSAP[]=$row;
    } #end of while

    $querySilver24k= mysqli_query($db,$getSilver24k)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($querySilver24k))
    {
        $dataSilver24k[]=$row;
    } #end of while

 ?>

<section class="featured-products">
    <div class="featured-heading">
        Live Price<br/>
        <span class="featured-seperator" style="color:lightgrey;">_____</span>
    </div>

          <div class="col-xs-12">
            <b>Pokli Gold Price (24 Hours Live)<br><font size="2">@foreach ($dataLast as $key => $value)(Last updated {{$value["dateLast"]}}) @endforeach</font></b>
          </div>
          		<div class="featured-grid product-grid-4">
          			<div class="col-md-12 col-xs-12">
          			<div class="col-md-3 col-sm-6 col-xs-12" style="display: block;height: 533px;">
                  <div>
            				<div>
            					<a href="{{ route('gapsap.index') }}" target="_BLANK"><img src="https://www.publicgold.com.my/images/liveprice/BuyGAP.png" alt="Gold Program" width="230px" height="99.7px" style="position: relative; top:-4px;"></a>
            				</div>
            					<table>
                        <!-- put gold information here -->
                        <div>
                					<img src="https://www.publicgold.com.my/images/liveprice/gap.png" alt="Gold Bar/Wafer 24K" width="248px" height="15px">
                          @foreach($dataGAP as $key => $value)
                                <tr>
                                  <th>MYR {{$value["price"]}}</th>
                                  <th> = </th>
                                  <th>{{$value["gram"]}} gram</th>
                                </tr>
                          @endforeach
                          </div>
                    </table>
                    <table>
                      <div>
                        <img src="https://www.publicgold.com.my/images/liveprice/LBMA%20Gold%20Bar%2024K.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                        <th class="grid_head" >WEIGHT</th>
                        <th class="grid_head" >SELL</th>
                        <th class="grid_head" >BUY</th>
                        <tbody>
                            @foreach($dataGold24k as $key => $value)
                                <tr>
                                  <td>{{$value["gram"]}} gram</td>
                                  <td>{{$value["sell"]}}</td>
                                  <td>{{$value["buy"]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                    </table>
                    <table>
                      <div>
                        <img src="https://www.publicgold.com.my/images/liveprice/sap.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                      @foreach($dataSAP as $key => $value)
                          <tr>
                            <th>MYR {{$value["price"]}}</th>
                            <th> = </th>
                            <th>{{$value["gram"]}} gram</th>
                          </tr>
                      @endforeach
                    </div>
                    </table>
                    <table>
                      <div>
                        <img src="https://www.publicgold.com.my/images/liveprice/LBMA%20SILVER%20BAR.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                        <th class="grid_head" >WEIGHT</th>
                        <th class="grid_head" >SELL</th>
                        <th class="grid_head" >BUY</th>
                        <tbody>
                          @foreach($dataSilver24k as $key => $value)
                            <tr>
                              <td>{{$value["gram"]}} gram</td>
                              <td>{{$value["sell"]}}</td>
                              <td>{{$value["buy"]}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </div>
                    </table>
                       <a href="{{ route('gapsap.index') }}"><img style="display:block; width:230px; margin: 10px;" src=""></a>
    			        </div>
          			<div>
                      <span style="font-style:italic;line-height:1; "><br><br>
          			* All LBMA products are SST exempted. <br>* All prices are quoted in Malaysia Ringgit (MYR) and excluding Gold Premium
          			</span>
          			</div>
          		</div>
            </div>
          </div>
</section>
