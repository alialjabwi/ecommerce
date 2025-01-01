@extends('layouts.header')

@section('title', 'checkout')

@section('content')
   <!-- Body main wrapper start -->
   <main>

      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Checkout</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{ route('home') }}">Home</a></span></li>
                              <li><span>checkout</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- checkout-area start -->
      <section class="checkout-area section-space">
         <div class="container">
            <form method="POST" action="{{ route('orders.store') }}">
               @csrf
               <div class="row">
                  <div class="col-lg-6"> 
                        <div class="checkbox-form">
                           <h3 class="mb-15">Billing Details</h3>
                           <div class="row g-5">
                              <!-- Country -->
                              <input type="hidden" name="status" value="Pending">
                              <input type="hidden" name="total" value="{{$total}}">
                              <div class="col-md-12">
                                 <div class="country-select">
                                    <label>Country <span class="required">*</span></label>
                                    <select name="country" required>
                                       <option value="United States">United States</option>
                                       <option value="Algeria">Algeria</option>
                                       <option value="Afghanistan">Afghanistan</option>
                                       <option value="Ghana">Ghana</option>
                                       <option value="Albania">Albania</option>
                                       <option value="Bahrain">Bahrain</option>
                                       <option value="Colombia">Colombia</option>
                                       <option value="Dominican Republic">Dominican Republic</option>
                                    </select>
                                 </div>
                              </div>
                              <!-- First Name -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="first_name" placeholder="First Name" required>
                                 </div>
                              </div>
                  
                              <!-- Last Name -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name" placeholder="Last Name" required>
                                 </div>
                              </div>
                  
                              <!-- Company Name -->
                              <div class="col-md-12">
                                 <div class="checkout-form-list">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" placeholder="Company Name">
                                 </div>
                              </div>
                  
                              <!-- Address -->
                              <div class="col-md-12">
                                 <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="address" placeholder="Street address" required>
                                 </div>
                              </div>
                  
                              <!-- Apartment -->
                              <div class="col-md-12">
                                 <div class="checkout-form-list">
                                    <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                                 </div>
                              </div>
                  
                              <!-- Town/City -->
                              <div class="col-md-12">
                                 <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="city" placeholder="Town / City" required>
                                 </div>
                              </div>
                  
                              <!-- State/County -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input type="text" name="state" placeholder="State / County" required>
                                 </div>
                              </div>
                  
                              <!-- Postcode/Zip -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" name="postcode" placeholder="Postcode / Zip" required>
                                 </div>
                              </div>
                  
                              <!-- Email -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                 </div>
                              </div>
                  
                              <!-- Phone -->
                              <div class="col-md-6">
                                 <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" placeholder="Phone" required>
                                 </div>
                              </div>
                           </div>
                           <!-- Order Notes -->
                           <div class="order-notes mt-30">
                              <div class="checkout-form-list">
                                 <label>Order Notes</label>
                                 <textarea name="order_notes" id="checkout-mess" cols="30" rows="10" 
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                              </div>
                           </div>
                        </div> 
                  </div>                  
                  <div class="col-lg-6">
                     <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                           <table>
                              <thead>
                                 <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($cartItems as $cartItem)
                                    <tr class="cart_item">
                                       <td class="product-name">
                                          {{$cartItem->product->name}}
                                          <strong class="product-quantity"> × {{$cartItem->quantity}}</strong>
                                       </td>
                                       <td class="product-total">
                                          <span class="amount">${{$cartItem->product->price}}</span>
                                       </td>
                                    </tr>
                                 @endforeach
                                 @foreach ($cartItems as $index => $cartItem)
                                    <div class="order-item" style="display: none;">
                                       <label for="items[{{ $index }}][product_id]">Product ID</label>
                                       <input type="number" name="items[{{ $index }}][product_id]" value="{{ $cartItem->product_id }}" readonly>

                                       <label for="items[{{ $index }}][quantity]">Quantity</label>
                                       <input type="number" name="items[{{ $index }}][quantity]" value="{{ $cartItem->quantity }}" min="1" required>

                                       <label for="items[{{ $index }}][price]">Price</label>
                                       <input type="number" name="items[{{ $index }}][price]" value="{{ $cartItem->product->price }}" step="0.01" min="0" readonly>
                                    </div>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr class="cart-subtotal">
                                    <th style="font-size: 18px;font-weight: bold;">Cart Subtotal</th>
                                    <td><span class="amount" style="font-size: 18px;font-weight: bold;">${{$total}}</span></td>
                                 </tr>
                                 <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">${{$total}}</span></strong>
                                    </td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>

                        <div class="payment-method">
                           <div class="accordion" id="checkoutAccordion">
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="checkoutOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                       Direct Bank Transfer
                                    </button>
                                 </h2>
                                 <div id="bankOne" class="accordion-collapse collapse show"
                                    aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body">
                                       Make your payment directly into our bank account. Please use your
                                       Order ID
                                       as the payment reference. Your order won’t be shipped until the
                                       funds have
                                       cleared in our account.
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="paymentTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                                       Cheque Payment
                                    </button>
                                 </h2>
                                 <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo"
                                    data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body">
                                       Please send your cheque to Store Name, Store Street, Store Town,
                                       Store
                                       State / County, Store
                                       Postcode.
                                    </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="paypalThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                                       PayPal
                                    </button>
                                 </h2>
                                 <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree"
                                    data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body">
                                       Pay via PayPal; you can pay with your credit card if you don’t have
                                       a
                                       PayPal account.
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="order-button-payment mt-20">
                              <button class="fill-btn" type="submit">
                                 <span class="fill-btn-inner">
                                    <span class="fill-btn-normal">Place order</span>
                                    <span class="fill-btn-hover">Place order</span>
                                 </span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <!-- checkout-area end -->

   </main>
   <!-- Body main wrapper end -->

@endsection
