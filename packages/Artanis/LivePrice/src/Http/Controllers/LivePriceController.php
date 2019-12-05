<?php

namespace Artanis\LivePrice\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductReviewRepository;

class LivePriceController extends Controller
{

    protected $gap;

    public function index()
    {
      $gap = DB::table('gold_live_price_gap')->select('last_updated','gram','price')->get();
      dd($gap);
       // return view('liveprice')->with('gold_live_price_gap', $gap);
       return view($this->_config['view'], compact(['gap']));
    }

}
