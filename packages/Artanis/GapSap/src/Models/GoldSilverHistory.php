<?php
namespace Artanis\GapSap\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\Customer;

class GoldSilverHistory extends Model
{
    protected $table = 'gold_silver_history';

    protected $fillable = ['product_type', 'current_price_per_gram', 'purchase_amount', 'purchase_quantity', 'customer_id'];

    /**
     * Get the customer for this group.
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}