<?php

namespace Artanis\GapSap\Http\Controllers;

use Artanis\GapSap\Models\GoldSilverHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Sales\Repositories\OrderRepository;

/**
 * Customer controlller for the customer basically for the tasks of customers which will be
 * done after customer authentication.
 *
 * @author  Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class GapSapController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var Object
    */
    protected $customerRepository;

    /**
     * ProductReviewRepository object
     *
     * @var array
    */
    protected $productReviewRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository $customer
     * @param  \Webkul\Product\Repositories\ProductReviewRepository $productReview
     * @return void
    */
    public function __construct(CustomerRepository $customerRepository, ProductReviewRepository $productReviewRepository, OrderRepository $orderRepository)
    {
        $this->middleware('customer');

        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;

        $this->productReviewRepository = $productReviewRepository;

        $this->orderRepository = $orderRepository;
    }

    /**
     * Taking the customer to profile details page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        
        return view($this->_config['view'], compact(['customer']));
    }

    /**
     * For loading the edit form page.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        
    }

    public function form(Request $request)
    {
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);

        $gold_price = 207;
        $silver_price = 274;

        $input = $request->all();
        // dd($input);

        // return redirect()->route('gapsap.index');
        
        return view($this->_config['view'], compact(['customer', 'input','gold_price','silver_price']));
    }

    public function formSubmit(Request $request)
    {

        
        $input = $request->all();
        // dd($input);
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $history = new GoldSilverHistory;
        $history->increment_id = $this->orderRepository->generateIncrementId();
        $history->product_type = $input['product_type'];
        $history->current_price_per_gram = $input['current_price_per_gram'];
        $history->current_price_datetime = $input['current_price_datetime'] ?? now();
        $history->purchase_amount = $input['purchase_amount'];
        $history->purchase_quantity = $input['purchase_quantity'];

        // $order = $this->create(array_merge($input['increment_id'], ['increment_id' => $this->orderRepository->generateIncrementId()]));
        // $order = $this->orderRepository->generateIncrementId();
        // dd($order);

        $history->customer_id = $input['customer_id'];
        $history->purchase_type = $input['mode_of_payment'];
        if($history->purchase_type=='fpx'){
            $history->purchase_status = 'processing';
        }
        else if($history->purchase_type=='bankin'){
            $history->purchase_status = 'processing';
        }
        $history->purchase_on = date('Y-m-d h:i:s', strtotime($input['date_of_payment'] ?? now())) ?? now();
        $history->purchase_attachment = $input['attachment_bankin'] ?? null;
        if($history->purchase_attachment){
            $history->purchase_attachment = $history->purchase_attachment->store('uploads', 'public');
        }
        // $history->purchase_status = $input['purchase_status'];
        // $history->purchase_status_datetime = now();
        // dd($history);
        // dd($history->purchase_attachment->store('uploads', 'public'));
        $history->save();

        if($history->purchase_type=='fpx'){
            return view('gapsap::redirect', compact(['input']));
        }
        else if($history->purchase_type=='bankin'){
            return redirect()->route('gapsap.index');
        }
    }

}
