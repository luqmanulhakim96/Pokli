<?php

namespace Artanis\AdminCustom2\Http\Controllers;

use Artanis\AdminCustom2\Models\GoldLivePriceGap;
use Artanis\AdminCustom2\Models\GoldLivePriceBar24k;
use Artanis\AdminCustom2\Models\GoldLivePriceClassic24k;
use Artanis\AdminCustom2\Models\GoldLivePriceFlexibar24k;
use Artanis\AdminCustom2\Models\GoldLivePriceJewellary22k;
use Artanis\AdminCustom2\Models\GoldLivePriceSmallbar24k;
use Artanis\AdminCustom2\Models\GoldLivePriceWafer24k;
use Artanis\AdminCustom2\Models\GoldLivePriceWafer22k;

use Artanis\AdminCustom2\Models\SilverLivePriceSap;
use Artanis\AdminCustom2\Models\SilverLivePriceBar;
use Artanis\AdminCustom2\Models\SilverLivePriceDirham;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class LivePricingController extends Controller
{
    protected $_config;

    public function __construct()
    {
        $this->middleware('web');

        $this->_config = request('_config');
    }

    public function indexMYUncangEmas()
    {
      return view($this->_config['view']);
    }

    public function editMYUncangEmas()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_gap')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateMYUncangEmas()
    {
      // $gap_1_gram = GoldLivePriceGap::where('gram', '1')->update(['price' => request()->input('price_1_gram')]);
      $gap_1_gram = GoldLivePriceGap::find(1);
      $gap_1_gram->price =  request()->input('price_1_gram');
      $gap_1_gram->buyback =  request()->input('price_buyback');
      $gap_1_gram->save();

      $gap_100_price = GoldLivePriceGap::find(2);
      $gap_100_price->gram =  request()->input('price_100_price');
      $gap_100_price->save();

      // $gap_100_price = GoldLivePriceGap::where('price', '100')->update(['price' => request()->input('price_100_price')]);
      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gap.index');
    }

    public function indexGoldBar24k()
    {
      return view($this->_config['view']);
    }

    public function editGoldBar24k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldBar24k()
    {
      $gap_10_gram = GoldLivePriceBar24k::where('gram','10')->update(['sell' => request()->input('10sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','10')->update(['buy' => request()->input('10buy')]);

      $gap_10_gram = GoldLivePriceBar24k::where('gram','20')->update(['sell' => request()->input('20sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','20')->update(['buy' => request()->input('20buy')]);

      $gap_10_gram = GoldLivePriceBar24k::where('gram','50')->update(['sell' => request()->input('50sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','50')->update(['buy' => request()->input('50buy')]);

      $gap_10_gram = GoldLivePriceBar24k::where('gram','100')->update(['sell' => request()->input('100sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','100')->update(['buy' => request()->input('100buy')]);

      $gap_10_gram = GoldLivePriceBar24k::where('gram','250')->update(['sell' => request()->input('250sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','250')->update(['buy' => request()->input('250buy')]);

      $gap_10_gram = GoldLivePriceBar24k::where('gram','1000')->update(['sell' => request()->input('1000sell')]);
      $gap_10_gram = GoldLivePriceBar24k::where('gram','1000')->update(['buy' => request()->input('1000buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_bar_24k.index');
    }

    public function indexGoldWafer24k()
    {
      return view($this->_config['view']);
    }

    public function editGoldWafer24k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_gold_wafer_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldWafer24k()
    {
      $update = GoldLivePriceWafer24k::where('gram','1')->update(['sell' => request()->input('1sell')]);
      $update = GoldLivePriceWafer24k::where('gram','1')->update(['buy' => request()->input('1buy')]);

      $update = GoldLivePriceWafer24k::where('gram','10')->update(['sell' => request()->input('10sell')]);
      $update = GoldLivePriceWafer24k::where('gram','10')->update(['buy' => request()->input('10buy')]);

      $update = GoldLivePriceWafer24k::where('gram','5')->update(['sell' => request()->input('5sell')]);
      $update = GoldLivePriceWafer24k::where('gram','5')->update(['buy' => request()->input('5buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_wafer_24k.index');
    }

    public function indexGoldSmallBar24k()
    {
      return view($this->_config['view']);
    }

    public function editGoldSmallBar24k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_small_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldSmallBar24k()
    {
      $update = GoldLivePriceSmallbar24k::where('gram','0.5')->update(['sell' => request()->input('0_5sell')]);

      $update = GoldLivePriceSmallbar24k::where('gram','1')->update(['sell' => request()->input('1sell')]);

      $update = GoldLivePriceSmallbar24k::where('gram','1/2')->update(['sell' => request()->input('1/2sell')]);

      $update = GoldLivePriceSmallbar24k::where('gram','5')->update(['sell' => request()->input('5sell')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_smallbar_24k.index');
    }

    public function indexGoldClassic24k()
    {
      return view($this->_config['view']);
    }

    public function editGoldClassic24k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_taifook_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldClassic24k()
    {
      $update = GoldLivePriceClassic24k::where('gram','10')->update(['sell' => request()->input('10sell')]);
      $update = GoldLivePriceClassic24k::where('gram','10')->update(['buy' => request()->input('10buy')]);

      $update = GoldLivePriceClassic24k::where('gram','20')->update(['sell' => request()->input('20sell')]);
      $update = GoldLivePriceClassic24k::where('gram','20')->update(['buy' => request()->input('20buy')]);

      $update = GoldLivePriceClassic24k::where('gram','50')->update(['sell' => request()->input('50sell')]);
      $update = GoldLivePriceClassic24k::where('gram','50')->update(['buy' => request()->input('50buy')]);

      $update = GoldLivePriceClassic24k::where('gram','100')->update(['sell' => request()->input('100sell')]);
      $update = GoldLivePriceClassic24k::where('gram','100')->update(['buy' => request()->input('100buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_classic_24k.index');
    }

    public function indexGoldFlexibar24k()
    {
      return view($this->_config['view']);
    }

    public function editGoldFlexibar24k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_flexibar_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldFlexibar24k()
    {
      $update = GoldLivePriceFlexibar24k::where('gram','50')->update(['sell' => request()->input('50sell')]);
      $update = GoldLivePriceFlexibar24k::where('gram','50')->update(['buy' => request()->input('50buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_flexibar_24k.index');
    }

    public function indexGoldWafer22k()
    {
      return view($this->_config['view']);
    }

    public function editGoldWafer22k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_gold_wafer_22k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldWafer22k()
    {
      $update = GoldLivePriceWafer22k::where('gram','1')->update(['sell' => request()->input('1sell')]);
      $update = GoldLivePriceWafer22k::where('gram','1')->update(['buy' => request()->input('1buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_wafer_22k.index');
    }

    public function indexGoldJewellary22k()
    {
      return view($this->_config['view']);
    }

    public function editGoldJewellary22k()
    {
      $data = DB::connection('mysql2')->table('gold_live_price_jewellary_22k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateGoldJewellary22k()
    {
      $update = GoldLivePriceJewellary22k::where('gram','1')->update(['buy' => request()->input('1buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_gold_jewellary_22k.index');
    }

    public function indexMYUncangPerak()
    {
      return view($this->_config['view']);
    }

    public function editMYUncangPerak()
    {
      $data = DB::connection('mysql2')->table('silver_live_price_sap')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateMYUncangPerak()
    {
      // $gap_1_gram = GoldLivePriceGap::where('gram', '1')->update(['price' => request()->input('price_1_gram')]);
      $gap_1_gram = SilverLivePriceSap::find(1);
      $gap_1_gram->price =  request()->input('price_1_gram');
      $gap_1_gram->buyback =  request()->input('price_buyback');
      $gap_1_gram->save();

      $gap_100_price = SilverLivePriceSap::find(2);
      $gap_100_price->gram =  request()->input('price_100_price');
      $gap_100_price->save();

      // $gap_100_price = GoldLivePriceGap::where('price', '100')->update(['price' => request()->input('price_100_price')]);
      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.gold_live_price_sap.index');
    }

    public function indexSilverBar24k()
    {
      return view($this->_config['view']);
    }

    public function editSilverBar24k()
    {
      $data = DB::connection('mysql2')->table('silver_live_price_24k')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateSilverBar24k()
    {
      $gap_10_gram = SilverLivePriceBar::where('gram','100')->update(['sell' => request()->input('100sell')]);
      $gap_10_gram = SilverLivePriceBar::where('gram','100')->update(['buy' => request()->input('100buy')]);

      $gap_10_gram = SilverLivePriceBar::where('gram','250')->update(['sell' => request()->input('250sell')]);
      $gap_10_gram = SilverLivePriceBar::where('gram','250')->update(['buy' => request()->input('250buy')]);

      $gap_10_gram = SilverLivePriceBar::where('gram','500')->update(['sell' => request()->input('500sell')]);
      $gap_10_gram = SilverLivePriceBar::where('gram','500')->update(['buy' => request()->input('500buy')]);

      $gap_10_gram = SilverLivePriceBar::where('gram','1000')->update(['sell' => request()->input('1000sell')]);
      $gap_10_gram = SilverLivePriceBar::where('gram','1000')->update(['buy' => request()->input('1000buy')]);

      $gap_10_gram = SilverLivePriceBar::where('gram','5000')->update(['sell' => request()->input('5000sell')]);
      $gap_10_gram = SilverLivePriceBar::where('gram','5000')->update(['buy' => request()->input('5000buy')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.silver_live_price_silver_bar_24k.index');
    }

    public function indexSilverDirham24k()
    {
      return view($this->_config['view']);
    }

    public function editSilverDirham24k()
    {
      $data = DB::connection('mysql2')->table('silver_live_price_dirham')->get();
      // dd($data);
      return view($this->_config['view'], compact('data'));
    }

    public function updateSilverDirham24k()
    {
      $gap_10_gram = SilverLivePriceDirham::where('gram','10')->update(['sell' => request()->input('10sell')]);

      session()->flash('success', 'Price updated');
      return redirect()->route('admincustom2.catalog.silver_live_price_silver_dirham_24k.index');
    }
}
