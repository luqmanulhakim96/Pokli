<?php

namespace Artanis\AdminCustom2\DataGrids;
use Artanis\AdminCustom2\Models\DeliveryOrder;
use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * ProductDataGrid Class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ProductDataGrid extends DataGrid
{
    protected $sortOrder = 'desc'; //asc or desc

    protected $index = 'delivery_id';

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {

        $queryBuilder = DB::table('delivery_order')
                ->leftJoin('products', function($leftJoin) {
                    $leftJoin->on('products.id', '=', 'delivery_order.product_id');
                })
                ->leftJoin('product_flat', function($leftJoin2) {
                    $leftJoin2->on('product_flat.product_id', '=', 'delivery_order.product_id');
                })
                ->addSelect('product_flat.id as product_id' , 'product_flat.sku as product_sku', 'product_flat.name as product_name', 'delivery_order.delivery_attachment as delivery_attachment', 'delivery_order.delivery_date as delivery_date', 'delivery_order.id as delivery_id')
                ->groupBy('delivery_order.id');

        $this->addFilter('product_id', 'product_flat.product_id');
        $this->addFilter('product_name', 'product_flat.name');
        $this->addFilter('product_sku', 'product_flat.sku');

        $this->setQueryBuilder($queryBuilder);

    }

    public function addColumns()
    {
        // $this->addColumn([
        //     'index' => 'product_id',
        //     'label' => trans('admin::app.datagrid.id'),
        //     'type' => 'number',
        //     'searchable' => false,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'delivery_id',
            'label' => 'ID',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'product_sku',
            'label' => trans('admin::app.datagrid.sku'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'product_name',
            'label' => trans('admin::app.datagrid.name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);


        $this->addColumn([
            'index' => 'delivery_date',
            'label' => 'Date Upload',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'delivery_attachment',
            'label' => 'Attachment',
            'type' => 'string',
            'searchable' => true,
            'closure' => true,
            'sortable' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if (!$value->delivery_attachment) {
                    return 'Null';
                }
                else
                    return '<a href="http://209.97.169.247/storage/' .$value->delivery_attachment. '" target="_blank"> <img src="https://www.freeiconspng.com/uploads/download-icon-down-arrow-23.png" alt="Smiley face" height="25" width="25"> </a>';
            }
        ]);
    }

    public function prepareActions() {

      // $this->addAction([
      //     'title' => 'Upload D.O',
      //     'condition' => function() {
      //         return true;
      //     },
      //     'method' => 'GET', // use GET request only for redirect purposes
      //     'route' => 'admincustom2.catalog.products.edit',
      //     'icon' => 'icon pencil-lg-icon'
      // ]);

        $this->addAction([
            'title' => 'Delete D.O',
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'admincustom2.catalog.products.delete',
            'confirm_text' => 'File Deleted',
            'icon' => 'icon trash-icon'
        ]);
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
