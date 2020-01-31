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
    public function success()
    {
        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        session()->flash('order', $order);

        return redirect()->route('shop.checkout.success');
    }

    public function verify()
    {
        $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
        $bill = $billplzCreate->bill();
        $data = $bill->redirect($_GET); //catch billplz payment
        $response = $data['paid'];
        if ($response == 'true')
          return redirect()->route('billplz.success');
        else if ($response == 'false')
          return redirect()->route('billplz.cancel');
    }

    public function ipn()
    {
        $this->ipnHelper->processIpn(request()->all());
    }

    public function redirectAway()
    {

      $cart = $this->getCart();
      $billingAddress = $cart->billing_address;
      $item = $this->getCartItems();

      $billplzCreate = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg')->useSandbox();
      $bill = $billplzCreate->bill();
      $response = $bill->create(
          'x7afhxzc', //collection id
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
