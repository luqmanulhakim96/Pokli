<?php

namespace Webkul\Admin\DataGrids;

use Artanis\GapSap\Models\GoldSilverHistory;
use Webkul\Ui\DataGrid\DataGrid;
use DB;
use Webkul\Customer\Models\Customer;

/**
 * CustomerDataGrid class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class CustomerDataGrid extends DataGrid
{
    protected $index = 'customer_id'; //the column that needs to be treated as index column

    protected $sortOrder = 'desc'; //asc or desc

    protected $itemsPerPage = 10;

    public function goldTotal($id){
        $purchase = GoldSilverHistory::where('customer_id', $id)->where('activity', 'purchase')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');
        $purchase_gold = Customer::where('id', $id)->sum('total_gold');
        $purchase = $purchase + $purchase_gold;
        // $buyback = GoldSilverHistory::where('customer_id', $id)->where('activity', 'buyback')->where('product_type', 'gold')->where('status', 'completed')->sum('quantity');
        // $total = $purchase-$buyback;
        return $purchase;
    }

    public function silverTotal($id){
        $purchase = GoldSilverHistory::where('customer_id', $id)->where('activity', 'purchase')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');
        $purchase_silver = Customer::where('id', $id)->sum('total_silver');
        $purchase = $purchase + $purchase_silver;
        // $buyback = GoldSilverHistory::where('customer_id', $id)->where('activity', 'buyback')->where('product_type', 'silver')->where('status', 'completed')->sum('quantity');
        // $total = $purchase-$buyback;
        return $purchase;
    }

    public function prepareQueryBuilder()
    {
        // $gold = $this->goldTotal(2);
        // $silver = $this->silverTotal(2);
        // DB::enableQueryLog();
        // $gold = DB::table('gold_silver_history')
        //         ->select('customer_id', 'activity', 'product_type', 'quantity', DB::raw('SUM(quantity) AS quantity_pg'))
        //         ->where('activity','purchase')
        //         ->where('product_type','gold')
        //         ->get();
        // dd(DB::getQueryLog());
        // dd($gold);
        $queryBuilder = DB::table('customers')
                ->leftJoin('customer_groups', 'customers.customer_group_id', '=', 'customer_groups.id')
                ->leftJoin('gold_silver_history as gold_history', function($leftJoin) {
                    $leftJoin->on('gold_history.customer_id', '=', 'customers.id')
                             ->distinct('gold_history.customer_id');
                })
                ->leftJoin('gold_silver_history as silver_history', function($leftJoin) {
                    $leftJoin->on('silver_history.customer_id', '=', 'customers.id')
                             ->distinct('silver_history.customer_id');
                })
                ->addSelect('customers.id as customer_id', 'customers.ic', 'customers.email', 'customers.phone', 'customers.bank_no', 'customers.bank_name', 'customers.branch', 'customers.status', 'gold_history.quantity', 'silver_history.quantity', 'customers.total_gold', 'customers.total_silver')
                ->addSelect(DB::raw('CONCAT(customers.first_name, " ", customers.last_name) as full_name'))->groupBy('customers.id');

        $this->addFilter('customer_id', 'customers.id');
        $this->addFilter('full_name', DB::raw('CONCAT(customers.first_name, " ", customers.last_name)'));

        $this->setQueryBuilder($queryBuilder);
        // dd($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index' => 'customer_id',
            'label' => trans('admin::app.datagrid.id'),
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'full_name',
            'label' => trans('admin::app.datagrid.name'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'ic',
            'label' => trans('IC Number'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'email',
            'label' => trans('admin::app.datagrid.email'),
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'phone',
            'label' => 'Phone Number',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'bank_name',
            'label' => 'Bank',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'bank_no',
            'label' => 'Account Number',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'branch',
            'label' => 'Branch',
            'type' => 'string',
            'searchable' => true,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            // 'index' => 'gold_history.quantity',
            'index' => 'customers.total_gold',
            'label' => 'Gold (gram)',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false,
            'wrapper' => function ($value) {
                return $gold = $this->goldTotal($value->customer_id);
            }
        ]);

        $this->addColumn([
            // 'index' => 'silver_history.quantity',
            'index' => 'customers.total_silver',
            'label' => 'Silver (gram)',
            'type' => 'number',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false,
            'wrapper' => function ($value) {
                return $silver = $this->silverTotal($value->customer_id);
            }
        ]);

        // $this->addColumn([
        //     'index' => 'name',
        //     'label' => trans('admin::app.datagrid.group'),
        //     'type' => 'string',
        //     'searchable' => false,
        //     'sortable' => true,
        //     'filterable' => true
        // ]);

        $this->addColumn([
            'index' => 'status',
            'label' => trans('admin::app.datagrid.status'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'closure' => true,
            'filterable' => true,
            'wrapper' => function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge badge-md badge-success">Activated</span>';
                } else {
                    return '<span class="badge badge-md badge-danger">Deactivate</span>';
                }
            }
        ]);
    }

    public function prepareActions() {
        $this->addAction([
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'admin.customer.view',
            'icon' => 'icon eye-icon',
            'title' => trans('admin::app.customers.customers.view-help-title')
        ]);

        $this->addAction([
            'method' => 'GET', // use GET request only for redirect purposes
            'route' => 'admin.customer.edit',
            'icon' => 'icon pencil-lg-icon',
            'title' => trans('admin::app.customers.customers.edit-help-title')
        ]);

        // $this->addAction([
        //     'method' => 'POST', // use GET request only for redirect purposes
        //     'route' => 'admin.customer.updateStatus',
        //     'icon' => 'icon pencil-lg-icon',
        //     'title' => trans('Update Customer Status')
        // ]);

        $this->addAction([
            'method' => 'POST', // use GET request only for redirect purposes
            'route' => 'admin.customer.delete',
            'icon' => 'icon trash-icon',
            'title' => trans('admin::app.customers.customers.delete-help-title')
        ]);

        // $this->addAction([
        //     'type' => 'Edit',
        //     'method' => 'GET', //use post only for redirects only
        //     'route' => 'admin.customer.addresses.index',
        //     'icon' => 'icon note-icon',
        //     'title' => trans('admin::app.customers.customers.addresses')
        // ]);
        // $this->addAction([
        //     'method' => 'GET',
        //     'route' => 'admin.customer.note.create',
        //     'icon' => 'icon note-icon',
        //     'title' => trans('admin::app.customers.note.help-title')
        // ]);
    }

    /**
     * Customer Mass Action To Delete And Change Their
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'type' => 'delete',
            'label' => 'Delete',
            'action' => route('admin.customer.mass-delete'),
            'method' => 'PUT',
        ]);

        $this->addMassAction([
            'type' => 'update',
            'label' => 'Update Status',
            'action' => route('admin.customer.mass-update'),
            'method' => 'PUT',
            'options' => [
                'Active' => 1,
                'Inactive' => 0
            ]
        ]);

        $this->enableMassAction = true;
    }
}
