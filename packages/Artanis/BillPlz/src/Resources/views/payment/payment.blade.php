@extends('shop::layouts.master')

@section('page_title')
    {{ __('admin::app.error.404.page-title') }}
@stop

@section('content-wrapper')

<?php
  use Billplz\Client;

  $billplz = Client::make('155994cc-37ea-4c78-9460-1062df930f2c');
  $billplz->useSandbox();
  $collection = $billplz->collection();
  $response = $collection->create('My First API Collection');

  var_dump($response->toArray());
?>
  HELLO WORLD
  
@endsection
