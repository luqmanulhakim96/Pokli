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



class AdminCustom2Controller extends Controller
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

    public function create()
    {
        // $product = $this->productRepository->all();
        $product = DB::table('products')->get();
        // $product = json_decode($product);
        // dd($product);
        return view($this->_config['view'], ['product'=>$product]);

        // return view($this->_config['view'], compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTree();

        $inventorySources = $this->inventorySourceRepository->all();

        return view($this->_config['view'], compact('product', 'categories', 'inventorySources'));
    }

    public function formSubmit(Request $request)
    {


        $input = $request->all();
        date_default_timezone_set("Asia/Kuala_Lumpur");

        $delivery = new DeliveryOrder;
        $delivery->product_id = $input['product_id'];

        $delivery->delivery_date = date('Y-m-d H:i:s', strtotime($input['delivery_date'] ?? now())) ?? now();
        $delivery->delivery_attachment = $input['delivery_attachment'] ?? null;
        // dd($delivery->delivery_attachment = $input['delivery_attachment'] ?? null);
        if($delivery->delivery_attachment){
            $delivery->delivery_attachment = $delivery->delivery_attachment->store('uploads', 'public');
        }

        $delivery->save();

        return redirect()->route('admincustom2.catalog.products.index');
    }

    public function download($id)
    {
        $filename = DB::table('delivery_order')->get()->findOrFail($id);
        return response()->download(storage_path("app/public/{$filename}"));
    }

    public function destroy($id)
    {
        $delivery = DB::table('delivery_order')->find($id);
        try {
        $delivery = DB::table('delivery_order')->where('id', '=',$id)->delete();
        session()->flash('success', 'File deleted.');
        return response()->json(['message' => true], 200);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete file.');
        }

        return response()->json(['message' => false], 400);
    }

}
