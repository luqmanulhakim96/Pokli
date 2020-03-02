<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class ProductSerialNumber extends Model
{
  protected $table = 'product_serial_number';

  protected $fillable = ['serial_number', 'status', 'product_id'];

  protected $dates = ['created_at','updated_at'];

  /**
   * Get the customer for this group.
  */
  public function product()
  {
      return $this->belongsTo(Product::class);
  }
}
