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
      <h1 class=" bg jumbotron text-center text-white">Add CMS</h1>
        <div class="container-fluid  ">
          <div class="row mb-2">
            <div class="card-body">
              @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
              @endif
              <div class="col-sm-6 mt-2 ">
                <form method="post" action="{{url('cms')}}" enctype="multipart/form-data">
                  @csrf()
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">
                    @if($errors->has('title'))
                      <label  class="alert alert-danger">{{$errors->first('title')}}</label>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
                      @if($errors->has('body'))
                        <label class="alert alert-danger">{{$errors->first('body')}}</label>
                      @endif
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control"  name="image" >
                    @if($errors->has('image'))
                      <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                    @endif
                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-success">Add CMS</button>
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