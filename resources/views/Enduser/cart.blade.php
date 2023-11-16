@include('Enduser.layouts.header')
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('uploads/productsImage/' . $item['photo']) }}" alt="Image"
                                            class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                                    </td>
                                    <td>${{ $item['price'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ $item['quantity'] * $item['price'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                </div>
            </div>
        </div>
    </div>
</div>
@include('Enduser.layouts.footer')
