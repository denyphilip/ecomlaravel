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
            <h1 class=" bg jumbotron text-center text-white">Update CMS</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('cms/'.$cms->id)}}" enctype="multipart/form-data">
                                @csrf()
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title" value="{{$cms->title}}">
                                    @if($errors->has('title'))
                                        <label  class="alert alert-danger">{{$errors->first('title')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Body</label>
                                    <textarea name="body" class="form-control" placeholder="Enter body">{{$cms->body}}</textarea>
                                        @if($errors->has('body'))
                                            <label class="alert alert-danger">{{$errors->first('body')}}</label>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control"  name="image" >
                                    <img src="{{asset('/uploads/'.$cms->image)}}" width="50" height="50"><br>
                                    @if($errors->has('image'))
                                        <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-warning">Update CMS</button>
                                </div>
                            </form>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
    </div>
    @include('admin.includes.foot')
</body>
</html>