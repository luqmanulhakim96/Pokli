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

class StandardController extends Controller
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
        return view('billplz::redirect');
    }

    /**
     * Cancel payment from billplz.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('error', 'FPX payment has been canceled.');

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

        $order = $this->orderRepository->create(Cart::prepareDataForOrder());
        // dd($order->id);
        $add_transaction_id = DB::table('order_payment')->where('order_id', $order->id)->update(['transaction_id'=>$transaction_id]);
        // dd($add_transaction_id);
        // view the query log
        // dd(DB::getQueryLog());
        Cart::deActivateCart();

        session()->flash('order', $order);

        return redirect()->route('shop.checkout.success');
    }

    public function verify()
    {
        // $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
        $billplzCreate = Client::make('cd98195a-0457-415a-8cc7-d013c86f05a5', 'S-gji-HhnXvrRpcfGB5NQvzA') ##production
        $bill = $billplzCreate->bill();
        $data = $bill->redirect($_GET); //catch billplz payment
        $response = $data['paid'];
        $transaction_id = $data['id'];
        if ($response == true)
          return redirect()->route('billplz.success',['transaction_id'=>$transaction_id]);
        else if ($response == false)
          return redirect()->route('billplz.cancel');
    }

    public function ipn()
    {
        $this->ipnHelper->processIpn(request()->all());
    }

    public function redirectBillPlz()
    {

      $cart = $this->getCart();
      $billingAddress = $cart->billing_address;
      $item = $this->getCartItems();

      // $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
      $billplzCreate = Client::make('cd98195a-0457-415a-8cc7-d013c86f05a5', 'S-gji-HhnXvrRpcfGB5NQvzA') ##production
      $bill = $billplzCreate->bill();
      $response = $bill->create(
          'scqd4tln', //collection id
          $billingAddress->email, //user email
          null,
          $billingAddress->first_name.' '.$billingAddress->last_name, //user name
          \Duit\MYR::given($cart->grand_total*100), //total price
          ['callback_url' => route('billplz.verify'), 'redirect_url' => route('billplz.verify')], //url
          "POKLI Wealth Management"
      );
      $responseArray = $response->toArray();
      $url = $responseArray['url'];
      return redirect()->away($url);
    }
}
