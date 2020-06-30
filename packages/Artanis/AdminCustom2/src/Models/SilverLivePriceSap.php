<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class SilverLivePriceSap extends Model
{
  protected $connection= 'mysql2';

  protected $table = 'silver_live_price_sap';

  const UPDATED_AT = 'last_updated';

  protected $fillable = ['gram', 'price'];

  protected $dates = ['last_updated'];

}
