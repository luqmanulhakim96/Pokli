<?php

namespace Webkul\Shop\DataGrids;

use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * OrderDataGrid class
 *
 * @author Rahul Shukla <rahulshkla.symfont517@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class GapSapBalanceDataGrid extends DataGrid
{
    protected $index = 'id'; //the column that needs to be treated as index column

    protected $sortOrder = 'desc'; //asc or desc

    public function prepareQueryBuilder()
    {
        $user = auth()->guard('customer')->user()->id;
        // dd($user);
        // DB::enableQueryLog();
        $queryBuilder = DB::table('gold_silver_history')
                ->addSelect('id', 'increment_id', 'product_type', 'amount', 'quantity', 'payment_on', 'status', 'activity')
                // ->where('status', 'completed')
                // ->orWhere('status', 'canceled')
                ->where('customer_id', auth()->guard('customer')->user()->id);
                // dd($queryBuilder);

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'payment_on',
            'label' => 'Date',
            'type' => 'datetime',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            // 'closure' => true,   
            'wrapper' => function ($value) {
                $date = date('d M Y', strtotime($value->payment_on));
                return $date;
            }
        ]);

        $this->addColumn([
            'index' => 'product_type',
            'label' => 'Type',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                return ucfirst($value->product_type);
            }
        ]);

        $this->addColumn([
            'index' => 'amount',
            'label' => 'Total',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                return 'RM'.$value->amount;
            }
        ]);

        $this->addColumn([
            'index' => 'activity',
            'label' => 'Type',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                return ucfirst($value->activity);
            }
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                return ucfirst($value->status);
            }
        ]);

        $this->addColumn([
            'index' => 'quantity',
            'label' => 'Quantity',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true,
            'closure' => true,
            'wrapper' => function ($value) {
                $activity = $value->activity;
                $status = $value->status;
                if($activity=='buyback' && $status!='processing')
                    // return '-'.$value->quantity.' g';
                    return '<a style="color:red">'.'-'.$value->quantity.' g'.'</a>';
                elseif($activity=='purchase' && $status!='processing')
                    // return $value->quantity.' g';
                    return '<a style="color:green">'.$value->quantity.' g'.'</a>';
                elseif($status=='processing')
                    return '<a>'.$value->quantity.' g'.'</a>';
            }
        ]);
        
    }

    public function prepareActions() {
        // $this->addAction([
        //     'type' => 'View',
        //     'method' => 'GET',
        //     'route' => 'customer.orders.view',
        //     'icon' => 'icon eye-icon'
        // ]);
    }
}