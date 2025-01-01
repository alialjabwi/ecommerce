@extends('layouts.header')

@section('title', 'cart')

@section('content')


<style>
   .alert-box {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(0, 0, 0, 0.8);
      color: #fff;
      padding: 20px 40px;
      border-radius: 10px;
      text-align: center;
      z-index: 1000;
      display: none;
      font-size: 18px;
   }

   .alert-box.show {
      display: block;
      animation: fadeIn 0.5s ease;
   }

   @keyframes fadeIn {
      from {
         opacity: 0;
      }
      to {
         opacity: 1;
      }
   }

</style>
   <!-- Body main wrapper start -->
   <main>

      <div id="custom-alert" class="alert-box"></div>
      
      @if (session('success'))
         <script>
            Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: "{{ session('success') }}",
                  timer: 3000, 
                  timerProgressBar: true,
                  showConfirmButton: false,
                  position: 'center'
            });
         </script>
      @endif

      @if (session('error'))
         <script>
            Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: "{{ session('error') }}",
                  timer: 3000,
                  timerProgressBar: true,
                  showConfirmButton: false,
                  position: 'center'
            });
         </script>
      @endif

      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-pharmacy.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Cart</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{ route('home') }}">Home</a></span></li>
                              <li><span>Cart</span></li>
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
                              <th class="product-thumbnail">Images</th>
                              <th class="cart-product-name">Product</th>
                              <th class="product-price">Unit Price</th>
                              <th class="product-quantity">Quantity</th>
                              <th class="product-subtotal">Total</th>
                              <th class="product-remove">Remove</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($carts as $cart)
                              <tr id="cart-item-{{ $cart->id }}">
                                 <td class="product-thumbnail"><a href="{{ route('products.show', $cart->product->id) }}">
                                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}">
                                    </a>
                                 </td>
                                 <td class="product-name"><a href="pharmacy-details.html">{{$cart->product->name}}</a></td>
                                 <td class="product-price"><span class="amount">{{$cart->product->price}}$</span></td>
                                 <td class="product-quantity text-center">
                                    <div class="product-quantity mt-10 mb-10">
                                       <div class="product-quantity-form">
                                          <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                                <input type="number" name="quantity" id="quantity-{{ $cart->id }}" value="{{ $cart->quantity }}" min="1">
                                                <button type="submit" class="btn btn-primary">update</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-subtotal"><span class="amount">{{$cart->product->price * $cart->quantity}}$</span></td>
                                 <td>
                                    <button class="btn btn-danger delete-cart-item" data-id="{{ $cart->id }}">Remove</button>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="coupon-all">
                           <div class="coupon d-flex align-items-center">
                              <input id="coupon_code" class="input-text" name="coupon_code" placeholder="Coupon code"
                                 type="text">
                              <button onclick="window.location.reload()" class="fill-btn" type="submit">
                                 <span class="fill-btn-inner">
                                    <span class="fill-btn-normal">apply coupon</span>
                                    <span class="fill-btn-hover">apply coupon</span>
                                 </span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6 ml-auto">
                        <div class="cart-page-total">
                           <h2>Cart totals</h2>
                           <ul class="mb-20">
                              <li>Subtotal <span>{{ number_format($totalPrice, 2) }}$</span></li>
                              <li>Total <span>{{ number_format($totalPrice, 2) }}$</span></li>
                           </ul>
                           <a class="fill-btn" href="{{ route('checkout.index') }}">
                              <span class="fill-btn-inner">
                                 <span class="fill-btn-normal">Proceed to checkout</span>
                                 <span class="fill-btn-hover">Proceed to checkout</span>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Cart area end  -->

      

   </main>
   <!-- Body main wrapper end -->
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         document.querySelectorAll('.delete-cart-item').forEach(function (button) {
            button.addEventListener('click', function () {
                  const cartId = this.getAttribute('data-id');

                  Swal.fire({
                     title: 'Are you sure?',
                     text: 'This product will be removed from your cart!',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Yes, remove it!'
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetch(`/cart/${cartId}`, {
                              method: 'DELETE',
                              headers: {
                                 'Content-Type': 'application/json',
                                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                              }
                        })
                        .then(response => response.json())
                        .then(data => {
                              if (data.success) {
                                 Swal.fire({
                                    icon: 'success',
                                    title: 'Removed!',
                                    text: data.success,
                                    timer: 2000,
                                    showConfirmButton: false,
                                    position: 'center',
                                 });
                                 document.getElementById(`cart-item-${cartId}`).remove();
                              } else {
                                 Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.error,
                                    timer: 2000,
                                    showConfirmButton: false,
                                    position: 'center',
                                 });
                              }
                        })
                        .catch(error => console.error('Error:', error));
                     }
                  });
            });
         });
      });


      function showAlert(message, type = 'success') {
         const alertBox = document.getElementById('custom-alert');
         alertBox.textContent = message;

         if (type === 'success') {
            alertBox.style.backgroundColor = 'rgba(0, 128, 0, 0.8)';
         } else if (type === 'error') {
            alertBox.style.backgroundColor = 'rgba(255, 0, 0, 0.8)';
         }

         alertBox.classList.add('show');
         setTimeout(() => {
            alertBox.classList.remove('show');
         }, 2000);
      }

  </script>
  
@endsection