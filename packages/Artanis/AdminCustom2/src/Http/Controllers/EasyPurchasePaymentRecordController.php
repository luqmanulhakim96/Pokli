<?php

namespace Artanis\AdminCustom2\Http\Controllers;

use Artanis\AdminCustom2\Models\DeliveryOrder;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Webkul\Product\Http\Requests\ProductForm;
use Webkul\Product\Helpers\ProductType;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class EasyPurchasePaymentRecordController extends Controller
{
    protected $_config;

    protected $customerRepository;

    protected $productReviewRepository;

    /**
     * CategoryRepository object
     *
     * @var Object
     */
    protected $categoryRepository;

    /**
     * ProductRepository object
     *
     * @var Object
     */
    protected $productRepository;

    /**
     * ProductDownloadableLinkRepository object
     *
     * @var Object
     */
    protected $productDownloadableLinkRepository;

    /**
     * ProductDownloadableSampleRepository object
     *
     * @var Object
     */
    protected $productDownloadableSampleRepository;

    /**
     * AttributeFamilyRepository object
     *
     * @var Object
     */
    protected $attributeFamilyRepository;

    /**
     * InventorySourceRepository object
     *
     * @var Object
     */
    protected $inventorySourceRepository;

    public function __construct(
      CategoryRepository $categoryRepository,
      ProductRepository $productRepository,
      ProductDownloadableLinkRepository $productDownloadableLinkRepository,
      ProductDownloadableSampleRepository $productDownloadableSampleRepository,
      AttributeFamilyRepository $attributeFamilyRepository,
      InventorySourceRepository $inventorySourceRepository)
    {
        $this->middleware('web');

        $this->_config = request('_config');

        $this->categoryRepository = $categoryRepository;

        $this->productRepository = $productRepository;

        $this->productDownloadableLinkRepository = $productDownloadableLinkRepository;

        $this->productDownloadableSampleRepository = $productDownloadableSampleRepository;

        $this->attributeFamilyRepository = $attributeFamilyRepository;

        $this->inventorySourceRepository = $inventorySourceRepository;
    }

    public function index()
    {
        return view($this->_config['view']);
    }

    public function viewRecord($id)
    {
      $record = DB::table('orders')->where('id', $id)->get();

      return view($this->_config['view'], ['record'=>$record, 'order_id'=>$id]);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTree();

        $inventorySources = $this->inventorySourceRepository->all();

        return view($this->_config['view'], compact('product', 'categories', 'inventorySources'));
    }


    public function download($id)
    {
        $filename = DB::table('delivery_order')->get()->findOrFail($id);
        return response()->download(storage_path("app/public/{$filename}"));
    }

    public function updateStatus($id)
    {
        $delivery = DB::table('easy_payment_purchase_record')->find($id);
        try {
        $delivery = DB::table('easy_payment_purchase_record')->where('id', '=',$id)->update(['payment_status'=>"Paid"]);
        session()->flash('success', 'Payment Status Updated.');
        return response()->json(['message' => true], 200);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update payment status.');
        }

        return response()->json(['message' => false], 400);
    }

    public function destroy($id)
    {

    }

}
