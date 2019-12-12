<?php

namespace Artanis\LivePrice\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductReviewRepository;

class LivePriceController extends Controller
{

    protected $gold_live_price_gap;

    public function index()
    {
      $gold_live_price_gap = DB::table('gold_live_price_gap')->select('last_updated','gram','price')->get();
      // $gap = DB::table('customers')->get();
      // dd($gap);
       return view('liveapi')->with('gold_live_price_gap', $gold_live_price_gap);
       // return view($this->_config['view'], compact(['gap']));
    }

}
