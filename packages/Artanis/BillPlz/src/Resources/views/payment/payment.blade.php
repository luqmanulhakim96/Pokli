<?php
  use Billplz\Client;

  $billplz = Client::make('155994cc-37ea-4c78-9460-1062df930f2c');
  $billplz->useSandbox();
  $collection = $billplz->collection();
  $response = $collection->create('My First API', [
      'logo' => '@/Users/Billplz/Documents/uploadPhoto.png',
      'split_payment' => [
          'email' => 'verified@account.com',
          'fixed_cut' => \Duit\MYR::given(100),
      ],
  ]);

  $response = $collection->all();

  var_dump($response->toArray());
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    HELLO WORLD
  </body>
</html>
