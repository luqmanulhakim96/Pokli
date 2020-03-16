<?php

namespace Artanis\AdminCustom2\DataGrids;
use Artanis\AdminCustom2\Models\ProductSerialNumber;
use Webkul\Ui\DataGrid\DataGrid;
use Illuminate\Database\Eloquent\Model;
use \stdClass;
// use Artanis\AdminCustom2\Http\Controllers\ProductSerialNumberController;
use DB;


class ProductSerialNumberDataGrid extends DataGrid
{
    protected $sortOrder = 'desc'; //asc or desc

    protected $index = 'id';

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {
        // $product_id = ProductSerialNumberController::getID();
        // ->leftJoin('products', function($leftJoin) {
        //     $leftJoin->on('products.id', '=', 'product_serial_number.product_id');
        // })
        // ->leftJoin('product_flat', function($leftJoin2) {
        //     $leftJoin2->on('product_flat.product_id', '=', 'product_serial_number.product_id');
        // })
        $queryBuilder = DB::table('product_serial_number')
                ->leftJoin('products', function($leftJoin) {
                    $leftJoin->on('products.id', '=', 'product_serial_number.product_id');
                })
                ->leftJoin('product_flat', function($leftJoin2) {
                    $leftJoin2->on('product_flat.product_id', '=', 'product_serial_number.product_id');
                })
                ->leftJoin('orders', function($leftJoin3) {
                    $leftJoin3->on('product_serial_number.order_id', '=', 'orders.id');
                })
                ->leftJoin('shipments', function($leftJoin4) {
                    $leftJoin4->on('product_serial_number.order_id', '=', 'shipments.order_id');
                })
                ->addSelect('product_flat.id as product_id' , 'product_flat.sku as product_sku', 'product_flat.name as product_name',
                            'product_serial_number.serial_number as serial_number', 'product_serial_number.status as status', 'product_serial_number.id as id',
                            'product_serial_number.created_at as created_at', 'shipments.created_at as item_out', 'orders.increment_id');
                // ->where('product_flat.id', $product_id);

        // $this->addFilter('product_sku', 'product_flat.product_sku');
        // $this->addFilter('product_name', 'product_flat.name');
        $this->addFilter('serial_number', 'product_serial_number.serial_number');
        $this->addFilter('status', 'product_serial_number.status');

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

        // $this->addColumn([
        //     'index' => 'product_sku',
        //     'label' => trans('admin::app.datagrid.sku'),
        //     'type' => 'string',
        //     'searchable' => true,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'product_name',
            'label' => trans('admin::app.datagrid.name'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);


        $this->addColumn([
            'index' => 'serial_number',
            'label' => 'Serial Number',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'status',
            'label' => 'Status',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($value) {
                if ($value->status == 'Available')
                    return '<span class="badge badge-md badge-success">Available</span>';
                else
                    return '<span class="badge badge-md badge-danger">Sold</span>';
            }
        ]);

        $this->addColumn([
            'index' => 'created_at',
            'label' => 'Date Item In',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'increment_id',
            'label' => 'Order ID',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'item_out',
            'label' => 'Date Item Out',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
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
            'route' => 'admincustom2.catalog.serial.delete',
            'confirm_text' => 'Serial Number Deleted',
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
