<?php
    $db = mysqli_connect("localhost","root","P@ssw0rd123","live_price_api");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

          $getLast = "SELECT DATE_FORMAT(`last_updated`, '%d-%M-%Y %H:%i:%S') as dateLast FROM `gold_live_price_gap` GROUP BY `last_updated`";

          $getGAP = "SELECT * FROM gold_live_price_gap";
          $getGold24kBuys = "SELECT * FROM gold_live_price_24k WHERE buy IS NOT NULL ORDER BY gram ASC";
          $getGold24k = "SELECT * FROM gold_live_price_24k ORDER BY gram ASC";
          $getGoldFlexibar = "SELECT * FROM gold_live_price_flexibar_24k ORDER BY gram ASC";
          $getGoldWafer22k = "SELECT * FROM gold_live_price_gold_wafer_22k ORDER BY gram ASC";
          $getGoldWafer24k = "SELECT * FROM gold_live_price_gold_wafer_24k ORDER BY sell ASC";
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
              <b>Pokli Gold Price <br> (24 Hours Live)<br><font size="2">@foreach ($dataLast as $key => $value)(Last updated {{$value["dateLast"]}}) @endforeach</font></b>
           </div>
           <div class="col-xs-12">

           </div>
           <div class="featured-grid product-grid-2">
            <div class="block1">

                </div>
                 <div class="block2">

                    </div>
             </div>
             <div class="featured-grid product-grid-price">
               <div class="block1">
                 <div id="generic_price_table" style="height: 160px;">
                    <section>
                          <div class="container">

                              <!--BLOCK ROW START-->
                              <div class="row">
                                  <div class="col-md-4">

                                  	<!--PRICE CONTENT START-->
                                      <div class="generic_content clearfix">

                                          <!--HEAD PRICE DETAIL START-->
                                          <div class="generic_head_price clearfix">

                                              <!--HEAD CONTENT START-->
                                              <div class="generic_head_content clearfix">

                                              	<!--HEAD START-->
                                                  <div class="head_bg"></div>
                                                  <div class="head">
                                                      <span>MY Uncang Emas </span>
                                                  </div>
                                                  <!--//HEAD END-->

                                              </div>
                                              <!--//HEAD CONTENT END-->

                                              <!--PRICE START-->

                                              <!-- <div class="generic_price_tag clearfix">
                                                  <span class="price">
                                                      <span class="sign">RM</span>
                                                      <span class="currency"></span>
                                                      <span class="cent"> = </span>
                                                      <span class="month"> g</span>
                                                  </span>
                                              </div> -->
                                              <!--//PRICE END-->

                                          </div>
                                          <!--//HEAD PRICE DETAIL END-->

                                          <!--FEATURE LIST START-->
                                          <!-- <div class="generic_feature_list">
                                          	<ul>
                                              @foreach($dataGAP as $key => $value)
                                              	<li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                              @endforeach
                                              </ul>
                                          </div> -->
                                          <div class="generic_feature_list">
                                           <ul>
                                              <table class="tablePrice">
                                              @foreach($dataGAP as $key => $value)
                                                <tr>
                                                <td align="center"><li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li></td>
                                                </tr>
                                                   @endforeach
                                              </table>
                                            </ul>
                                          </div>
                                          <!--//FEATURE LIST END-->

                                          <!--BUTTON START-->
                                          <!-- <div class="generic_price_btn clearfix">
                                          	<a class="" href="">Sign up</a>
                                          </div> -->
                                          <!--//BUTTON END-->

                                      </div>
                                      <!--//PRICE CONTENT END-->

                                  </div>

                              </div>
                              <!--//BLOCK ROW END-->

                          </div>
                      </section>
                  </div>
                 <!-- <div class="sub-block1"> -->
                    <div id="generic_price_table" style="height: 352px;">
                       <section>
                             <div class="container">

                                 <!--BLOCK ROW START-->
                                 <div class="row">
                                     <div class="col-md-4">

                                     	<!--PRICE CONTENT START-->
                                         <div class="generic_content clearfix">

                                             <!--HEAD PRICE DETAIL START-->
                                             <div class="generic_head_price clearfix">

                                                 <!--HEAD CONTENT START-->
                                                 <div class="generic_head_content clearfix">

                                                 	<!--HEAD START-->
                                                     <div class="head_bg"></div>
                                                     <div class="head">
                                                         <span>LBMA Gold Bar (24k)</span>
                                                     </div>
                                                     <!--//HEAD END-->

                                                 </div>
                                                 <!--//HEAD CONTENT END-->

                                                 <!--PRICE START-->
                                                 <div class="generic_price_tag clearfix">
                                                     <span class="price">
                                                         <span class="sign">Sell | Buy</span>
                                                         <!-- <span class="currency">99</span>
                                                         <span class="cent">.99</span> -->
                                                         <!-- <span class="month">/MON</span> -->
                                                     </span>
                                                 </div>
                                                 <!--//PRICE END-->

                                             </div>
                                             <!--//HEAD PRICE DETAIL END-->

                                             <!--FEATURE LIST START-->
                                             <div class="generic_feature_list">
                                             	<ul>
                                                 <table class="tablePrice">
                                                     @foreach($dataGold24k as $key => $value)
                                                   <tr>
                                                     <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                     <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                   </tr>
                                                      @endforeach
                                                 </table>
                                               </ul>
                                             </div>

                                             <!--//FEATURE LIST END-->

                                             <!--BUTTON START-->
                                             <!-- <div class="generic_price_btn clearfix">
                                             	<a class="" href="">Sign up</a>
                                             </div> -->
                                             <!--//BUTTON END-->

                                         </div>
                                         <!--//PRICE CONTENT END-->

                                     </div>

                                 </div>
                                 <!--//BLOCK ROW END-->

                             </div>
                         </section>
                     </div>
                  <!-- </div>
                  <div class="sub-block2"> -->
                     <div id="generic_price_table" style="height: 250px;">
                        <section>
                              <div class="container">

                                  <!--BLOCK ROW START-->
                                  <div class="row">
                                      <div class="col-md-4">

                                      	<!--PRICE CONTENT START-->
                                          <div class="generic_content clearfix">

                                              <!--HEAD PRICE DETAIL START-->
                                              <div class="generic_head_price clearfix">

                                                  <!--HEAD CONTENT START-->
                                                  <div class="generic_head_content clearfix">

                                                  	<!--HEAD START-->
                                                      <div class="head_bg"></div>
                                                      <div class="head">
                                                          <span>LBMA Gold Wafer - Dinar (24k)</span>
                                                      </div>
                                                      <!--//HEAD END-->

                                                  </div>
                                                  <!--//HEAD CONTENT END-->

                                                  <!--PRICE START-->
                                                  <div class="generic_price_tag clearfix">
                                                      <span class="price">
                                                          <span class="sign">Sell | Buy</span>
                                                          <!-- <span class="currency">99</span>
                                                          <span class="cent">.99</span> -->
                                                          <!-- <span class="month">/MON</span> -->
                                                      </span>
                                                  </div>
                                                  <!--//PRICE END-->

                                              </div>
                                              <!--//HEAD PRICE DETAIL END-->

                                              <!--FEATURE LIST START-->
                                              <!-- <div class="generic_feature_list">
                                              	<ul>
                                                @foreach($dataGoldWafer24k as $key => $value)
           	                                    <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li>
                                                 @endforeach
                                              </ul>
                                              </div> -->

                                              <div class="generic_feature_list">
                                              	<ul>
                                                  <table class="tablePrice">
                                                       @foreach($dataGoldWafer24k as $key => $value)
                                                    <tr>
                                                      <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li></td>
                                                      <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li></td>
                                                    </tr>
                                                       @endforeach
                                                  </table>
                                                </ul>
                                              </div>

                                              <!--//FEATURE LIST END-->

                                              <!--BUTTON START-->
                                              <!-- <div class="generic_price_btn clearfix">
                                              	<a class="" href="">Sign up</a>
                                              </div> -->
                                              <!--//BUTTON END-->

                                          </div>
                                          <!--//PRICE CONTENT END-->

                                      </div>

                                  </div>
                                  <!--//BLOCK ROW END-->

                              </div>
                          </section>
                      </div>
                   <!-- </div>
                   <div class="sub-block2">

                    </div>
                    <div class="sub-block2">

                     </div>
                     <div class="sub-block2"> -->
                        <div id="generic_price_table">
                           <section>
                                 <div class="container">

                                     <!--BLOCK ROW START-->
                                     <div class="row">
                                         <div class="col-md-4">

                                           <!--PRICE CONTENT START-->
                                             <div class="generic_content clearfix">

                                                 <!--HEAD PRICE DETAIL START-->
                                                 <div class="generic_head_price clearfix">

                                                     <!--HEAD CONTENT START-->
                                                     <div class="generic_head_content clearfix">

                                                       <!--HEAD START-->
                                                         <div class="head_bg"></div>
                                                         <div class="head">
                                                             <span>Gold Wafer - Dinar (22k)</span>
                                                         </div>
                                                         <!--//HEAD END-->

                                                     </div>
                                                     <!--//HEAD CONTENT END-->

                                                     <!--PRICE START-->
                                                     <div class="generic_price_tag clearfix">
                                                         <span class="price">
                                                             <span class="sign">Sell | Buy</span>
                                                             <!-- <span class="currency">99</span>
                                                             <span class="cent">.99</span> -->
                                                             <!-- <span class="month">/MON</span> -->
                                                         </span>
                                                     </div>
                                                     <!--//PRICE END-->

                                                 </div>
                                                 <!--//HEAD PRICE DETAIL END-->

                                                 <!--FEATURE LIST START-->
                                                 <!-- <div class="generic_feature_list">
                                                   <ul>
                                                    @foreach($dataGoldWafer22k as $key => $value)
                                                     <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li>
                                                     @endforeach
                                                 </ul>
                                                 </div> -->

                                                 <div class="generic_feature_list">
                                                 	<ul>
                                                     <table class="tablePrice">
                                                          @foreach($dataGoldWafer22k as $key => $value)
                                                       <tr>
                                                         <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li></td>
                                                         <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>Dinar</li></td>
                                                       </tr>
                                                          @endforeach
                                                     </table>
                                                   </ul>
                                                 </div>

                                                 <!--//FEATURE LIST END-->

                                                 <!--BUTTON START-->
                                                 <!-- <div class="generic_price_btn clearfix">
                                                   <a class="" href="">Sign up</a>
                                                 </div> -->
                                                 <!--//BUTTON END-->

                                             </div>
                                             <!--//PRICE CONTENT END-->

                                         </div>

                                     </div>
                                     <!--//BLOCK ROW END-->

                                 </div>
                             </section>
                         </div>
                      <!-- </div> -->

                </div>
                <div class="block1">
                     <div id="generic_price_table" style="height: 290px;">
                        <section>
                              <div class="container">

                                  <!--BLOCK ROW START-->
                                  <div class="row">
                                      <div class="col-md-4">

                                        <!--PRICE CONTENT START-->
                                          <div class="generic_content clearfix">

                                              <!--HEAD PRICE DETAIL START-->
                                              <div class="generic_head_price clearfix">

                                                  <!--HEAD CONTENT START-->
                                                  <div class="generic_head_content clearfix">

                                                    <!--HEAD START-->
                                                      <div class="head_bg"></div>
                                                      <div class="head">
                                                          <span>Classic \ Bungamas \ Tai fook (24k)</span>
                                                      </div>
                                                      <!--//HEAD END-->

                                                  </div>
                                                  <!--//HEAD CONTENT END-->

                                                  <!--PRICE START-->
                                                  <div class="generic_price_tag clearfix">
                                                      <span class="price">
                                                          <span class="sign">Sell | Buy</span>
                                                          <!-- <span class="currency">99</span>
                                                          <span class="cent">.99</span> -->
                                                          <!-- <span class="month">/MON</span> -->
                                                      </span>
                                                  </div>
                                                  <!--//PRICE END-->

                                              </div>
                                              <!--//HEAD PRICE DETAIL END-->

                                              <!--FEATURE LIST START-->
                                              <!-- <div class="generic_feature_list">
                                                <ul>
                                                 @foreach($dataGold24kTaifook as $key => $value)
                                                  <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                  @endforeach
                                              </ul>
                                              </div> -->

                                              <div class="generic_feature_list">
                                               <ul>
                                                  <table class="tablePrice">
                                                        @foreach($dataGold24kTaifook as $key => $value)
                                                    <tr>
                                                      <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                      <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                    </tr>
                                                       @endforeach
                                                  </table>
                                                </ul>
                                              </div>

                                              <!--//FEATURE LIST END-->

                                              <!--BUTTON START-->
                                              <!-- <div class="generic_price_btn clearfix">
                                                <a class="" href="">Sign up</a>
                                              </div> -->
                                              <!--//BUTTON END-->

                                          </div>
                                          <!--//PRICE CONTENT END-->

                                      </div>

                                  </div>
                                  <!--//BLOCK ROW END-->

                              </div>
                          </section>
                      </div>
                      <div id="generic_price_table" style="height: 270px;">
                         <section>
                               <div class="container">

                                   <!--BLOCK ROW START-->
                                   <div class="row">
                                       <div class="col-md-4">

                                         <!--PRICE CONTENT START-->
                                           <div class="generic_content clearfix">

                                               <!--HEAD PRICE DETAIL START-->
                                               <div class="generic_head_price clearfix">

                                                   <!--HEAD CONTENT START-->
                                                   <div class="generic_head_content clearfix">

                                                     <!--HEAD START-->
                                                       <div class="head_bg"></div>
                                                       <div class="head">
                                                           <span>LBMA Small Bar / Wafer (24k)</span>
                                                       </div>
                                                       <!--//HEAD END-->

                                                   </div>
                                                   <!--//HEAD CONTENT END-->

                                                   <!--PRICE START-->
                                                   <div class="generic_price_tag clearfix">
                                                       <span class="price">
                                                           <span class="sign">Sell</span>
                                                           <!-- <span class="currency">99</span>
                                                           <span class="cent">.99</span> -->
                                                           <!-- <span class="month">/MON</span> -->
                                                       </span>
                                                   </div>
                                                   <!--//PRICE END-->

                                               </div>
                                               <!--//HEAD PRICE DETAIL END-->

                                               <!--FEATURE LIST START-->
                                               <!-- <div class="generic_feature_list">
                                                 <ul>
                                                  @foreach($dataGold24kSmall as $key => $value)
                                                   <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                   @endforeach
                                               </ul>
                                               </div> -->

                                               <div class="generic_feature_list">
                                                <ul>
                                                   <table class="tablePrice">
                                                    @foreach($dataGold24kSmall as $key => $value)
                                                     <tr>
                                                     <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li></td>
                                                     </tr>
                                                        @endforeach
                                                   </table>
                                                 </ul>
                                               </div>

                                               <!--//FEATURE LIST END-->

                                               <!--BUTTON START-->
                                               <!-- <div class="generic_price_btn clearfix">
                                                 <a class="" href="">Sign up</a>
                                               </div> -->
                                               <!--//BUTTON END-->

                                           </div>
                                           <!--//PRICE CONTENT END-->

                                       </div>

                                   </div>
                                   <!--//BLOCK ROW END-->

                               </div>
                           </section>
                       </div>
                       <div id="generic_price_table">
                          <section>
                                <div class="container">

                                    <!--BLOCK ROW START-->
                                    <div class="row">
                                        <div class="col-md-4">

                                          <!--PRICE CONTENT START-->
                                            <div class="generic_content clearfix">

                                                <!--HEAD PRICE DETAIL START-->
                                                <div class="generic_head_price clearfix">

                                                    <!--HEAD CONTENT START-->
                                                    <div class="generic_head_content clearfix">

                                                      <!--HEAD START-->
                                                        <div class="head_bg"></div>
                                                        <div class="head">
                                                            <span>Gold Flexibar (24k)</span>
                                                        </div>
                                                        <!--//HEAD END-->

                                                    </div>
                                                    <!--//HEAD CONTENT END-->

                                                    <!--PRICE START-->
                                                    <div class="generic_price_tag clearfix">
                                                        <span class="price">
                                                            <span class="sign">Sell | Buy</span>
                                                            <!-- <span class="currency">99</span>
                                                            <span class="cent">.99</span> -->
                                                            <!-- <span class="month">/MON</span> -->
                                                        </span>
                                                    </div>
                                                    <!--//PRICE END-->

                                                </div>
                                                <!--//HEAD PRICE DETAIL END-->

                                                <!--FEATURE LIST START-->
                                                <!-- <div class="generic_feature_list">
                                                  <ul>
                                                   @foreach($dataGold24kFlexibar as $key => $value)
                                                    <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                    @endforeach
                                                </ul>
                                                </div> -->

                                                <div class="generic_feature_list">
                                                	<ul>
                                                    <table class="tablePrice">
                                                          @foreach($dataGold24kFlexibar as $key => $value)
                                                      <tr>
                                                        <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                        <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                      </tr>
                                                         @endforeach
                                                    </table>
                                                  </ul>
                                                </div>

                                                <!--//FEATURE LIST END-->

                                                <!--BUTTON START-->
                                                <!-- <div class="generic_price_btn clearfix">
                                                  <a class="" href="">Sign up</a>
                                                </div> -->
                                                <!--//BUTTON END-->

                                            </div>
                                            <!--//PRICE CONTENT END-->

                                        </div>

                                    </div>
                                    <!--//BLOCK ROW END-->

                                </div>
                            </section>
                        </div>
                 </div>
                 <div class="block2">
                   <div id="generic_price_table" style="height: 158px;">
                      <section>
                            <div class="container">

                                <!--BLOCK ROW START-->
                                <div class="row">
                                    <div class="col-md-4">

                                     <!--PRICE CONTENT START-->
                                        <div class="generic_content clearfix">

                                            <!--HEAD PRICE DETAIL START-->
                                            <div class="generic_head_price clearfix">

                                                <!--HEAD CONTENT START-->
                                                <div class="generic_head_content clearfix">

                                                 <!--HEAD START-->
                                                    <div class="head_bg"></div>
                                                    <div class="head">
                                                        <span>MY Uncang Perak</span>
                                                    </div>
                                                    <!--//HEAD END-->

                                                </div>
                                                <!--//HEAD CONTENT END-->

                                                <!--PRICE START-->
                                                @foreach($dataSAP as $key => $value)
                                                 <!-- <div class="generic_price_tag clearfix">
                                                     <span class="price">
                                                         <span class="sign">RM</span>
                                                         <span class="currency">{{$value["price"]}}</span>
                                                         <span class="cent"> = </span>
                                                         <span class="month">{{$value["gram"]}} g</span>
                                                     </span>
                                                 </div> -->
                                                 @endforeach
                                                <!--//PRICE END-->

                                            </div>
                                            <!--//HEAD PRICE DETAIL END-->

                                            <!--FEATURE LIST START-->
                                            <!-- <div class="generic_feature_list">
                                             <ul>
                                                @foreach($dataSAP as $key => $value)
                                                 <li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                @endforeach
                                              </ul>
                                            </div -->

                                            <div class="generic_feature_list">
                                             <ul>
                                                <table class="tablePrice">
                                                @foreach($dataSAP as $key => $value)
                                                  <tr>
                                                  <td align="center"><li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li></td>
                                                  </tr>
                                                     @endforeach
                                                </table>
                                              </ul>
                                            </div>
                                            <!--//FEATURE LIST END-->

                                            <!--BUTTON START-->
                                            <!-- <div class="generic_price_btn clearfix">
                                             <a class="" href="">Sign up</a>
                                            </div> -->
                                            <!--//BUTTON END-->

                                        </div>
                                        <!--//PRICE CONTENT END-->

                                    </div>

                                </div>
                                <!--//BLOCK ROW END-->

                            </div>
                        </section>
                    </div>
                   <div class="sub-block1">
                      <div id="generic_price_table">
                         <section>
                               <div class="container">

                                   <!--BLOCK ROW START-->
                                   <div class="row">
                                       <div class="col-md-4">

                                       	<!--PRICE CONTENT START-->
                                           <div class="generic_content clearfix">

                                               <!--HEAD PRICE DETAIL START-->
                                               <div class="generic_head_price clearfix">

                                                   <!--HEAD CONTENT START-->
                                                   <div class="generic_head_content clearfix">

                                                   	<!--HEAD START-->
                                                       <div class="head_bg"></div>
                                                       <div class="head">
                                                           <span>Silver Bar (999)</span>
                                                       </div>
                                                       <!--//HEAD END-->

                                                   </div>
                                                   <!--//HEAD CONTENT END-->

                                                   <!--PRICE START-->
                                                   <div class="generic_price_tag clearfix">
                                                       <span class="price">
                                                           <span class="sign">Sell | Buy</span>
                                                           <!-- <span class="currency">99</span>
                                                           <span class="cent">.99</span>
                                                           <span class="month">/MON</span> -->
                                                       </span>
                                                   </div>
                                                   <!--//PRICE END-->

                                               </div>
                                               <!--//HEAD PRICE DETAIL END-->

                                               <!--FEATURE LIST START-->
                                               <!-- <div class="generic_feature_list">
                                               	<ul>
                                                   @foreach($dataSilver24k as $key => $value)
                                                   <li>RM <span>{{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                    @endforeach
                                                    <li>.</li>
                                                  </ul>
                                               </div> -->

                                               <div class="generic_feature_list">
                                                 <ul>
                                                   <table class="tablePrice">
                                                        @foreach($dataSilver24k as $key => $value)
                                                     <tr>
                                                       <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                       <td align="center"><li> RM<span> {{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>g</li></td>
                                                     </tr>
                                                        @endforeach
                                                   </table>
                                                 </ul>
                                               </div>
                                               <!--//FEATURE LIST END-->

                                               <!--BUTTON START-->
                                               <!-- <div class="generic_price_btn clearfix">
                                               	<a class="" href="">Sign up</a>
                                               </div> -->
                                               <!--//BUTTON END-->

                                           </div>
                                           <!--//PRICE CONTENT END-->

                                       </div>

                                   </div>
                                   <!--//BLOCK ROW END-->

                               </div>
                           </section>
                       </div>
                    </div>
                    <!--  -->
                  </div>
                  <div class="block2">
                       <div id="generic_price_table">
                          <section>
                                <div class="container">

                                    <!--BLOCK ROW START-->
                                    <div class="row">
                                        <div class="col-md-4">

                                        	<!--PRICE CONTENT START-->
                                            <div class="generic_content clearfix">

                                                <!--HEAD PRICE DETAIL START-->
                                                <div class="generic_head_price clearfix">

                                                    <!--HEAD CONTENT START-->
                                                    <div class="generic_head_content clearfix">

                                                    	<!--HEAD START-->
                                                        <div class="head_bg"></div>
                                                        <div class="head">
                                                            <span>Silver Wafer - Dirham (999)</span>
                                                        </div>
                                                        <!--//HEAD END-->

                                                    </div>
                                                    <!--//HEAD CONTENT END-->

                                                    <!--PRICE START-->
                                                    <div class="generic_price_tag clearfix">
                                                        <span class="price">
                                                            <span class="sign">Sell</span>
                                                            <!-- <span class="currency">99</span>
                                                            <span class="cent">.99</span>
                                                            <span class="month">/MON</span> -->
                                                        </span>
                                                    </div>
                                                    <!--//PRICE END-->

                                                </div>
                                                <!--//HEAD PRICE DETAIL END-->

                                                <!--FEATURE LIST START-->
                                                <!-- <div class="generic_feature_list">
                                                	<ul>
                                                    @foreach($dataSilver24k as $key => $value)
                                                    <li>RM <span>{{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                                     @endforeach
                                                   </ul>
                                                </div> -->
                                                <div class="generic_feature_list">
                                                  <ul>
                                                    <table class="tablePrice">
                                                         @foreach($dataSilverDirham as $key => $value)
                                                      <tr>
                                                        <td align="center"><li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>Dirham</li></td>
                                                      </tr>
                                                         @endforeach
                                                    </table>
                                                  </ul>
                                                </div>
                                                <!--//FEATURE LIST END-->

                                                <!--BUTTON START-->
                                                <!-- <div class="generic_price_btn clearfix">
                                                	<a class="" href="">Sign up</a>
                                                </div> -->
                                                <!--//BUTTON END-->

                                            </div>
                                            <!--//PRICE CONTENT END-->

                                        </div>

                                    </div>
                                    <!--//BLOCK ROW END-->

                                </div>
                            </section>
                        </div>
                      </div>
                      <img src="https://www.kitconet.com/images/quotes_2a.gif" border="0" alt="[Most Recent Quotes from www.kitco.com]" style="width:300px; height:44px; margin:0px 0px 0px 0px; border: 1px solid rgb(202,010,021)">
                      <a href="javascript:NewWindow('https://www.kitco.com/images/live/gold.gif','GoldChart','top=50,left=200,width=640,height=480');">
                        <img src="https://www.kitconet.com/charts/metals/gold/t24_au_en_usoz_2.gif" border="0" alt="Click to enlarge" align="center" width="140" height="90" style="border: 1px solid rgb(202,010,021)">
                      </a>
                      <a href="javascript:NewWindow('https://www.kitco.com/images/live/silver.gif','SilverChart','top=50,left=200,width=640,height=480');">
         							<img src="https://www.kitconet.com/charts/metals/silver/t24_ag_en_usoz_2.gif" border="0" alt="Click to enlarge" align="right" width="140" height="90" style="border: 1px solid rgb(202,010,021)">
         						</a>
             </div>
      </section>
