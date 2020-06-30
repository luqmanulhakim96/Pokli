<?php
    $db = mysqli_connect(env('DB_HOST_SECOND'),env('DB_USERNAME_SECOND'),env('DB_PASSWORD_SECOND'),env('DB_DATABASE_SECOND'));
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

          $getLast = "SELECT DATE_FORMAT(`last_updated`, '%d-%M-%Y %H:%i:%S') as dateLast FROM `gold_live_price_gap` GROUP BY `last_updated` ORDER BY last_updated DESC";

          $getGAP = "SELECT * FROM gold_live_price_gap";
          $getGold24kBuys = "SELECT * FROM gold_live_price_24k WHERE buy IS NOT NULL ORDER BY gram ASC";
          $getGold24k = "SELECT * FROM gold_live_price_24k ORDER BY gram ASC";
          $getGoldFlexibar = "SELECT * FROM gold_live_price_flexibar_24k ORDER BY gram ASC";
          $getGoldWafer22k = "SELECT * FROM gold_live_price_gold_wafer_22k ORDER BY gram ASC";
          $getGoldWafer24k = "SELECT * FROM gold_live_price_gold_wafer_24k ORDER BY gram ASC";
          $getGoldJewellary = "SELECT * FROM gold_live_price_jewellary_22k ORDER BY gram ASC";
          $getGoldSmall = "SELECT * FROM gold_live_price_small_24k ORDER BY gram ASC";
          $getGoldTaifook = "SELECT * FROM gold_live_price_taifook_24k ORDER BY gram ASC";

          $queryLast= mysqli_query($db,$getLast)or Die("Sorry, dead query 1");
          while($row = mysqli_fetch_array($queryLast))
          {
              $dataLast[]=$row;
          } #end of while


          $queryGAP= mysqli_query($db,$getGAP)or Die("Sorry, dead query 2");
          while($row = mysqli_fetch_array($queryGAP))
          {
              $dataGAP[]=$row;
          } #end of while

          $queryGold24k= mysqli_query($db,$getGold24k)or Die("Sorry, dead query 3");
          while($row = mysqli_fetch_array($queryGold24k))
          {
              $dataGold24k[]=$row;
          } #end of while

          $queryGold24kBuy= mysqli_query($db,$getGold24kBuys)or Die("Sorry, dead query 4");
          while($row = mysqli_fetch_array($queryGold24kBuy))
          {
              $dataGold24kBuy[]=$row;
          } #end of while

          $queryGold24kFlexibar= mysqli_query($db,$getGoldFlexibar)or Die("Sorry, dead query 5");
          while($row = mysqli_fetch_array($queryGold24kFlexibar))
          {
              $dataGold24kFlexibar[]=$row;
          } #end of while

          $queryGoldWafer22k= mysqli_query($db,$getGoldWafer22k)or Die("Sorry, dead query 6");
          while($row = mysqli_fetch_array($queryGoldWafer22k))
          {
              $dataGoldWafer22k[]=$row;
          } #end of while

          $queryGoldWafer24k= mysqli_query($db,$getGoldWafer24k)or Die("Sorry, dead query 6.5");
          while($row = mysqli_fetch_array($queryGoldWafer24k))
          {
              $dataGoldWafer24k[]=$row;
          } #end of while

          $queryGold24kJewellary= mysqli_query($db,$getGoldJewellary)or Die("Sorry, dead query 7");
          while($row = mysqli_fetch_array($queryGold24kJewellary))
          {
              $dataGold24kJewellary[]=$row;
          } #end of while

          $queryGold24kTaifook= mysqli_query($db,$getGoldTaifook)or Die("Sorry, dead query 8");
          while($row = mysqli_fetch_array($queryGold24kTaifook))
          {
              $dataGold24kTaifook[]=$row;
          } #end of while

          $queryGold24kSmall= mysqli_query($db,$getGoldSmall)or Die("Sorry, dead query 9");
          while($row = mysqli_fetch_array($queryGold24kSmall))
          {
              $dataGold24kSmall[]=$row;
          } #end of while


          $getSAP = "SELECT * FROM silver_live_price_sap";
          $getSilver24k = "SELECT * FROM silver_live_price_24k ORDER BY gram ASC";
          $getSilverDirham = "SELECT * FROM silver_live_price_dirham ORDER BY gram ASC";

          $querySAP= mysqli_query($db,$getSAP)or Die("Sorry, dead query 10");
          while($row = mysqli_fetch_array($querySAP))
          {
              $dataSAP[]=$row;
          } #end of while

          $querySilver24k= mysqli_query($db,$getSilver24k)or Die("Sorry, dead query 11");
          while($row = mysqli_fetch_array($querySilver24k))
          {
              $dataSilver24k[]=$row;
          } #end of while

          $querySilverDirham= mysqli_query($db,$getSilverDirham)or Die("Sorry, dead query 12");
          while($row = mysqli_fetch_array($querySilverDirham))
          {
              $dataSilverDirham[]=$row;
          } #end of while

      ?>
      <section class="featured-products">
           <div class="featured-heading">
              <b>Pokli Gold Price <br> (24 Hours Live)<br><font size="2">@foreach ($dataLast as $key => $value)(Last updated {{$value["dateLast"]}}) @break  @endforeach</font></b>
           </div>
           <div class="col-xs-12">
           </div>
           <div class="featured-grid product-grid-price">
            <div class="block1" style="width:100%">
              <!-- <div class="gold">
                 <div class="container">
                     <div class="col">
                         <div class="col-md-4 col-sm-6">
                             <div class="pricingTable">
                                 <div class="pricingTable-header">
                                     <h3 class="title" style="color:white;">MY Uncang Emas</h3>
                                 </div>
                                 <div class="pricing-content">
                                     <div class="price-value">
                                     </div>
                                     <ul class="inner-content">
                                     </ul>
                                     <div class="pricingTable-signup">
                                       <table style="width: 100%;">
                                         @foreach($dataGAP as $key => $value)
                                         <tr>
                                           <td><a href="#">RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</a></td>
                                         </tr>
                                          @endforeach
                                       </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div> -->
             <!-- <div class="gold">
                <div class="container">
                    <div class="col">
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">LBMA Gold Bar (24k)</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                    <div class="pricingTable-signup">
                                      <table style="width: 100%;">
                                        <th><a href="#">Weight</th>
                                        <th><a href="#">Sell</th>
                                        <th><a href="#">Buy</th>
                                        @foreach($dataGold24k as $key => $value)
                                        <tr>
                                          <td><a href="#"><span>{{$value["gram"]}} gram</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                        </tr>
                                         @endforeach
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
              <!-- <div class="gold">
                 <div class="container">
                     <div class="col">
                       <div class="col-md-4 col-sm-6">
                           <div class="pricingTable">
                               <div class="pricingTable-header">
                                   <h3 class="title" style="color:white;">LBMA Gold Wafer - Dinar (24k)</h3>
                               </div>
                               <div class="pricing-content">
                                   <div class="price-value">
                                   </div>
                                   <ul class="inner-content">
                                   </ul>
                                   <div class="pricingTable-signup">
                                     <table style="width: 100%;">
                                       <th><a href="#">Weight</th>
                                       <th><a href="#">Sell</th>
                                       <th><a href="#">Buy</th>
                                       @foreach($dataGoldWafer24k as $key => $value)
                                       <tr>
                                         <td><a href="#"><span>{{$value["gram"]}} Dinar</span></a></td>
                                         <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                         <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                       </tr>
                                        @endforeach
                                     </table>
                                   </div>
                               </div>
                           </div>
                       </div>
                     </div>
                 </div>
             </div> -->
             <!-- <div class="gold">
                <div class="container">
                    <div class="col">
                      <div class="col-md-4 col-sm-6">
                          <div class="pricingTable">
                              <div class="pricingTable-header">
                                  <h3 class="title" style="color:white;">Flexibar (24k)</h3>
                              </div>
                              <div class="pricing-content">
                                  <div class="price-value">
                                  </div>
                                  <ul class="inner-content">

                                  </ul>
                                  <div class="pricingTable-signup">
                                    <table style="width: 100%;">
                                      <th><a href="#">Weight</th>
                                      <th><a href="#">Sell</th>
                                      <th><a href="#">Buy</th>
                                      @foreach($dataGold24kFlexibar as $key => $value)
                                      <tr>
                                        <td><a href="#"><span>{{$value["gram"]}} gram</span></a></td>
                                        <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                        <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                      </tr>
                                       @endforeach
                                    </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div> -->
          </div>
          <!-- 23/6/2020 -->
           <div class="block2" style="width:100%">
             <div class="gold">
                <div class="container">
                    <div class="col">
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">MY Uncang Emas</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                    <div class="pricingTable-signup">
                                      <table style="width: 100%;">
                                        @foreach($dataGAP as $key => $value)
                                        <tr>
                                          <td><a href="#">RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</a></td>
                                        </tr>
                                         @endforeach
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end 23/6/2020 -->
               <!-- <div class="gold">
                  <div class="container">
                      <div class="col">
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">Classic | Bungamas | Tai fook (24k)</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                   <div class="pricingTable-signup">
                                     <table style="width: 100%;">
                                       <th><a href="#">Weight</th>
                                       <th><a href="#">Sell</th>
                                       <th><a href="#">Buy</th>
                                       @foreach($dataGold24kTaifook as $key => $value)
                                       <tr>
                                         <td><a href="#"><span>{{$value["gram"]}} gram</span></a></td>
                                         <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                         <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                       </tr>
                                        @endforeach
                                     </table>
                                   </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">LBMA Small Bar | Wafer (24k)</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                    <div class="pricingTable-signup">
                                      <table style="width: 100%;">
                                        <th><a href="#">Weight</th>
                                        <th><a href="#">Sell</th>
                                        @foreach($dataGold24kSmall as $key => $value)
                                        <tr>
                                          <td><a href="#"><span>{{$value["gram"]}} {{$value["label"]}}</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                        </tr>
                                         @endforeach
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">Gold Wafer - Dinar (22k)</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                    <div class="pricingTable-signup">
                                      <table style="width: 100%;">
                                        <th><a href="#">Weight</th>
                                        <th><a href="#">Sell</th>
                                        <th><a href="#">Buy</th>
                                        @foreach($dataGoldWafer22k as $key => $value)
                                        <tr>
                                          <td><a href="#"><span>{{$value["gram"]}} Dinar</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                        </tr>
                                         @endforeach
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <h3 class="title" style="color:white;">Gold Jewellery (22k)</h3>
                                </div>
                                <div class="pricing-content">
                                    <div class="price-value">
                                    </div>
                                    <ul class="inner-content">
                                    </ul>
                                    <div class="pricingTable-signup">
                                      <table style="width: 100%;">
                                        <th><a href="#">Weight</th>
                                        <th><a href="#">Buy</th>
                                        @foreach($dataGold24kJewellary as $key => $value)
                                        <tr>
                                          <td><a href="#"><span>{{$value["gram"]}} gram</span></a></td>
                                          <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                        </tr>
                                         @endforeach
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div> -->
            </div>
            <div class="block3"  style="width:100%">
              <div class="silver">
                 <div class="container">
                     <div class="col">
                         <div class="col-md-4 col-sm-6">
                             <div class="pricingTable blue">
                                 <div class="pricingTable-header">
                                     <h3 class="title" style="color:white;">MY Uncang Perak</h3>
                                 </div>
                                 <div class="pricing-content">
                                     <div class="price-value">
                                     </div>
                                     <ul class="inner-content">
                                     </ul>
                                     <div class="pricingTable-signup">
                                       <table style="width: 100%;">
                                         @foreach($dataSAP as $key => $value)
                                         <tr>
                                           <td><a href="#">RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</a></td>
                                         </tr>
                                          @endforeach
                                       </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- 23/6/2020 -->
                         <br>
                         <img src="https://www.kitconet.com/images/quotes_2a.gif" border="0" alt="[Most Recent Quotes from www.kitco.com]" style="width:100%; height:44px; border: 1px solid rgb(218, 165, 32)">
                         <a href="javascript:window.open('https://www.kitco.com/images/live/gold.gif','GoldChart','top=50,left=200,width=640,height=480');">
                           <img src="https://www.kitconet.com/charts/metals/gold/t24_au_en_usoz_2.gif" border="0" alt="Click to enlarge" align="center" width="50%" height="90" style="border: 1px solid rgb(218, 165, 32)">
                         </a>
                         <a href="javascript:window.open('https://www.kitco.com/images/live/silver.gif','SilverChart','top=50,left=200,width=640,height=480');">
                         <img src="https://www.kitconet.com/charts/metals/silver/t24_ag_en_usoz_2.gif" border="0" alt="Click to enlarge" align="right" width="50%" height="90" style="border: 1px solid rgb(218, 165, 32)">
                       </a>
                       <!-- end 23/6/2020 -->

                         <!-- <div class="col-md-4 col-sm-6">
                             <div class="pricingTable blue">
                                 <div class="pricingTable-header">
                                     <h3 class="title" style="color:white;">Silver Bar (999)</h3>
                                 </div>
                                 <div class="pricing-content">
                                     <div class="price-value">
                                     </div>
                                     <ul class="inner-content">
                                     </ul>
                                     <div class="pricingTable-signup">
                                       <table style="width: 100%;">
                                         <th><a href="#">Weight</th>
                                         <th><a href="#">Sell</th>
                                         <th><a href="#">Buy</th>
                                         @foreach($dataSilver24k as $key => $value)
                                         <tr>
                                           <td><a href="#"><span>{{$value["gram"]}} gram</span></a></td>
                                           <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                           <td><a href="#">RM<span> {{number_format($value["buy"])}}</span></a></td>
                                         </tr>
                                          @endforeach
                                       </table>
                                     </div>
                                 </div>
                             </div>
                         </div> -->
                     </div>
                 </div>
             </div>
           </div>
           <div class="block4"  style="width:100%">
               <div class="silver">
                  <div class="container">
                      <div class="col">
                          <!-- <div class="col-md-12 col-sm-12">
                              <div class="pricingTable blue">
                                  <div class="pricingTable-header">
                                      <h3 class="title" style="color:white;">Silver Wafer - Dirham (999)</h3>
                                  </div>
                                  <div class="pricing-content">
                                      <ul class="inner-content">
                                      </ul>
                                      <div class="pricingTable-signup">
                                        <table style="width: 100%;">
                                          <th><a href="#">Weight</th>
                                          <th><a href="#">Sell</th>
                                          @foreach($dataSilverDirham as $key => $value)
                                          <tr>
                                            <td><a href="#"><span>{{$value["gram"]}} Dirham</span></a></td>
                                            <td><a href="#">RM<span> {{number_format($value["sell"])}}</span></a></td>
                                          </tr>
                                           @endforeach
                                        </table>
                                      </div>
                                  </div>
                              </div>
                          </div> -->
                          <!-- <img src="https://www.kitconet.com/images/quotes_2a.gif" border="0" alt="[Most Recent Quotes from www.kitco.com]" style="width:100%; height:44px; border: 1px solid rgb(218, 165, 32)">
                          <a href="javascript:window.open('https://www.kitco.com/images/live/gold.gif','GoldChart','top=50,left=200,width=640,height=480');">
                            <img src="https://www.kitconet.com/charts/metals/gold/t24_au_en_usoz_2.gif" border="0" alt="Click to enlarge" align="center" width="50%" height="90" style="border: 1px solid rgb(218, 165, 32)">
                          </a>
                          <a href="javascript:window.open('https://www.kitco.com/images/live/silver.gif','SilverChart','top=50,left=200,width=640,height=480');">
                          <img src="https://www.kitconet.com/charts/metals/silver/t24_ag_en_usoz_2.gif" border="0" alt="Click to enlarge" align="right" width="50%" height="90" style="border: 1px solid rgb(218, 165, 32)">
                        </a> -->
                      </div>
                  </div>
              </div>
            </div>
           </div>
      </section>
