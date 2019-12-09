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

    $querySAP= mysqli_query($db,$getSAP)or Die("Sorry, dead query");
    while($row = mysqli_fetch_array($querySAP))
    {
        $dataSAP[]=$row;
    } #end of while

 ?>

<section class="featured-products">

    <div class="featured-heading">
        Live Price<br/>
        <span class="featured-seperator" style="color:lightgrey;">_____</span>
    </div>

          <div class="title-table2 col-xs-12" id="red-table2">
            <b>Pokli Gold Price (24 Hours Live)<br><font size="2">@foreach ($dataLast as $key => $value)(Last updated {{$value["dateLast"]}}) @endforeach</font></b>
          </div>
          <b>
          		<div class="all-live-price-div2 col-lg-12" id="orange-table2">
          			<div class="col-md-12 col-xs-12">
          			<div id="section-1" class="col-md-3 col-sm-6 col-xs-12" style="display: block;height: 533px;">
                  <div class="live-price-div2" id="gap-div-table2">
            				<div class="gold-live-price-title-table2" id="gap-div-title2">
            					<a href="{{ route('gapsap.index') }}" target="_BLANK"><img src="https://www.publicgold.com.my/images/liveprice/BuyGAP.png" alt="Gold Program" width="230px" height="99.7px" style="position: relative; top:-4px;"></a>
            				</div>
            					<table class="gold-live-price-table2" id="gap-table-content2">
                        <!-- put gold information here -->
                        <div class="gold-live-price-title-table2" id="goldbar-div-title2">
                        					<img src="https://www.publicgold.com.my/images/liveprice/LBMA%20Gold%20Bar%2024K.png" alt="Gold Bar/Wafer 24K" width="100%" height="15px">
                				</div>
                          @foreach($dataGAP as $key => $value)
                                <tr>
                                  <th>{{$value["gram"]}}</th>
                                  <th>{{$value["price"]}}</th>
                                </tr>
                          @endforeach

                          <div class="silver-live-price-title-table2" id="silverbar-div-title2">
                          					<img src="https://www.publicgold.com.my/images/liveprice/LBMA%20SILVER%20BAR.png" alt="Silver Bar 999" width="100%" height="15px" style="top:-4px;position:relative;">
                  				</div>
                          @foreach($dataSAP as $key => $value)
                              <tr>
                                <th>{{$value["gram"]}}</th>
                                <th>{{$value["price"]}}</th>
                              </tr>
                          @endforeach

                    </table>
                       <a href="{{ route('gapsap.index') }}"><img style="display:block; width:230px; margin: 10px;" src=""></a>
    			        </div>
          			<div class="live-price-bottom-label2" id="live-price-bottom-label2">
                      <span style="font-style:italic;line-height:1; "><br><br>
          			* All LBMA products are SST exempted. <br>* All prices are quoted in Malaysia Ringgit (MYR) and excluding Gold Premium
          			</span>
          			</div>
          		</div>
            </div>
          </div>
          </b>

</section>
