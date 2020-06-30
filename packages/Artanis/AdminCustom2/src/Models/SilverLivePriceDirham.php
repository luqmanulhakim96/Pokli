<?php

namespace Artanis\AdminCustom2\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Product\Models\Product;

class SilverLivePriceDirham extends Model
{
  protected $connection= 'mysql2';

  protected $table = 'silver_live_price_dirham';

  const UPDATED_AT = null;

  protected $fillable = ['gram', 'sell'];

}
