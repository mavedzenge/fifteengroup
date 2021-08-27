

@extends('layouts.site')
@section('title','Orders')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Contact name</th>
        <th scope="col">Company name</th>
        <th scope="col">Order items</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->contact->first_name . ' ' . $order->contact->last_name }}</td>
            <td>{{ $order->contact->company->name }}</td>
            <td>
                @if($order->order_items)
                {{ $order->order_items->count() }}
                @else
                {{ 'no items' }}
                @endif
            </td>
            <td>
                @if($order->order_items)
                {{ '£' . $order->order_items->sum('price') }}
                @else
                {{ '£0.00' }}
                @endif
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    {{$orders->links()}}
  </div>
@stop
