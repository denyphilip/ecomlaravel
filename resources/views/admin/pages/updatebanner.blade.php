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
            <h1 class=" bg jumbotron text-center text-white">Update Banner</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('banners/'.$banner->id)}}" enctype="multipart/form-data">
                                @csrf()
                                @method('PUT')
                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" class="form-control" id="caption" name="caption"  placeholder="Enter caption" value="{{$banner->caption}}">
                                    @if($errors->has('caption'))
                                        <label  class="alert alert-danger">{{$errors->first('caption')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control"  name="image" >
                                    <img src="{{asset('/uploads/'.$banner->image)}}" width="50" height="50"><br>
                                    @if($errors->has('image'))
                                        <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-warning">Update Banner</button>
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