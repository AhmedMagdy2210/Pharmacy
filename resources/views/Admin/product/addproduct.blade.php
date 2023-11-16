@include ('Admin.layouts.header')


<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                <select class="custom-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice1">Price</label>
                    <input type="number" min="" step="any" class="form-control" id="exampleInputPrice1" placeholder="Price" name="price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputQuantity1">Quantity</label>
                    <input type="number" class="form-control" id="exampleInputQuantity" placeholder="Quantity" name="quantity" value="0">
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                      <label class="custom-file-label" for="exampleInputFile">Choose photo</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
@include('Admin.layouts.footer')
