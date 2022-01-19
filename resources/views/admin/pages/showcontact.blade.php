<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('admin.includes.nav')
    @include('admin.includes.sidebar')
    <div class="content-wrapper mt-5">
        <div class="container-fluid  ">
            <div class="row mb-2">
                <div class="card-body">
                    <div class="mt-2 ">
                        <div class="card-body">
                            <table class="table table-responsive w-100" id="mytable">
                                <div >
                                    <h2 class="text-primary">Contact Details</h2>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sn=1;
                                    @endphp
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$sn}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->mobile}}</td>
                                            <td>{{$contact->message}}</td>
                                        </tr>
                                        @php
                                            $sn++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <span>{{$contacts->links()}}</span>
                        </div>
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