<?php

namespace Artanis\BillPlz\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Artanis\BillPlz\Helpers\Ipn;
use Billplz\Client;
use Artanis\BillPlz\Payment\BillPlz;
use Illuminate\Support\Facades\Config;
use Webkul\Payment\Payment\Payment;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Carbon\Carbon;
use App\EasyPurchasePaymentRecord;


class EPPFourMonthsController extends Controller
{

    protected $cart;
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


    public function setCart()
    {
        if (! $this->cart)
            $this->cart = Cart::getCart();
    }

    /**
     * Returns cart insrance
     *
     * @var mixed
     */
    public function getCart()
    {
        if (! $this->cart)
            $this->setCart();

        return $this->cart;
    }

    /**
     * Return paypal redirect url
     *
     * @var Collection
     */
    public function getCartItems()
    {
        if (! $this->cart)
            $this->setCart();

        return $this->cart->items;
    }

    /**
     * Redirects to the billplz.
     *
     * @return \Illuminate\View\View
     */
    public function redirect()
    {
        return view('billplz::review');
    }

    /**
     * Cancel payment from billplz.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('error', 'Purchase has been canceled.');

        return redirect()->route('shop.checkout.cart.index');
    }

    /**
     * Success payment
     *
     * @return \Illuminate\Http\Response
     */
    public function success($transaction_id)
    {
        // enable the query log
        // DB::enableQueryLog();

        // $order = $this->orderRepository->create(Cart::prepareDataForOrder());
        // // dd($order->id);
        // $add_transaction_id = DB::table('order_payment')->where('order_id', $order->id)->update(['transaction_id'=>$transaction_id]);
        // // dd($add_transaction_id);
        // // view the query log
        // // dd(DB::getQueryLog());
        // Cart::deActivateCart();
        //
        // session()->flash('order', $order);
        //
        // return redirect()->route('shop.checkout.success');
    }

    public function store()
    {
      $data = $this->calculatePriceFourMonthsPassValue();
      // dd($data);

      $order = $this->orderRepository->create(Cart::prepareDataForOrder());
      // dd($order->cart_id);
      // dd($order->customer->id);

      $update_grand_total_cart = DB::table('cart')->where('id',$order->cart_id)->update(['grand_total'=>$data['total_price']]);

      $update_base_grand_total_cart = DB::table('cart')->where('id',$order->cart_id)->update(['base_grand_total'=>$data['total_price']]);

      for ($i=0; $i < $data['num_of_month']; $i++) {
        $epp = new EasyPurchasePaymentRecord;
        // $epp->date_payment = $data['date'][$i];
        $epp->date_payment = Carbon::parse($data['date'][$i])->format('Y-m-d');
        $epp->monthly_price = $data['monthly_price'];
        $epp->order_id = $order->id;
        $epp->payment_status = "Pending";
        $epp->total_purchase = $data['total_price'];
        $epp->customer_id = $order->customer->id;
        // dd($epp);
        $epp->save();
      }

      Cart::deActivateCart();

      $update_grand_total = DB::table('orders')->where('id', $order->id)->update(['grand_total'=>$data['total_price']]);

      $update_base_grand_total = DB::table('orders')->where('id', $order->id)->update(['base_grand_total'=>$data['total_price']]);


      session()->flash('order', $order);

      return redirect()->route('shop.checkout.success');
    }

    public function calculatePriceFourMonths()
    {

      $cart = $this->getCart();
      $billingAddress = $cart->billing_address;
      $item = $this->getCartItems();
      // $grand_total = $cart->grand_total;
      $total_price  = $cart->sub_total + (0.05 * $cart->sub_total);
      $total_price = $total_price + $cart->selected_shipping_rate->base_price;
      $monthly_price = round($total_price/4, 2);
      $total_price = $monthly_price * 4;
      $num_of_month = 4;


      $date = [];
      $today = Carbon::today()->toDateString();
      for ($i = 0; $i < 4; $i++) {
          $date[]=Carbon::parse($today);
            $today = Carbon::parse($today)->addMonths(1)->toDateString();
      }
      // dd($date);
      //
      // for ($i=1; $i < 4; $i++) {
      //   $date[] = $date[$i-1]->addMonths(1);
      //   print_r($date[$i]);
      // }
      // print_r($date[0]);
      // die();

      // return redirect()->away($url);

      return view('billplz::review', compact('total_price','monthly_price', 'cart', 'date', 'num_of_month'));
    }

    public function calculatePriceFourMonthsPassValue()
    {

      $cart = $this->getCart();
      $billingAddress = $cart->billing_address;
      $item = $this->getCartItems();
      // $grand_total = $cart->grand_total;
      $total_price  = $cart->sub_total + (0.5 * $cart->sub_total);
      $total_price = $total_price + $cart->selected_shipping_rate->base_price;
      $monthly_price = round($total_price/4, 2);
      $total_price = $monthly_price * 4;
      $num_of_month = 4;


      $date = [];
      $today = Carbon::today()->toDateString();
      for ($i = 0; $i < 4; $i++) {
          $date[]=Carbon::parse($today);
            $today = Carbon::parse($today)->addMonths(1)->toDateString();
      }

      $data['num_of_month'] = $num_of_month;
      $data['monthly_price'] = $monthly_price;
      $data['date'] = $date;
      $data['total_price'] = $total_price;

      return $data;
    }
}
