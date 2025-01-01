@extends('layouts.header')

@section('title', 'wishlist')

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
                  timer: 1500, 
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
                  timer: 1500,
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
                     <h2 class="breadcrumb__title">Wishlist</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="{{ route('home') }}">Home</a></span></li>
                              <li><span>Wishlist</span></li>
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
                                 <th class="product-subtotal">Category</th>
                                 <th class="product-price">Unit Price</th>
                                 <th class="product-remove">Remove</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($favorites as $favorite)
                                 <tr>
                                    <td class="product-thumbnail">
                                       <a href="{{ route('products.show', $favorite->product->id) }}">
                                          <img src="{{ asset('storage/' . $favorite->product->image) }}" alt="{{ $favorite->product->name }}">
                                       </a>
                                    </td>
                                    <td class="product-name"><a href="{{ route('products.show', $favorite->product->id) }}">{{$favorite->product->name}}</a></td>
                                    <td class="product-subtotal"> <span>{{ $favorite->product->category->name ?? 'Category' }}</span></td>
                                    <td class="product-price"><span class="amount">{{$favorite->product->price}}$</span></td>
                                    <td>
                                       <button class="btn btn-danger delete-favorite-item" data-id="{{ $favorite->id }}">Remove</button>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
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
         document.querySelectorAll('.delete-favorite-item').forEach(function (button) {
            button.addEventListener('click', function () {
                  const favoriteId = this.getAttribute('data-id');

                  Swal.fire({
                     title: 'Are you sure?',
                     text: 'This product will be removed from your favorite!',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Yes, remove it!'
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetch(`/favorites/${favoriteId}`, {
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
                                    timer: 1500,
                                    showConfirmButton: false,
                                    position: 'center',
                                 })
                                 .then(() => {
                                    window.location.reload();
                                 });
                                 document.getElementById(`favorite-item-${favoriteId}`).remove();
                              } else {
                                 Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: data.error,
                                    timer: 1500,
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