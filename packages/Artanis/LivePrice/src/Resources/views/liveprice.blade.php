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

<section class="featured-products">

    <div class="featured-heading">
        Live Price<br/>
        <span class="featured-seperator" style="color:lightgrey;">_____</span>
    </div>

    <div class="product-grid-4">
          <div class="title-table2 col-xs-12" id="red-table2">
            <b>Pokli Gold Price (24 Hours Live)<br><font size="2">(Last updated 05-Dec-2019 11:36:01)</font></b>
          </div>
          <b>
          		<div class="all-live-price-div2 col-lg-12" id="orange-table2">
          			<div class="col-md-12 col-xs-12">
          			<div id="section-1" class="col-md-3 col-sm-6 col-xs-12" style="display: block;height: 533px;">
                  <div class="live-price-div2" id="gap-div-table2">
            				<div class="gold-live-price-title-table2" id="gap-div-title2">
            					<a href="{{ route('gapsap.index') }}" target="_BLANK"><img src="https://www.publicgold.com.my/images/liveprice/BuyGAP.png" alt="Gold Program" width="50%" height="70%" style="position: relative; top:-4px;"></a>
            				</div>
            					<table class="gold-live-price-table2" id="gap-table-content2">
                        <!-- put gold information here -->

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
    </div>

</section>
