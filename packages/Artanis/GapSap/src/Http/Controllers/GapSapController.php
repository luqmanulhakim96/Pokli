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
use Artanis\GapSap\Repositories\PurchaseRepository;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use Artanis\GapSap\Mail\NewPurchaseGAPSAPNotification;
// use Artanis\GapSap\Mail\NewPurchaseGAPSAPAdminNotification;
use App\Mail\NewPurchaseGAPSAPAdminNotification;


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
    public function __construct(CustomerRepository $customerRepository, ProductReviewRepository $productReviewRepository, OrderRepository $orderRepository, PurchaseRepository $purchaseRepository)
    {
        $this->middleware('customer');

        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;

        $this->productReviewRepository = $productReviewRepository;

        $this->orderRepository = $orderRepository;

        $this->purchaseRepository = $purchaseRepository;
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

        $gold = DB::select('select * from live_price_api.gold_live_price_gap where gram = 1',[1]);
        $silver = DB::select('select * from live_price_api.silver_live_price_sap where gram = 100',[1]);
        $gold_price = $gold[0]->price;
        $silver_price = $silver[0]->price;
        $gold_datetime = $gold[0]->last_updated;
        $silver_datetime = $silver[0]->last_updated;
        // $gold_price = 207;
        // $silver_price = 274;

        $input = $request->all();
        // dd($input);

        // return redirect()->route('gapsap.index');

        return view($this->_config['view'], compact(['customer', 'input','gold_price','silver_price', 'gold_datetime', 'silver_datetime']));
    }

    public function formSubmit(Request $request)
    {


        $input = $request->all();
        // dd($input);
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $history = new GoldSilverHistory;
        $history->increment_id = $this->purchaseRepository->generateIncrementId();
        $history->activity = 'purchase';
        $history->product_type = $input['product_type'];
        $history->current_price_per_gram = $input['current_price_per_gram'];
        $history->current_price_datetime = $input['current_price_datetime'] ?? now();
        $history->amount = $input['amount'];
        $history->quantity = $input['quantity'];

        // $order = $this->create(array_merge($input['increment_id'], ['increment_id' => $this->orderRepository->generateIncrementId()]));
        // $order = $this->orderRepository->generateIncrementId();
        // dd($order);

        $history->customer_id = $input['customer_id'];
        $history->payment_method = $input['payment_method'];
        if($history->payment_method =='fpx'){
            $history->status = 'processing';
        }
        else if($history->payment_method=='bankin'){
            $history->status = 'processing';
        }
        $history->payment_on = date('Y-m-d H:i:s', strtotime($input['date_of_payment'] ?? now())) ?? now();
        $history->payment_attachment = $input['payment_attachment'] ?? null;
        if($history->payment_attachment){
            $history->payment_attachment = $history->payment_attachment->store('uploads', 'public');
        }
        // $history->status = $input['status'];
        // $history->purchase_status_datetime = now();
        // dd($history);
        // dd($history->payment_attachment->store('uploads', 'public'));
        $history->save();
        if($history->payment_method == 'fpx'){
            return view('gapsap::redirect', compact(['input']));
        }
        else if($history->payment_method=='bankin'){
            Mail::send(new NewPurchaseGAPSAPAdminNotification($history));
            Mail::send(new NewPurchaseGAPSAPNotification($history));
            session()->flash('success', 'MYUncang Success. The new balance will be updated in 24 hours.');
            // return redirect()->route('gapsap.index');
            return redirect('/customer/account/purchase');
        }
    }

}
