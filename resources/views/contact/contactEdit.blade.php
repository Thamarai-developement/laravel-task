@include('layouts.header')
@include('layouts.nav')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" >
            <h1 class="m-0 text-dark">Update Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
          <a class="btn btn-primary" href="{{url('contact/list')}}">Back</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Contact</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form role="form" action="{{url('contact/update')}}" method="post" id="edit-contact">
                @csrf
                @method('PUT')
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select User:<span style="color:red;">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="user_id">
                            @foreach($users as $user)
                            <option value="{{$user['id']}}" {{ $user['id'] == $contact->user_id ? 'selected' : '' }}>{{$user['name']}}</option>
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
                            <select class="form-control select2" style="width: 100%;" name="country_code">
                                  @foreach($country_codes as $data)
                                    @if(empty($data->idd->suffixes) == false)
                                    <option value="{{$data->idd->suffixes[0]}}" {{ $data->idd->suffixes[0] == $contact->country_code ? 'selected' : '' }}>  {{($data->idd->suffixes[0])}} </option>
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

                          <input type="text" class="form-control" id="number" name="number" placeholder="Enter the Number" value="{{$contact->number}}">
                          @if ($errors->has('number'))
                          <span class="invalid-feedback error" role="alert">
                          <strong>{{ $errors->first('number') }}</strong>
                          </span>
                          @endif 
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

    </section>

</div>

@include('layouts.footer')