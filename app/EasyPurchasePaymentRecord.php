<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EasyPurchasePaymentRecord extends Model
{
  protected $table = 'easy_payment_purchase_record';

  protected $fillable = ['date_payment', 'monthly_price', 'order_id', 'payment_status','total_purchase','customer_id'];
}
