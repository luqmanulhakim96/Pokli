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
    $getSilver24k = "SELECT * FROM silver_live_price_24k ORDER BY gram ASC";

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
          <b>Pokli Gold Price <br> (24 Hours Live)<br><font size="2">@foreach ($dataLast as $key => $value)(Last updated {{$value["dateLast"]}}) @endforeach</font></b>
       </div>
       <div class="col-xs-12">

       </div>
       <div class="featured-grid product-grid-4">
             <!-- <div class="sub-block1">
               <table align="center">
                 <div>
                   <img src="https://www.publicgold.com.my/images/liveprice/gap.png" alt="Gold Bar/Wafer 24K" width="248px" height="15px">
                   @foreach($dataGAP as $key => $value)
                         <tr>
                           <td>MYR {{$value["price"]}}</td>
                           <td> = </td>
                           <td>{{$value["gram"]}} gram</td>
                         </tr>
                   @endforeach
                   </div>
               </table>
             </div>
           </div>
           <div class="block1">
             <div class="sub-block2">
               <table align="center">
                 <div>
                   <img src="https://www.publicgold.com.my/images/liveprice/LBMA%20Gold%20Bar%2024K.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                   <th class="grid_head" >WEIGHT</th>
                   <th class="grid_head" >SELL</th>
                   <th class="grid_head" >BUY</th>
                   <tbody>
                       @foreach($dataGold24k as $key => $value)
                           <tr>
                             <td>{{$value["gram"]}} gram</td>
                             <td style="text-align:center">{{$value["sell"]}}</td>
                             <td style="text-align:center">{{$value["buy"]}}</td>
                           </tr>
                       @endforeach
                   </tbody>
                 </div>
               </table>
             </div>
           </div>
           <div class="block1">
               <div class="sub-block1">
                 <table align="center">
                   <div>
                     <img src="https://www.publicgold.com.my/images/liveprice/sap.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                       @foreach($dataSAP as $key => $value)
                           <tr>
                             <td>MYR {{$value["price"]}}</td>
                             <td> = </td>
                             <td>{{$value["gram"]}} gram</td>
                           </tr>
                       @endforeach
                   </div>
                 </table>
               </div>
             </div>
             <div class="block1">
               <div class="sub-block2">
                 <table align="center">
                   <div>
                     <img src="https://www.publicgold.com.my/images/liveprice/LBMA%20SILVER%20BAR.png" alt="Silver Bar 999" width="248px" height="15px" style="top:-4px;position:relative;">
                     <th class="grid_head" >WEIGHT</th>
                     <th class="grid_head" >SELL</th>
                     <th class="grid_head" >BUY</th>
                     <tbody>
                       @foreach($dataSilver24k as $key => $value)
                         <tr>
                           <td>{{$value["gram"]}} gram</td>
                           <td style="text-align:center">{{$value["sell"]}}</td>
                           <td style="text-align:center">{{$value["buy"]}}</td>
                         </tr>
                       @endforeach
                     </tbody>
                   </div>
                 </table>
               </div>
           </div>
           <div class="block1">
               <div class="sub-block1">
                 <span style="font-style:italic;line-height:1; "><br><br>
                 * All LBMA products are SST exempted. <br>* All prices are quoted in Malaysia Ringgit (MYR) and excluding Gold Premium
                 </span>
               </div>
           </div> -->
      <div class="block1">
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
                                                <span>MY Uncang Emas</span>
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
                                    <div class="generic_feature_list">
                                    	<ul>
                                        @foreach($dataGAP as $key => $value)
                                        	<li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                        @endforeach
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
       <div class="block1">
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
                                                 <span>LBMA Gold Bar (24k)</span>
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
                                     <div class="generic_feature_list">
                                     	<ul>
                                       @foreach($dataGold24k as $key => $value)
  	                                    <li>RM<span> {{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                        @endforeach
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
        <div class="block1">
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
                                                  <span>LBMA Gold Bar (24k)</span>
                                              </div>
                                              <!--//HEAD END-->

                                          </div>
                                          <!--//HEAD CONTENT END-->

                                          <!--PRICE START-->
                                          <div class="generic_price_tag clearfix">
                                              <span class="price">
                                                  <span class="sign">Buy</span>
                                              </span>
                                          </div>
                                          <!--//PRICE END-->

                                      </div>
                                      <!--//HEAD PRICE DETAIL END-->

                                      <!--FEATURE LIST START-->
                                      <div class="generic_feature_list">
                                      	<ul>
                                        @foreach($dataGold24k as $key => $value)
   	                                    <li>RM <span>{{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                         @endforeach
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
                                      <div class="generic_feature_list">
                                      	<ul>
                                          @foreach($dataSAP as $key => $value)
                                          	<li>RM <span>{{$value["price"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                          @endforeach
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
                                       <div class="generic_feature_list">
                                       	<ul>
                                           @foreach($dataSilver24k as $key => $value)
                                           <li>RM <span>{{$value["sell"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                            @endforeach
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
                                                    <span class="sign">Buy</span>
                                                    <!-- <span class="currency">99</span>
                                                    <span class="cent">.99</span>
                                                    <span class="month">/MON</span> -->
                                                </span>
                                            </div>
                                            <!--//PRICE END-->

                                        </div>
                                        <!--//HEAD PRICE DETAIL END-->

                                        <!--FEATURE LIST START-->
                                        <div class="generic_feature_list">
                                        	<ul>
                                            @foreach($dataSilver24k as $key => $value)
                                            <li>RM <span>{{$value["buy"]}}</span> = <span>{{$value["gram"]}} </span>gram</li>
                                             @endforeach
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
  </section>
