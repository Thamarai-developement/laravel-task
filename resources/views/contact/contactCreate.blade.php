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
            <h1 class="m-0">Contact List</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
          <a class="btn btn-primary" href="{{url('contact/list')}}">Back</a>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact List</li>
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
                      <h3 class="card-title">Create Contact</h3>
                  </div>
                  <!-- /.card-header -->
                  <form role="form" action="{{ url('contact/store') }}" method="post" id="create-contact">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select User:<span style="color:red;">*</span></label>
                            <select class="form-control" style="width: 100%;" name="user_id">
                            <option value="">Select User</option>
                            @foreach($users as $data)
                            <option value="{{$data['id']}}" {{ old('user_id') == $data['id'] ? 'selected' : '' }}>{{$data['name']}}</option>
                            @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                            @endif 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country Code:<span style="color:red;">*</span></label>
                            <select class="form-control" style="width: 100%;" name="country_code">
                                <option value="">Select Country Code</option>
                                  @foreach($country_codes as $data)
                                    @if(empty($data->idd->suffixes) == false)
                                    <option value="{{$data->idd->suffixes[0]}}" {{ old('country_code') == $data->idd->suffixes[0] ? 'selected' : '' }}>  {{($data->idd->suffixes[0])}} </option>
                                    @endif
                                  @endforeach
                            </select>                            
                            @if ($errors->has('country_code'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country_code') }}</strong>
                            </span>
                            @endif 
                        </div>
                        <div class="form-group">

                          <label for="exampleInputEmail1">Number:<span style="color:red;">*</span></label>

                          <input type="text" class="form-control" id="number" name="number" placeholder="Enter the Number" value="{{old('number')}}">
                          @if ($errors->has('number'))
                          <span class="invalid-feedback error" role="alert">
                          <strong>{{ $errors->first('number') }}</strong>
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