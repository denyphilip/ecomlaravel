<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed mt-5">
  @include('admin.includes.nav')
  @include('admin.includes.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper text-center">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h2 class="text-center">
            Reports
        </h2>
        <div class="container-fluid mt-3 ">
            <div class="row mb-2">
                <div class="card col-sm-6">
                    <div class="card-header">
                        Registered users report:
                    </div>
                    <p class="card-body">
                        <a href="{{route('userscsv')}}"  id="export" class="btn btn-primary">Download</a>
                    </p>
                </div>
                <div class="card col-sm-6">
                    <div class="card-header">    
                        Sales report:
                    </div>
                    <p class="card-body">
                        <a href="{{route('ordercsv')}}"  id="export" class="btn btn-primary">Download</a>
                    </p>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
    <!-- /.content-header -->
  @include('admin.includes.foot')
  </body>
</html>

