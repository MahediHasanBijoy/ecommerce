<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">
         @foreach($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="" class="option1">
                     {{$product->title}}
                     </a>
                     <a href="" class="option2">
                     Buy Now
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="{{asset('product/'.$product->image)}}" alt="">
               </div>
               <div class="detail-box">
                  @if($product->dis_price !=null)
                     <h5>
                        {{$product->title}}
                     </h5>
                     <h6 class="text-success">
                        {{$product->dis_price}}
                     </h6>
                     <h6 class="text-danger" style="text-decoration: line-through;">
                        {{$product->price}}
                     </h6>
                  @else
                     <h5>
                        {{$product->title}}
                     </h5>
                     <h6 class="text-success">
                        {{$product->price}}
                     </h6>
                  @endif
               </div>
            </div>
         </div>
         @endforeach

         <div class="mt-3 ml-3">
            {{ $products->links()}}
         </div>
   </div>
</section>