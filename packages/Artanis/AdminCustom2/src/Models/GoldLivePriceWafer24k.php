<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class GoldLivePriceWafer24k extends Model
{
  protected $connection= 'mysql2';

  protected $table = 'gold_live_price_gold_wafer_24k';

  const UPDATED_AT = null;

  protected $fillable = ['gram', 'sell', 'buy'];

}
