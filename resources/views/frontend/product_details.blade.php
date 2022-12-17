<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('frontend/includes/header')
         <!-- end header section -->
        

        <!-- content -->
         <div class="col-sm-6 col-md-4 col-lg-4 w-50 mx-auto mt-3">
            <div class="box">
               <div class="img-box">
                  <img width="100%" height="auto" src="{{asset('product/'.$product->image)}}" alt="">
               </div>
               <div class="detail-box">
                  @if($product->dis_price !=null)
                     <h5>
                        {{$product->title}}
                     </h5>
                     <h6 class="text-success">
                        ${{$product->dis_price}}
                     </h6>
                     <h6 class="text-danger" style="text-decoration: line-through;">
                        ${{$product->price}}
                     </h6>
                  @else
                     <h5>
                        ${{$product->title}}
                     </h5>
                     <h6 class="text-success">
                        ${{$product->price}}
                     </h6>
                  @endif
                  <h6>
                     <b>Category:</b> {{$product->category()->first()->category_name}}
                  </h6>
                  <span><b>Description:</b>{{$product->description}}</span>

                  @if($product->quantity > 0)
                  <h6><b>Stock:</b> {{$product->quantity}} pieces left</h6>
                  @else
                  <h6>Not available</h6>
                  @endif

                  <form action="{{url('add_cart', $product->id)}}" method="post">
                     @csrf
                     <input type="number" name="quantity" placeholder="add quantity" class="form-cotnrol">

                     <button class="btn btn-primary btn-sm mb-2" type="submit">Add to cart</button>
                  </form>
                  
               </div>
            </div>
         </div>
      </div>
      
      


      <!-- end content -->


      <!-- footer start -->
         @include('frontend.includes.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Famms</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('frontend/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('frontend/js/custom.js')}}"></script>
   </body>
</html>