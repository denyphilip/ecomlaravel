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
                $('.delcms').click(function(e){

                    if(confirm("Are you sure you want to delete this?")){
                        var cid=$(this).attr("cid");
                        $.ajax({
                            url:"cms/"+cid,
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
                    <div class="col-sm-6 mt-2 ">
                        <table class="table table-responsive w-100" id="mytable">
                            <div>
                                <a href="{{url('cms/create')}}" class="btn btn-success ml-5 mt-5 mb-4">Add Cms</a>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col"> Body</th>

                                    <th scope="col"> Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn=1;
                                @endphp
                                @foreach($cmss as $cms)
                                    <tr>
                                        <td>{{$sn}}</td>
                                        <td>{{$cms->title}}</td>
                                        <td>{{$cms->body}}</td>
                                        <td>
                                        <img src="{{asset('/uploads/'.$cms->image)}}" width="50" height="50"><br>
                                        </td>
                                        <td>
                                            <a href="{{url('cms/'.$cms->id.'/edit')}}" class="btn   mr-2" ><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" cid="{{$cms->id}}" class="btn text-danger  mt-2 delcms"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $sn++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <span>{{$cmss->links()}}</span>
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