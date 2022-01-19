<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @include('admin.includes.nav')
  @include('admin.includes.sidebar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.delbanner').click(function(e){

                    if(confirm("Are you sure you want to delete this?")){
                        var cid=$(this).attr("cid");
                        $.ajax({
                            url:"banners/"+cid,
                            type:'delete',
                            data:{_token:'{{csrf_token()}}',cid:cid},
                            success:function(response){
                            
                                $("#mytable").load(location.href + " #mytable");
                            }
                        });
                    }
            else{
                return false;
            }   
                });
            });
        </script>
    <div class="content-wrapper mt-5">
    <!-- Content Header (Page header) -->
        <div class="container-fluid  ">
            <div class="row mb-2">
                <div class="card-body">   
                    <div class=" mt-2 ">
                        <table class="table table-responsive w-100" id="mytable">
                            <div>
                                <a href="{{url('banners/create')}}" class="btn btn-success ml-5 mt-5 mb-4">Add Banner</a>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col"> Caption</th>
                                    <th scope="col"> Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn=1;
                                @endphp
                                @foreach($banners as $banner)
                                    <tr>
                                        <td>{{$sn}}</td>
                                        <td>{{$banner->caption}}</td>
                                        <td>
                                        <img src="{{asset('/uploads/'.$banner->image)}}" width="50" height="50"><br>
                                        </td>
                                        <td>
                                            <a href="{{url('banners/'.$banner->id.'/edit')}}" class="btn   mr-2" ><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" cid="{{$banner->id}}" class="btn text-danger  mt-2 delbanner"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $sn++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <span>{{$banners->links()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.foot')
</body>
</html>
<style>
    .w-5{
        display:none;
    }
</style>