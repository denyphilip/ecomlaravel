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
            <h1 class=" bg jumbotron text-center text-white">Update Category</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('categories/'.$cat->id)}}">
                                @csrf()
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$cat->name}}"/>
                                    @if($errors->has('name'))
                                        <label class="alert alert-danger">{{$errors->first('name')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter description">{{$cat->description}}</textarea>
                                    @if($errors->has('description'))
                                        <label class="alert alert-danger">{{$errors->first('description')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-warning">Update Category</button>
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