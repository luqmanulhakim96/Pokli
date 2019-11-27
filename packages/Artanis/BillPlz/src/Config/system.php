<?php

  return [
    [
      'key' => 'sales',
      'name' => 'Sales',
      'sort' => 1
    ], [
      'key' => 'sales.paymentmethods',
      'name' => 'Payment Methods',
      'sort' => 2,
    ], [
      'key' =>'sales.paymentmethods.billplz',
      'name' => 'BillPlz Payments',
      'sort' => 4,
      'fields' => [
        [
          'name' => 'active',
          'title' => 'Enable For Checkout',
          'type' => 'select',
          'options' => [
            [
              'title' => 'True',
              'value' => true
            ], [
              'title' => 'False',
              'value' => false
            ]
          ],
          'validation' => 'required'
        ]
      ]
    ]
];
