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
            <a class="btn btn-primary" href="{{url('user/create')}}">Create User</a>
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
        <div class="alert alert-success suc-msg">
        <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-list" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($users)>0)
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                            <form method="post" action="{{url('user/delete',$user->id)}}" id="userDelete">
                                                <a href="{{ url('user/edit',$user->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                                <a href="{{ url('user/show',$user->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                                    @method('delete')
                                                    @csrf
                                                    <i  onclick="return myFunction();" class="nav-icon fas fa-trash-alt"></i>
                                            </form>
                                            </td>
                                             </tr>
        
                                        @endforeach
                                    @else
                                        <tr >
                                            <td colspan="4" class="no-data">No Data Found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
  
                                {!! $users->links() !!}  
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Delete Modal-->

<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Confirm Notification</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Are you sure , Do you want to <span style="color:red;">DELETE</span> It ?</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" type="button" data-dismiss="modal" id="delete">Delete</a>
</div>
</div>
</div>
</div>

<script>
  function myFunction() {
    if(!confirm("Are You Sure to delete this")){
      event.preventDefault();
    }
    else{
        $("#userDelete").submit();
    }
  }
 </script>
@include('layouts.footer')