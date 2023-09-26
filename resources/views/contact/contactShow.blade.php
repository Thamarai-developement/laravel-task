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
            <h1 class="m-0">Show Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
                <a class="btn btn-primary" href="{{url('contact/list')}}">Back</a>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Show contact</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Contact Details</h3>
                        </div>
                        <div class="card-body">
                        
                            <b>User Name:</b>&nbsp;&nbsp;&nbsp;{{$contact->user_detail->name}}
                            <br><br>
                            <b>country code:</b>&nbsp;&nbsp;&nbsp;{{$contact->country_code}}
                            <br><br>
                            <b>Number:</b>&nbsp;&nbsp;&nbsp;{{$contact->number}}

                        </div>          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')