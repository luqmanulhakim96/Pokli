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
use Artanis\GapSap\Repositories\BuybackRepository;
use Artanis\GapSap\Repositories\GapSapBalanceRepository;
use Illuminate\Support\Facades\DB;
use PDF;

use Illuminate\Support\Facades\Mail;
use Artanis\GapSap\Mail\NewPurchaseGAPSAPNotification;

/**
 * Customer controlller for the customer basically for the tasks of customers which will be
 * done after customer authentication.
 *
 * @author  Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class BuybackController extends Controller
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
    public function __construct(CustomerRepository $customerRepository, ProductReviewRepository $productReviewRepository, OrderRepository $orderRepository, PurchaseRepository $purchaseRepository, GapSapBalanceRepository $gapSapBalanceRepository, BuybackRepository $buybackRepository)
    {
        $this->middleware('customer');

        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;

        $this->productReviewRepository = $productReviewRepository;

        $this->orderRepository = $orderRepository;

        $this->purchaseRepository = $purchaseRepository;

        $this->gapSapBalanceRepository = $gapSapBalanceRepository;

        $this->buybackRepository = $buybackRepository;
    }

    /**
     * Taking the customer to profile details page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        $gold_balance = $this->gapSapBalanceRepository->goldBalance($customer->id);
        $silver_balance = $this->gapSapBalanceRepository->silverBalance($customer->id);
        // dd($gold_balance);
        // $gold = DB::connection('mysql2')->select('gold_live_price_gap');
        $gold_price = 191;
        $silver_price = 2.37;
        // $gold = DB::select('select * from live_price_api.gold_live_price_gap where gram = 1',[1]);
        // $silver = DB::select('select * from live_price_api.silver_live_price_sap where gram != 1',[1]);
        // $gold_price = $gold[0]->price;
        // $silver_price = $silver[0]->price;

        $current_price_datetime = '2019-12-18 16:44:57';
        return view($this->_config['view'], compact(['customer','gold_price','silver_price', 'gold_balance', 'silver_balance', 'current_price_datetime']));
    }

    public function index2()
    {
        return view($this->_config['view']);
    }

    /**
     * For loading the edit form page.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {

    }

    /**
     * For loading the confirm form page.
     *
     * @return \Illuminate\View\View
     */
    public function confirm(Request $request)
    {
        $input = $request->all();
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        // dd($input);
        $gold_price = 191;
        $silver_price = 2.37;
        return view($this->_config['view'], compact(['customer','input']));
    }

    public function confirmSubmit(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        // dd($input);
        $history = new GoldSilverHistory;
        $history->activity = 'buyback';
        $history->increment_id = $this->buybackRepository->generateIncrementId();
        $history->product_type = $input['product_type'];
        $history->current_price_per_gram = $input['current_price_per_gram'];
        $history->current_price_datetime = $input['current_price_datetime'];
        $history->amount = $input['amount'];
        $history->quantity = $input['quantity'];
        $history->status = 'processing';
        $history->payment_on = $input['buyback_datetime'];
        $history->customer_id = $customer->id;
        $history->save();

        Mail::send(new NewBuybackGAPSAPNotification($history));
        session()->flash('success', 'Buyback Success.  The new balance will be updated in 24 hours.');
        return redirect()->route('gapsap.buyback.index');
    }

    public function form(Request $request)
    {
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);

        $gold_price = 207;
        $silver_price = 274;

        $input = $request->all();

        return view($this->_config['view'], compact(['customer', 'input','gold_price','silver_price']));
    }

    public function formSubmit(Request $request)
    {


        $input = $request->all();
        // dd($input);
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $history = new GoldSilverHistory;
        $history->increment_id = $this->purchaseRepository->generateIncrementId();
        $history->product_type = $input['product_type'];
        $history->current_price_per_gram = $input['current_price_per_gram'];
        $history->current_price_datetime = $input['current_price_datetime'] ?? now();
        $history->purchase_amount = $input['purchase_amount'];
        $history->purchase_quantity = $input['purchase_quantity'];

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

    public function view($id)
    {
        // $order = $this->orderRepository->findOrFail($id);
        $purchase = $this->purchaseRepository->findOrFail($id);
        // dd($id);

        return view($this->_config['view'], compact(['purchase']));
    }

    public function print($id)
    {
        $invoice = $this->purchaseRepository->findOrFail($id);
        $purchase = $this->purchaseRepository->findOrFail($id);

        #calculate balance gold
        $purchaseGold = GoldSilverHistory::where('customer_id', $purchase->customer->id)->where('activity', 'purchase')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');
        $buybackGold = GoldSilverHistory::where('customer_id', $purchase->customer->id)->where('activity', 'buyback')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');

        $balanceGold =  $purchaseGold-$buybackGold;

        #calculate balance silver
        $purchaseSilver = GoldSilverHistory::where('customer_id',  $purchase->customer->id)->where('activity', 'purchase')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');
        $buybackSilver = GoldSilverHistory::where('customer_id',  $purchase->customer->id)->where('activity', 'buyback')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');

        $balanceSilver = $purchaseSilver-$buybackSilver;


        $pdf = PDF::loadView('gapsap::customers.account.buyback.pdf', compact(['purchase','balanceGold','balanceSilver']))->setPaper('a4');

        return $pdf->download('invoice-' . $invoice->created_at->format('d-m-Y') . '.pdf');

        // return view($this->_config['view'], compact(['purchase']));
    }

}
