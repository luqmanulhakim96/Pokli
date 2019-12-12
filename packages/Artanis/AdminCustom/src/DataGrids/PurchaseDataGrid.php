<?php

namespace Artanis\AdminCustom\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * OrderRefundDataGrid Class
 *
 * @author Prashant Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class PurchaseDataGrid extends DataGrid
{
    protected $index = 'id';

    protected $sortOrder = 'desc'; //asc or desc

    public function prepareQueryBuilder()
    {
        // $queryBuilder = DB::table('refunds')
        //         ->select('refunds.id', 'orders.increment_id', 'refunds.state', 'refunds.base_grand_total', 'refunds.created_at')
        //         ->leftJoin('orders', 'refunds.order_id', '=', 'orders.id')
        //         ->leftJoin('order_address as order_address_billing', function($leftJoin) {
        //             $leftJoin->on('order_address_billing.order_id', '=', 'orders.id')
        //                 ->where('order_address_billing.address_type', 'billing');
        //         })
        //         ->addSelect(DB::raw('CONCAT(order_address_billing.first_name, " ", order_address_billing.last_name) as billed_to'));

        // $this->addFilter('billed_to', DB::raw('CONCAT(order_address_billing.first_name, " ", order_address_billing.last_name)'));
        // $this->addFilter('id', 'refunds.id');
        // $this->addFilter('increment_id', 'orders.increment_id');
        // $this->addFilter('state', 'refunds.state');
        // $this->addFilter('base_grand_total', 'refunds.base_grand_total');
        // $this->addFilter('created_at', 'refunds.created_at');

        // $this->setQueryBuilder($queryBuilder);

        $queryBuilder = DB::table('gold_silver_history')
                ->select('increment_id' ,'id', 'product_type', 'current_price_per_gram', 'current_price_datetime', 'purchase_amount', 'purchase_quantity', 'purchase_type', 'purchase_on', 'purchase_status', 'purchase_attachment');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        // $this->addColumn([
        //     'index' => 'id',
        //     'label' => 'Id',
        //     'type' => 'number',
        //     'searchable' => false,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'increment_id',
            'label' => 'Id',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'product_type',
            'label' => 'Product Type',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->product_type == 'gold')
                    // return '<span class="badge badge-md badge-warning">Gold</span>';
                    return 'Gold';
                else if ($value->product_type == 'silver')
                    // return '<span class="badge badge-md badge-default">Silver</span>';
                    return 'Silver';
            }
        ]);

        $this->addColumn([
            'index' => 'purchase_amount',
            'label' => 'Purchase Amount',
            'type' => 'price',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'purchase_quantity',
            'label' => 'Purchase Quantity',
            'type' => 'float',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                return $value->purchase_quantity.' (g)';
            }
        ]);

        // $this->addColumn([
        //     'index' => 'current_price_per_gram',
        //     'label' => 'Current Price',
        //     'type' => 'price',
        //     'searchable' => true,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        // $this->addColumn([
        //     'index' => 'current_price_datetime',
        //     'label' => 'Price Updated',
        //     'type' => 'string',
        //     'searchable' => true,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'purchase_on',
            'label' => 'Purchase On',
            'type' => 'date',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'purchase_attachment',
            'label' => 'Purchase Attachement',
            'type' => 'string',
            'searchable' => true,
            'closure' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if (!$value->purchase_attachment) {
                    return 'Null';
                }
                else 
                    // return 'http://127.0.0.1:8000/storage/'.$value->purchase_attachment;
                    // return '<a href="http://127.0.0.1:8000/storage/' .$value->purchase_attachment. '"> Attachment </a>';
                    return '<a href="http://127.0.0.1:8000/storage/' .$value->purchase_attachment. '" target="_blank"> <img src="http://127.0.0.1:8000/storage/'.$value->purchase_attachment.'" alt="Smiley face" height="50" width="50"> </a>';
            }
        ]);

        $this->addColumn([
            'index' => 'purchase_type',
            'label' => 'Purchase Type',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->purchase_type == 'fpx')
                    return 'FPX';
                else if ($value->purchase_type == 'bankin')
                    return 'Bankin';
            }
        ]);

        $this->addColumn([
            'index' => 'purchase_status',
            'label' => 'Status',
            'type' => 'string',
            'sortable' => true,
            'searchable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->purchase_status == 'processing')
                    return '<span class="badge badge-md badge-success">Processing</span>';
                else if ($value->purchase_status == 'completed')
                    return '<span class="badge badge-md badge-success">Completed</span>';
                else if ($value->purchase_status == "canceled")
                    return '<span class="badge badge-md badge-danger">Canceled</span>';
                else if ($value->purchase_status == "closed")
                    return '<span class="badge badge-md badge-info">Closed</span>';
                else if ($value->purchase_status == "paid")
                    return '<span class="badge badge-md badge-warning">Paid</span>';
                else if ($value->purchase_status == "pending_payment")
                    return '<span class="badge badge-md badge-warning">Pending Payment</span>';
                else if ($value->purchase_status == "fraud")
                    return '<span class="badge badge-md badge-danger">Fraud</span>';
            }
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'title' => 'Order Refund View',
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'admincustom.sales.purchase.view',
            'icon' => 'icon eye-icon'
        ]);
    }
}