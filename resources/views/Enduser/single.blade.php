@include('Enduser.layouts.header')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a
            href="shop.html">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->name}}</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img src="{{asset('uploads/productsImage/' . $product->photo)}}" alt="Image" class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$product->name}}</h2>
          <p><strong class="text-primary h4">${{$product->price}}</strong></p>



          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 220px;">
              <div class="input-group-prepend">
              </div>
              <form action="{{route('cart.add' , [$product->id])}}" method="post">
                @csrf
                <input type="text" class="form-control text-center" value="1" placeholder="" name="quantityToBuy"
                aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" type="submit">Add To Cart</button>
              </form>
              <div class="input-group-append">
              </div>
            </div>

          </div>

          <div class="mt-5">
            <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" role="tab"
                  aria-controls="pills-profile" aria-selected="false">{{$product->category->name}}</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
@include('Enduser.layouts.footer')
