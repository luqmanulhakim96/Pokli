<?php

namespace Artanis\GapSap\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Artanis\GapSap\Helpers\Ipn;
use Artanis\GapSap\Models\GoldSilverHistory;
use Billplz\Client;
use DateTime;

use Artanis\GapSap\Payment\BillPlz;
use Illuminate\Support\Facades\Config;
use Webkul\Payment\Payment\Payment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class StandardController extends Controller
{
    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * Ipn object
     *
     * @var array
     */
    protected $ipnHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        Ipn $ipnHelper
    )
    {
        $this->orderRepository = $orderRepository;

        $this->ipnHelper = $ipnHelper;
    }

    /**
     * Redirects to the billplz.
     *
     * @return \Illuminate\View\View
     */
    public function redirect()
    {
        return view('gapsap::redirect');
    }

    /**
     * Cancel payment from billplz.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('error', 'FPX payment has been canceled.');

        return redirect()->route('gapsap.index');
    }

    /**
     * Success payment
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        // $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        // Cart::deActivateCart();

        // session()->flash('order', $order);
        session()->flash('success', 'FPX payment successful.');

        return redirect()->route('gapsap.index');
    }

    public function verify()
    {
        $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
        $bill = $billplzCreate->bill();
        $data = $bill->redirect($_GET); //catch billplz payment
        $response = $data['paid'];
        // $date = new DateTime($data['paid_at']);
        // $datetime = date('Y-m-d h:i:s', strtotime($data['paid_at']));
        // dd($data['paid_at']->format('Y-m-d H:i:s'));
        if ($response == 'true')
        {
            $purchase = GoldSilverHistory::where('customer_id',auth()->guard('customer')->user()->id)->latest()->first();
            $purchase->status = 'paid';
            $purchase->purchase_on = $data['paid_at']->format('Y-m-d H:i:s');
            $purchase->purchase_status_datetime = $data['paid_at']->format('Y-m-d H:i:s');
            $purchase->save();
            // dd($purchase);
            return redirect()->route('gapsap.success');
        }
        else if ($response == 'false')
          return redirect()->route('gapsap.cancel');
    }

    public function ipn()
    {
        $this->ipnHelper->processIpn(request()->all());
    }

    public function redirectBillPlz()
    {
      $purchase = GoldSilverHistory::where('customer_id',auth()->guard('customer')->user()->id)->latest()->first();
      // dd($purchase->customer->email);

      // $cart = $this->getCart();
      // $billingAddress = $cart->billing_address;
      // $item = $this->getCartItems();
      // dd($cart);
      // dd($purchase->amount);

      $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
      $bill = $billplzCreate->bill();
      $response = $bill->create(
          'x7afhxzc', //collection id
          $purchase->customer->email, //user email
          null,
          $purchase->customer->first_name.' '.$purchase->customer->last_name, //user name
          \Duit\MYR::given($purchase->amount*100), //total price
          ['callback_url' => route('gapsap.verify'), 'redirect_url' => route('gapsap.verify')], //url
          $purchase->increment_id
      );
      // dd($response);
      $responseArray = $response->toArray();
      $url = $responseArray['url'];
      // dd($url);
      return redirect()->away($url);
    }
}
