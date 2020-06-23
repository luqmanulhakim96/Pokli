<?php

namespace Artanis\AdminCustom\Http\Controllers\Sales;

use Artanis\AdminCustom\Http\Controllers\Controller;
use Artanis\GapSap\Repositories\BuybackRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\RefundRepository;
use Artanis\GapSap\Models\GoldSilverHistory;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Artanis\AdminCustom\Mail\NewBuybackGAPSAPInvoiceNotification;


/**
 * Sales Refund controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class BuybackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @var array
     */
    protected $_config;

    /**
     * OrderRepository object
     *
     * @var Object
     */
    protected $orderRepository;

    /**
     * OrderItemRepository object
     *
     * @var Object
     */
    protected $orderItemRepository;

    /**
     * RefundRepository object
     *
     * @var Object
     */
    protected $refundRepository;

    /**
     * BuybackRepository object
     *
     * @var Object
     */
    protected $buybackRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository     $orderRepository
     * @param  \Webkul\Sales\Repositories\OrderItemRepository $orderItemRepository
     * @param  \Webkul\Sales\Repositories\RefundRepository    $refundRepository
     * @param  \Artanis\AdminCustom\Repositories\BuybackRepository    $buybackRepository
     * @return void
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        OrderItemRepository $orderItemRepository,
        RefundRepository $refundRepository,
        BuybackRepository $buybackRepository
    )
    {
        $this->middleware('admin');

        $this->_config = request('_config');

        $this->orderRepository = $orderRepository;

        $this->orderItemRepository = $orderItemRepository;

        $this->refundRepository = $refundRepository;

        $this->buybackRepository = $buybackRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        return view($this->_config['view']);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\View
     */
    public function view($id)
    {
        $result = $this->buybackRepository->findOrFail($id);
        // dd($result);
        if ($result){
            $purchase = $this->buybackRepository->findOrFail($id);
            // dd($purchase);
            return view($this->_config['view'], compact(['purchase']));
        }
        else{
            session()->flash('error', 'Purchase not valid.');
            return redirect()->back();
        }
    }

    /**
     * Cancel action for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $result = $this->buybackRepository->cancel($id);

        if ($result) {
            session()->flash('success', 'Purchase canceled successfully.');
        } else {
            session()->flash('error', 'Purchase can not be canceled.');
        }

        return redirect()->back();
    }

    /**
     * Cancel action for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $result = $this->buybackRepository->confirm($id);
        $buyback = $this->buybackRepository->findOrFail($id);
        if ($result) {
            Mail::send(new NewBuybackGAPSAPInvoiceNotification($buyback));
            session()->flash('success', 'Buyback confirmation successfully.');
        } else {
            session()->flash('error', 'Buyback can not be confirm. Insufficient balance.');
        }

        return redirect()->back();
    }

    public function print($id)
    {
        $invoice = $this->buybackRepository->findOrFail($id);
        $purchase = $this->buybackRepository->findOrFail($id);

        #calculate balance gold
        $purchaseGold = GoldSilverHistory::where('customer_id', $purchase->customer->id)->where('activity', 'purchase')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');
        $buybackGold = GoldSilverHistory::where('customer_id', $purchase->customer->id)->where('activity', 'buyback')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');

        $balanceGold =  $purchaseGold-$buybackGold;

        #calculate balance silver
        $purchaseSilver = GoldSilverHistory::where('customer_id',  $purchase->customer->id)->where('activity', 'purchase')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');
        $buybackSilver = GoldSilverHistory::where('customer_id',  $purchase->customer->id)->where('activity', 'buyback')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');

        $balanceSilver = $purchaseSilver-$buybackSilver;


        $pdf = PDF::loadView('gapsap::customers.account.buyback.pdf', compact(['purchase','balanceGold','balanceSilver']))->setPaper('a4');

        return $pdf->download('admin-' . $invoice->created_at->format('d-m-Y') . '.pdf');
    }

    public function upload($id)
    {
      $result = $this->buybackRepository->findOrFail($id);
      // dd($result);
      if ($result){
          $purchase = $this->buybackRepository->findOrFail($id);
          // dd($purchase);
          return view($this->_config['view'], compact(['purchase']));
      }
    }

    public function update($id)
    {
          $buyback_data = GoldSilverHistory::find($id);
          $receipt = request()->payment_attachment;

          $buyback_data->payment_attachment = $receipt ?? null;
          if($buyback_data->payment_attachment){
              $buyback_data->payment_attachment = $buyback_data->payment_attachment->store('uploads', 'public');
          }
          $buyback_data->save();

          session()->flash('success', 'Receipt Uploaded.');

          return redirect('/admin/sales/buyback');
    }
}
