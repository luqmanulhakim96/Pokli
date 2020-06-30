<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class GoldLivePriceGap extends Model
{
  protected $connection= 'mysql2';

  protected $table = 'gold_live_price_gap';

  const UPDATED_AT = 'last_updated';

  protected $fillable = ['gram', 'price'];

  protected $dates = ['last_updated'];

}
