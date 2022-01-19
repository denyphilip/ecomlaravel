<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('admin.includes.nav')
    @include('admin.includes.sidebar')
    <div class="content-wrapper mt-5">
        <div class="content-header ">
            <h1 class=" bg jumbotron text-center text-white">Update Coupon</h1>
            <div class="container-fluid  ">
                <div class="row mb-2">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <div class="col-sm-6 mt-2 ">
                            <form method="post" action="{{url('coupons/'.$data->id)}}">
                                @csrf()
                                @method('PUT')
                                <div>
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$data->code}}" />
                                    @if($errors->has('code'))
                                        <label class="text-danger">{{$errors->first('code')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <label for="type">Type</label> 
                                    <select name="type" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="fixed" {{($data->type=='fixed')?'selected':''}}>Fixed</option>
                                        <option value="percent" {{($data->type=='percent')?'selected':''}}>Percent</option>
                                    </select>
                                    <label for="value">Value</label>
                                    <input type="number" class="form-control" name="value" value="{{$data->value}}" />
                                    @if($errors->has('value'))
                                        <label class="text-danger">{{$errors->first('value')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <label for="cart_value"> Cart value</label>
                                    <input type="number" class="form-control" name="cart_value" value="{{$data->cart_value}}" />
                                    @if($errors->has('cart_value'))
                                        <label class="text-danger">{{$errors->first('cart_value')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <label for="status"> Status</label> 
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="1" {{$data->status=="1"?'checked':''}}>Active
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="0" {{$data->status=="0"?'checked':''}}>Inactive
                                        </label>
                                    </div>
                                    @if($errors->has('status'))
                                        <label class="text-danger">{{$errors->first('status')}}</label>
                                    @endif
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-warning">Update Coupon</button>
                                </div>
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div><!-- /.content-header -->
    </div>
    @include('admin.includes.foot')
</body>
</html>