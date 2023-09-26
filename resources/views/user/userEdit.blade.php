@include('layouts.header')
@include('layouts.nav')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8" >
            <h1 class="m-0 text-dark">Update User</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
          <a class="btn btn-primary" href="{{url('contact/list')}}">Back</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Update User</li>
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
                <h3 class="card-title">Update User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{url('contact/update')}}" method="post" id="edit-user">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->name }}">
                    @if ($errors->has('user_name'))
                    <span class="invalid-feedback error" role="alert">
                    <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                    @endif 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="user_email" name="user_email" value="{{ $user->email }}">
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
      </div>

    </section>

</div>

<script>
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  
  $( "#edit-user" ).validate({
  rules: {
    user_name:{
      required: true,
      minlenght: 5,
    },      
    user_email:{
      required: true,
      
    },
    
  	
  },
   messages: {
      user_name: {
      required: "User Name is required",

     }, 
     user_email: {
      required: "Email is required",
     },      
      
   
    },
  
});

}); 
</script>
@include('layouts.footer')