@include ('Admin.layouts.header')


<div class="content-wrapper" style="min-height: 1604.8px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
            <!-- /.card-header -->
            <!-- /.card-body -->
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('admin.category.update' , [$category->id])}}">
                @csrf
                @method('Put')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Category name</label>
                  <input type="text" class="form-control" id="name" name = 'name' placeholder="Enter Name" value="{{ $category->name }}">
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
