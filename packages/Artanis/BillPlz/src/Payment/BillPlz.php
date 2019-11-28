<?php
namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;
use Billplz\Client;
// use Billplz\Laravel\Billplz;
/**
 * BillPlz Wrapper
 */
class Billplz extends Payment
{
    protected $code  = 'billplz';

    public function createBill(Client $client)
    {
        $bill = $client->bill()->create(
          'x7afhxzc', //collection id
          'api@billplz.com', // user email
          null, //mobile phone
          'Michael API V3', //API name
          \Duit\MYR::given(20000), //amount
          ['callback_url' => 'http://example.com/webhook/', 'redirect_url' => 'http://example.com/redirect/'], //callback and redirect url
          'Maecenas eu placerat ante.' //description
        );
    }


    /**public function createBill(Client $client)
    {
        $bill = $client->bill()->create( 'inbmmepb', //collection id
        'api@billplz.com',
        null,
        'Michael API V3',
        \Duit\MYR::given(200),
        ['callback_url' => 'http://example.com/webhook/', 'redirect_url' => 'http://example.com/redirect/'],
        'Maecenas eu placerat ante.' );

  }**/
    /**return [
      "id" => "8X0Iyzaw",
      "collection_id" => "inbmmepb",
      "paid" => false,
      "state" => "overdue",
      "amount" => \Duit\MYR::given(200),
      "paid_amount" => \Duit\MYR::given(0),
      "due_at" => new \DateTime('Y-m-d', "2015-3-9"),
      "email" => "api@billplz.com",
      "mobile" => null,
      "name" => "MICHAEL API V3",
      "url" => "https://www.billplz.com/bills/8X0Iyzaw",
      "reference_1_label" => "Reference 1",
      "reference_1" => null,
      "reference_2_label" => "Reference 2",
      "reference_2" => null,
      "redirect_url" => null,
      "callback_url" => "http://example.com/webhook/",
      "description" => "Maecenas eu placerat ante."
    ];**/


    public function getRedirectUrl()
    {

    }
}
