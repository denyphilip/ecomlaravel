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
            <h1 class=" bg jumbotron text-center text-white">Add Product</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
                                @csrf()
                                <div class="form-group">
                                    <label for="category">Choose a category:</label>
                                    <select name="category" id="category" class="form-control form-control-lg">
                                    @foreach($catdata as $selectdata)
                                            <option value="{{$selectdata->id}}" >{{$selectdata->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="pname" class="form-control" placeholder="Enter pname"/>
                                    @if($errors->has('pname'))
                                        <label class="alert alert-danger">{{$errors->first('pname')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter price"/>
                                    @if($errors->has('price'))
                                        <label class="alert alert-danger">{{$errors->first('price')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity"/>
                                    @if($errors->has('quantity'))
                                        <label class="alert alert-danger">{{$errors->first('quantity')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Features</label>
                                    <textarea name="features" class="form-control" placeholder="Enter Features"></textarea>
                                    @if($errors->has('features'))
                                        <label class="alert alert-danger">{{$errors->first('features')}}</label>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" name="file[]" class="form-control" multiple/>
                                    @if($errors->has('file'))
                                        <label class="alert alert-danger">{{$errors->first('file')}}</label>
                                    @endif
                                </div>
                                <div>
                                <button type="submit" class="btn btn-success">Add Product</button>
                                <a href="{{url('products')}}" class="btn btn-primary">Back</a>
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