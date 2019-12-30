<?php

namespace Artanis\GapSap\Repositories;

use Artanis\GapSap\Models\GoldSilverHistory;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;
use Webkul\Sales\Contracts\Order;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Core\Models\CoreConfig;

/**
 * Order Reposotory
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class BuybackRepository extends Repository
{
    /**
     * OrderItemRepository object
     *
     * @var Object
     */
    // protected $orderItemRepository;
    protected $goldSilverHistoryRepository;

    /**
     * DownloadableLinkPurchasedRepository object
     *
     * @var Object
     */
    // protected $downloadableLinkPurchasedRepository;

    /**
     * Create a new repository instance.
     *
     * @param  Webkul\Sales\Repositories\OrderItemRepository                 $orderItemRepository
     * @param  Artanis\GapSap\Repositories\GoldSilverHistory                 $goldSilverHistoryRepository
     * @param  Webkul\Sales\Repositories\DownloadableLinkPurchasedRepository $downloadableLinkPurchasedRepository
     * @return void
     */
    public function __construct(
        // OrderItemRepository $orderItemRepository,
        GoldSilverHistory $goldSilverHistoryRepository,
        // DownloadableLinkPurchasedRepository $downloadableLinkPurchasedRepository,
        App $app
    )
    {
        // $this->orderItemRepository = $orderItemRepository;
        $this->goldSilverHistoryRepository = $goldSilverHistoryRepository;

        // $this->downloadableLinkPurchasedRepository = $downloadableLinkPurchasedRepository;

        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return Mixed
     */

    function model()
    {
        return GoldSilverHistory::class;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {

    }

    /**
     * @param int $orderId
     * @return mixed
     */
    public function cancel($orderId)
    {
        $order = $this->findOrFail($orderId);
        if (! $order->canCancel())
            return false;
        $order->status = 'canceled';
        $order->save();
        return true;
        // dd($order);

    }

    /**
     * @param int $orderId
     * @return mixed
     */
    public function confirm($orderId)
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        if($this->check($orderId))
        {
            $order = $this->findOrFail($orderId);
            if (! $order->canConfirm())
                return false;
            $order->status = 'completed';
            $order->invoice_id = $this->generateInvoiceId();
            $order->status_datetime = now();
            $order->save();
            return true;
        }
        else   
            return false;
        
        // dd($order);

    }

    public function check($orderId)
    {
        $history = $this->model->where('activity','buyback')->where('id', $orderId)->first();
        return $this->goldBalance($history);
        // dd($this->goldBalance($history));
        // if($history){
        //     return true;
        // }
        // else
        //     return false;

    }

    public function goldBalance(GoldSilverHistory $history)
    {
        $user = new GoldSilverHistory;
        $plus = $user->where([['customer_id',$history->customer_id],['status','completed'],['product_type',$history->product_type],['activity','purchase']])->sum('quantity');
        $minus = $user->where([['customer_id',$history->customer_id],['status','completed'],['product_type',$history->product_type],['activity', 'buyback']])->sum('quantity');
        $balance = $plus-$minus;
        // dd($history->quantity);
        if($history->quantity<=$balance)
            return true;
        else    
            return false;
    }

    /**
     * @return integer
     */
    public function generateIncrementId()
    {
        $config = new CoreConfig();
        $prefix = 'B';
        $lastPurchase = new GoldSilverHistory;
        // $increment_id = $lastPurchase->orderBy('id', 'desc')->limit(1)->first() ? $lastPurchase->orderBy('id', 'desc')->limit(1)->first()->increment_id : 'PWM000002';
        // $number = preg_replace('/[^0-9]/', '', $increment_id)+1;
        // $number = 1;
        // $number = sprintf("%s%s", $prefix, str_pad($number, 6, "0", STR_PAD_LEFT));
        // dd($number);
        $increment_id = $lastPurchase->orderBy('increment_id', 'desc')->limit(1)->first() ? $lastPurchase->orderBy('id', 'desc')->limit(1)->first()->increment_id : 'PWM000002';
        if(!$increment_id)
            $increment_id = '000000';
        $invoiceNumber = preg_replace('/[^0-9]/', '', $increment_id)+1;
        // $number = 1;
        $invoiceNumber = sprintf("%s%s", $prefix, str_pad($invoiceNumber, 6, "0", STR_PAD_LEFT));
        // dd($number);

        // $invoiceNumberPrefix = $config->where('code','=',"sales.orderSettings.order_number.order_number_prefix")->first()
        //     ? $config->where('code','=',"sales.orderSettings.order_number.order_number_prefix")->first()->value : false;

        // $invoiceNumberLength = $config->where('code','=',"sales.orderSettings.order_number.order_number_length")->first()
        //     ? $config->where('code','=',"sales.orderSettings.order_number.order_number_length")->first()->value : false;

        // $invoiceNumberSuffix = $config->where('code','=',"sales.orderSettings.order_number.order_number_suffix")->first()
        //     ? $config->where('code','=',"sales.orderSettings.order_number.order_number_suffix")->first()->value: false;

        // $lastOrder = $this->model->orderBy('id', 'desc')->limit(1)->first();
        // $lastId = $lastOrder ? $lastOrder->id : 0;

        // if ($invoiceNumberLength && ( $invoiceNumberPrefix || $invoiceNumberSuffix) ) {
        //     // Default one is not accurate. 
        //     // Source https://stackoverflow.com/questions/33602376/php-mysql-generate-invoice-number-from-an-integer-from-the-database
        //     // $invoiceNumber = $invoiceNumberPrefix . sprintf("%0{$invoiceNumberLength}d", 0) . ($lastId + 1) . $invoiceNumberSuffix;
        //     $invoiceNumber = sprintf("%s%s%s", $invoiceNumberPrefix, str_pad($lastId+1, 6, "0", STR_PAD_LEFT), $invoiceNumberSuffix);
        // } else {
        //     $invoiceNumber = $lastId + 1;
        // }

        return $invoiceNumber;
    }

    public function generateInvoiceId()
    {
        $config = new CoreConfig();
        $prefix = 'BB';
        $lastPurchase = new GoldSilverHistory;

        $increment_id = $lastPurchase->where('activity', 'buyback')->orderBy('invoice_id', 'desc')->limit(1)->first()->invoice_id 
                        ? $lastPurchase->where('activity', 'buyback')->orderBy('invoice_id', 'desc')->limit(1)->first()->invoice_id : '000000';

        $invoiceNumber = preg_replace('/[^0-9]/', '', $increment_id)+1;

        $invoiceNumber = sprintf("%s%s", $prefix, str_pad($invoiceNumber, 6, "0", STR_PAD_LEFT));

        return $invoiceNumber;
    }

    /**
     * @param mixed $order
     * @return void
     */
    public function isInCompletedState($order)
    {

    }

    /**
     * @param mixed $order
     * @return void
     */
    public function isInCanceledState($order)
    {

    }

    /**
     * @param mixed $order
     * @return void
     */
    public function isInClosedState($order)
    {

    }

    /**
     * @param mixed $order
     * @return void
     */
    public function updateOrderStatus($order)
    {

    }

    /**
     * @param mixed $order
     * @return mixed
     */
    public function collectTotals($order)
    {

    }
}