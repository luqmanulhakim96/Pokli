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
                        @include("liveprice::liveapi")
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
