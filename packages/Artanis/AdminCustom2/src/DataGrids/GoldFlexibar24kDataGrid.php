<?php

namespace Artanis\AdminCustom2\DataGrids;
use Webkul\Ui\DataGrid\DataGrid;
use DB;

/**
 * ProductDataGrid Class
 *
 * @author Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class GoldFlexibar24kDataGrid extends DataGrid
{
    protected $sortOrder = 'desc'; //asc or desc

    protected $index = 'gram';

    protected $itemsPerPage = 20;

    public function prepareQueryBuilder()
    {

        $queryBuilder = DB::connection('mysql2')->table('gold_live_price_flexibar_24k')
                ->addSelect('gram' , 'buy' , 'sell');

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
            'index' => 'sell',
            'label' => 'Sell (RM)',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'buy',
            'label' => 'Buy (RM)',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false
        ]);

        $this->addColumn([
            'index' => 'gram',
            'label' => trans('Gram'),
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => false
        ]);
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
      $this->enableAction = false;
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
