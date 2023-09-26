@include('layouts.header')
@include('layouts.nav')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
          <a class="btn btn-primary" href="{{url('user/list')}}">Back</a>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Create User</h3>
                  </div>
                  <!-- /.card-header -->
                  <form role="form" action="{{ url('user/store') }}" method="post" id="create-user">

              @csrf

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">User Name:<span style="color:red;">*</span></label>

                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Name" value="{{old('user_name')}}">
                     @if ($errors->has('user_name'))
                  <span class="invalid-feedback error" role="alert">
                  <strong>{{ $errors->first('user_name') }}</strong>
                  </span>
                  @endif 

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Email:<span style="color:red;">*</span></label>

                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Enter Email Address" value="{{old('user_email')}}">
                     @if ($errors->has('user_email'))
                  <span class="invalid-feedback error" role="alert">
                  <strong>{{ $errors->first('user_email') }}</strong>
                  </span>
                  @endif 

                  </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
              </div>
          </div>
        </div>
    </section>
</div>

@include('layouts.footer')