<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @include('admin.includes.nav')
  @include('admin.includes.sidebar')
  <div class="content-wrapper mt-5">
        <!-- Content Header (Page header) -->
        <div class="content-header ">
            <h1 class=" bg jumbotron text-center text-white">Add User</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('users')}}">
                                @csrf()
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="Enter firstname">
                                    @if($errors->has('firstname'))
                                        <label  class="alert alert-danger">{{$errors->first('firstname')}}</label>
                                    @endif 
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter lastname">
                                    @if($errors->has('lastname'))
                                        <label  class="alert alert-danger">{{$errors->first('lastname')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email">
                                    @if($errors->has('email'))
                                        <label  class="alert alert-danger">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                        <label  class="alert alert-danger">{{$errors->first('password')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder=" Enter Confirm Password">
                                    @if($errors->has('cpassword'))
                                        <label  class="alert alert-danger">{{$errors->first('cpassword')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <label for="status">Status</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="active" name="status" class="custom-control-input" value="1" checked="checked">
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="inactive" name="status" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                </div>
                                @if($errors->has('status'))
                                        <label  class="alert alert-danger">{{$errors->first('status')}}</label>
                                    @endif
                                <div>
                                    <label for="role">Role</label>
                                
                                    <select class="form-control" name="role">
                                    <option value="" disables selected>Select type</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                    
                    
                                
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-success">Add User</button>
                                </div>
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
  </div>
    <!-- /.content-header -->       
    @include('admin.includes.foot')
  </body>
</html>