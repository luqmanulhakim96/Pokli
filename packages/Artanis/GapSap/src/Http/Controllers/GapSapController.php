<?php

namespace Artanis\GapSap\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductReviewRepository;

/**
 * Customer controlller for the customer basically for the tasks of customers which will be
 * done after customer authentication.
 *
 * @author  Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class GapSapController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var Object
    */
    protected $customerRepository;

    /**
     * ProductReviewRepository object
     *
     * @var array
    */
    protected $productReviewRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerRepository $customer
     * @param  \Webkul\Product\Repositories\ProductReviewRepository $productReview
     * @return void
    */
    public function __construct(CustomerRepository $customerRepository, ProductReviewRepository $productReviewRepository)
    {
        $this->middleware('customer');

        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;

        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * Taking the customer to profile details page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        return view($this->_config['view'], compact(['customer']));
    }

    /**
     * For loading the edit form page.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        
    }

    public function form(Request $request)
    {
        $input = $request->all();
        // dd($input);
        return view($this->_config['view'], compact(['input']));
    }

    public function formSubmit(Request $request)
    {
        // switch($request->get('submit-button')) {

        //     case 'Back': 
        //         return redirect()->route($this->_config['redirect']);
        //     break;
        
        //     case 'Next': 
                
        //     break;
        // }

        $input = $request->all();
        // dd($input);

        return redirect()->route('gapsap.index');
        // $date = date("Y-M-d", time());
        // $customer = $this->customerRepository->find(auth()->guard('customer')->user()->id);
        // return view($this->_config['view'], compact(['customer','date']));
    }

}
