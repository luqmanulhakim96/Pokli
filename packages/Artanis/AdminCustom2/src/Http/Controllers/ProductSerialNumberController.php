<?php

namespace Artanis\AdminCustom2\Http\Controllers;

use Artanis\AdminCustom2\Models\ProductSerialNumber;
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



class ProductSerialNumberController extends Controller
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

    public function index($id)
    {
      $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);
      $inventory = DB::table('product_inventories')->where('product_id', $id)->sum('qty');
      // $existing_serial = DB::table('product_serial_number')->where('product_id', $id)->count('status');
      $existing_serial = DB::table('product_serial_number')->where([['product_id','=', $id],['status','=','Available']])->count('status');
      $inventory = $inventory - $existing_serial;
      return view($this->_config['view'], ['product'=>$product, 'inventory'=>$inventory , 'product_id'=>$id]);
    }

    public function create($id)
    {
        $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTree();

        // $inventorySources = $this->inventorySourceRepository->findOrFail($id);
        $product_id = $id;
        $inventory = DB::table('product_inventories')->where('product_id', $id)->sum('qty');
        $existing_serial = DB::table('product_serial_number')->where([['product_id','=', $id],['status','=','Available']])->count('status');
        $inventory = $inventory - $existing_serial;
        // dd($existing_serial);
        // return view($this->_config['view'], ['product'=>$product], ['inventorySources'=>$inventorySources]);

        return view($this->_config['view'], compact('product','categories', 'inventory', 'product_id'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->with(['variants', 'variants.inventories'])->findOrFail($id);

        $categories = $this->categoryRepository->getCategoryTree();

        $inventorySources = $this->inventorySourceRepository->findOrFail($id);
        $product_id = $id;
        $inventory = DB::table('product_inventories')->where('product_id', $id)->sum('qty');
        // $existing_serial = DB::table('product_serial_number')->where('product_id', $id)->count('status');
        // $inventory = $inventory - $existing_serial;
        // dd($inventory);
        // return view($this->_config['view'], ['product'=>$product], ['inventorySources'=>$inventorySources]);

        return view($this->_config['view'], compact('product','categories', 'inventory', 'product_id'));
    }
    //
    public function formSubmit(Request $request)
    {


        $input = $request->all();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $product_id = $input['product_id'];
        $inventory = $input['inventory'];
        for ($i=0; $i < $inventory; $i++) {
          $serial = new ProductSerialNumber;
          $serial->product_id = $product_id;
          $serial->serial_number = $input['serial-number'.$i];
          $serial->status = "Available";
          $serial->save();
        }
        return redirect()->route('admincustom2.catalog.serial.index', ['id'=>$product_id]);
    }
    //
    // public function download($id)
    // {
    //     $filename = DB::table('delivery_order')->get()->findOrFail($id);
    //     return response()->download(storage_path("app/public/{$filename}"));
    // }
    //
    public function destroy($id)
    {
        $delivery = DB::table('product_serial_number')->find($id);
        try {
        $delivery = DB::table('product_serial_number')->where('id', '=',$id)->delete();
        session()->flash('success', 'File deleted.');
        return response()->json(['message' => true], 200);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete file.');
        }

        return response()->json(['message' => false], 400);
    }

    public static function getID()
    {
      // return $id;
    }

}
