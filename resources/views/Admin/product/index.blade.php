@include ('Admin.layouts.header')


<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">All categories</h3>
            </div>
            <a href="{{route('admin.product.create')}}"><button type="button" class="btn btn-block btn-success btn-lg">Add product</button></a>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  {{-- <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                  </div> --}}
                </thead>
                <tbody>
                    @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><div class="widget-user-image">
                        <img class="img-circle elevation-2" width="128" height="128" src="{{ asset('uploads/productsImage/'.$product->photo )}}" alt="User Avatar">
                      </div>
                    </td>
                    <td>
                        {{-- <a href="{{route('admin.category.edit' , [$category->id])}}"><i class="fas fa-solid fa-pen"></i></a> --}}
                        <a href="{{route('admin.product.edit' , [$product->id])}}"><button type="submit" class="btn btn-primary"><i class="fas fa-solid fa-pen"></i></button></a>
                    </td>
                    <td>
                        <form action="{{ route('admin.product.destroy',$product->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-sharp fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
@include('Admin.layouts.footer')
