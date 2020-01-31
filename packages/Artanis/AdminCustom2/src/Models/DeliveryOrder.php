<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class DeliveryOrder extends Model
{
  protected $table = 'delivery_order';

  protected $fillable = ['product_id', 'delivery_attachment'];

  protected $dates = ['delivery_date','created_at','updated_at'];

  /**
   * Get the customer for this group.
  */
  public function product()
  {
      return $this->belongsTo(Product::class);
  }
}
