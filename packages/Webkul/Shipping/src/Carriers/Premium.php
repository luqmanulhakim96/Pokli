<?php

namespace Webkul\Shipping\Carriers;

use Config;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Facades\Cart;
use DB;

/**
 * Class Rate.
 *
 */
class Premium extends AbstractShipping
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'premium';

    /**
     * Returns rate for flatrate
     *
     * @return array
     */
    public function calculate()
    {
        if (! $this->isAvailable())
            return false;

        $cart = Cart::getCart();

        $object = new CartShippingRate;

        $object->carrier = 'premium';
        $object->carrier_title = $this->getConfigData('title');
        $object->method = 'premium';
        $object->method_title = $this->getConfigData('title');
        $object->method_description = $this->getConfigData('description');
        $object->price = 0;
        $object->base_price = 0;

        // if ($this->getConfigData('type') == 'per_unit') {
            foreach ($cart->items as $item) {
                if ($item->product->getTypeInstance()->isStockable()) {
                    $premium_price = DB::table('product_flat')->select('Premium')->where('id', $item->product->id)->first();
                    // dd($item);
                    // dd($premium_price);
                    $premium_price = (float)$premium_price->Premium;
                    $object->price += core()->convertPrice($premium_price) * $item->quantity;
                    $object->base_price += core()->convertPrice($premium_price) * $item->quantity;
                    // dd($item);
                }
            }
        // }
        // else {
        //     $object->price = core()->convertPrice($this->getConfigData('default_rate'));
        //     $object->base_price = $this->getConfigData('default_rate');
        // }

        return $object;
    }
}
