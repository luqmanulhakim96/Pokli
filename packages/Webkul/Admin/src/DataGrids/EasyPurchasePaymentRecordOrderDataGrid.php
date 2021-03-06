<?php

// namespace Artanis\AdminCustom2\DataGrids;
namespace Webkul\Admin\DataGrids;

use App\EasyPurchasePaymentRecord;
use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * ProductDataGrid Class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class EasyPurchasePaymentRecordOrderDataGrid extends DataGrid
{
    protected $sortOrder = 'desc'; //asc or desc

    protected $index = 'id';

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {
        $order_id = request()->route('id');

        $queryBuilder = DB::table('easy_payment_purchase_record')
                ->leftJoin('orders', function($leftJoin) {
                    $leftJoin->on('orders.id', '=', 'easy_payment_purchase_record.order_id');
                })
                ->addSelect('easy_payment_purchase_record.id as id' , 'easy_payment_purchase_record.order_id as epp_order_id', 'easy_payment_purchase_record.monthly_price as monthly_price', 'easy_payment_purchase_record.date_payment as date_payment', 'easy_payment_purchase_record.payment_status as payment_status', 'orders.increment_id as order_id', 'easy_payment_purchase_record.total_purchase as total_purchase', 'easy_payment_purchase_record.created_at as created_at')
                ->groupBy('easy_payment_purchase_record.id');

        $queryBuilder->where('easy_payment_purchase_record.order_id', $order_id);

        // $this->addFilter('id', 'easy_payment_purchase_record.id');
        // $this->addFilter('product_name', 'product_flat.name');
        // $this->addFilter('product_sku', 'product_flat.sku');

        $this->setQueryBuilder($queryBuilder);

    }

    public function addColumns()
    {
        // $this->addColumn([
        //     'index' => 'id',
        //     'label' => 'ID',
        //     'type' => 'number',
        //     'searchable' => false,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'order_id',
            'label' => 'Order ID',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->epp_order_id == NULL)
                    return '<span class="badge badge-md badge-warning">Unavailable</span>';
                else{
                    $link = route('admin.sales.orders.view', ['id' => $value->epp_order_id]);
                    return '<span class="badge badge-md badge-available"><a href="'.$link.'">'.$value->order_id.'</a></span>';
                }
            }
        ]);

        $this->addColumn([
            'index' => 'monthly_price',
            'label' => trans('Monthly Price (RM)'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'total_purchase',
            'label' => 'Total Purchase (RM)',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        // $this->addColumn([
        //     'index' => 'created_at',
        //     'label' => trans('Date Created'),
        //     'type' => 'string',
        //     'searchable' => false,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'date_payment',
            'label' => trans('Date of Payment'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'payment_status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->payment_status == 'Pending')
                    return '<span class="badge badge-md badge-warning">Pending</span>';
                else
                    return '<span class="badge badge-md badge-success">Paid</span>';
            }
        ]);

        // $this->addColumn([
        //     'index' => 'total_purchase',
        //     'label' => 'Total Purchase (RM)',
        //     'type' => 'string',
        //     'searchable' => true,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);
    }

    public function prepareActions() {
      // $this->addAction([
      //     'title' => 'Records',
      //     'condition' => function() {
      //         return true;
      //     },
      //     'method' => 'GET', // use GET request only for redirect purposes
      //     'route' => 'admincustom2.catalog.easy_purchase_payment.records.index',
      //     'icon' => 'icon eye-icon'
      // ]);
        $this->addAction([
            'title' => 'Update Payment Status',
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'admincustom2.catalog.easy_purchase_payment.update_status',
            'confirm_text' => 'Payment Status Updated',
            'icon' => 'icon eye-icon'
        ]);
      // $this->addAction([
      //     'title' => 'Upload D.O',
      //     'condition' => function() {
      //         return true;
      //     },
      //     'method' => 'GET', // use GET request only for redirect purposes
      //     'route' => 'admincustom2.catalog.products.edit',
      //     'icon' => 'icon pencil-lg-icon'
      // ]);

      //   $this->addAction([
      //       'title' => 'Delete D.O',
      //       'method' => 'POST', // use GET request only for redirect purposes
      //       'route' => 'admincustom2.catalog.products.delete',
      //       'confirm_text' => 'File Deleted',
      //       'icon' => 'icon trash-icon'
      //   ]);
      $this->enableAction = true;
    }

    public function prepareMassActions() {
        // $this->addMassAction([
        //     'type' => 'delete',
        //     'label' => 'Delete',
        //     'action' => route('admin.catalog.products.massdelete'),
        //     'method' => 'DELETE'
        // ]);
        //
        // $this->addMassAction([
        //     'type' => 'update',
        //     'label' => 'Update Status',
        //     'action' => route('admin.catalog.products.massupdate'),
        //     'method' => 'PUT',
        //     'options' => [
        //         'Active' => 1,
        //         'Inactive' => 0
        //     ]
        // ]);

        $this->enableMassAction = false;
    }
}
