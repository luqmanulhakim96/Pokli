<?php
namespace Artanis\GapSap\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\Customer;

class GoldSilverHistory extends Model
{
    protected $table = 'gold_silver_history';

    protected $fillable = ['product_type', 'current_price_per_gram', 'amount', 'quantity', 'customer_id'];

    protected $dates = ['created_at', 'updated_at', 'current_price_datetime', 'payment_on'];

    protected $statusLabel = [
        'pending' => 'Pending',
        'paid' => 'Paid',
        'processing' => 'Processing',
        'completed' => 'Completed',
        'canceled' => 'Canceled',
        'closed' => 'Closed',
        'fraud' => 'Fraud'
    ];

    protected $paymentMethod = [
        'bankin' => 'Bankin',
        'fpx' => 'FPX'
    ];

    protected $productType = [
        'gold' => 'Gold',
        'silver' => 'Silver'
    ];

    /**
     * Get the order items record associated with the order.
     */
    public function getCustomerFullNameAttribute()
    {
        return $this->customer->first_name . ' ' . $this->customer->last_name;
    }

    /**
     * Returns the status label from status code
     */
    public function getStatusLabelAttribute()
    {
        return $this->statusLabel[$this->status];
    }

    /**
     * Returns the status label from status code
     */
    public function getPaymentMethodLabelAttribute()
    {
        if(!$this->payment_method)
            return 'Nill';
        else
            return $this->paymentMethod[$this->payment_method];
    }

    /**
     * Get the order items record associated with the order.
     */
    public function getProductTypeLabelAttribute()
    {
        return $this->productType[$this->product_type];
    }

    /**
     * Get the order items record associated with the order.
     */
    public function getProductPricePerRm100Attribute()
    {
        $type = $this->product_type;
        $price = $this->current_price_per_gram;
        $date = $this->current_price_datetime;
        if($type=='gold'){
            return 'RM'.$price.'/ 1 gram';
        }
        elseif($type=='silver'){
            return 'RM'.($price*100).'/ 100 gram';
        }
    }

    /**
     * Checks if purchase can be canceled or not
     */
    public function canCancel()
    {
        if ($this->status == 'canceled' || $this->status == 'completed')
            return false;
        else
            return true;
    }

    /**
     * Checks if purchase can be comfirm or not
     */
    public function canConfirm()
    {
        if ($this->status == 'canceled' || $this->status == 'completed')
            return false;
        else
            return true;
    }

    /**
     * Get the customer for this group.
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}