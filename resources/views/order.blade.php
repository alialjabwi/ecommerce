@extends('layouts.header')

@section('title', 'Order')

@section('content')

   <!-- Body main wrapper start -->
   <main>

      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-pharmacy.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Order</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{ route('home') }}">Home</a></span></li>
                              <li><span>Order</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->
 
      <!-- Cart area start  -->
      <div class="cart-area section-space">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="table-content table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th class="product-thumbnail">#</th>
                              <th class="cart-product-name">status</th>
                              <th class="product-price">address</th>
                              <th class="product-price">sssss</th>
                              <th class="product-quantity">status</th>
                              <th class="product-subtotal">Total</th>
                              <th class="product-remove">Order Notes</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($orders as $order)
                              <tr>
                                 <td class="product-name"><a href="pharmacy-details.html">{{ $order->id }}</a></td>
                                 <td class="product-name"><a href="pharmacy-details.html">{{ $order->status }}</a></td>
                                 <td class="product-price">
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">country : </span> {{ $order->country }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">state : </span> {{ $order->state }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">city : </span> {{ $order->city }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">address : </span> {{ $order->address }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">postcode : </span> {{ $order->postcode }}</div>
                                 </td>
                                 <td class="product-price">
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">name : </span> {{ $order->first_name }}{{ $order->last_name }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">email : </span> {{ $order->email }}</div>
                                    <div class="amount"><span style="font-weight: bolder;font-size: 20px;">phone : </span> {{ $order->phone }}</div>
                                 </td>
                                 <td class="product-quantity text-center">
                                    <span class="amount">{{ $order->status }}</span>
                                 </td>
                                 <td class="product-subtotal"><span class="amount">${{ $order->total }}</span></td>
                                 <td class="product-remove">{{ $order->order_notes ?? '-------------' }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div class="pagination" style="display: flex;justify-content: center;margin-top: 20px;">
                        {{ $orders->links() }}
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>     
      <!-- Cart area end  -->

   </main>
   <!-- Body main wrapper end -->

@endsection