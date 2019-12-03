<?php

namespace Artanis\BillPlz\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Artanis\BillPlz\Helpers\Ipn;
use Billplz\Client;

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
        if($response == TRUE)
          return redirect()->route('billplz.success');
        else if ($response == FALSE)
          return redirect()->route('billplz.cancel');
    }

    public function ipn()
    {
        $this->ipnHelper->processIpn(request()->all());
    }
}
