<?php

namespace Artanis\GapSap\Repositories;

use Artanis\GapSap\Models\GoldSilverHistory;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;
use Webkul\Core\Models\CoreConfig;

/**
 * Order Reposotory
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class GapSapBalanceRepository extends Repository
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
     * @param  Artanis\GapSap\Repositories\GoldSilverHistory                 $goldSilverHistoryRepository
     * @return void
     */
    public function __construct(
        GoldSilverHistory $goldSilverHistoryRepository,
        App $app
    )

    {
        $this->goldSilverHistoryRepository = $goldSilverHistoryRepository;

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

    public function cancel($orderId)
    {

    }

    public function goldBalance($id)
    {
        $user = new GoldSilverHistory;
        $purchase = $user->where([['customer_id',$id],['status','completed'],['product_type','gold'],['activity','purchase']])->sum('quantity');
        $buyback = $user->where([['customer_id',$id],['status','completed'],['product_type','gold'],['activity','buyback']])->sum('quantity');
        $gold = $purchase-$buyback;
        return $gold;
    }

    public function silverBalance($id)
    {
        $user = new GoldSilverHistory;
        $purchase = $user->where([['customer_id',$id],['status','completed'],['product_type','silver'],['activity','purchase']])->sum('quantity');
        $buyback = $user->where([['customer_id',$id],['status','completed'],['product_type','silver'],['activity','buyback']])->sum('quantity');
        $silver = $purchase-$buyback;
        return $silver;
    }

}