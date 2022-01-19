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
    <div class="container-fluid  ">
      <div class="row mb-2">
        <div class="card-body">
          <div class=" mt-2 ">
            <table class="table table-responsive w-100" id="mytable">
              <div>
                <h3 class="text-info ml-5 mt-5 mb-4">Order Details</h3>
              </div>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Customer</th>
                  <th>Address</th>
                  <th>Products</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                  <?php $cnt=1;?>
                  @foreach($orders as $order)
                    <tr>
                      <td>{{$cnt}}</td>
                      <td>{{$order[2]->firstname}} {{$order[2]->lastname}}</td>
                      <td>{{$order[0]->address}}</td>
                      <td> 
                        <ul>
                          @foreach($order[1] as $orderP)
                           <li>
                              Name:{{$orderP->pname}}
                           </li>
                          @endforeach
                        </ul>                        
                      </td>
                      <td>{{$order[0]->amount}}</td>
                    </tr>
                    <?php $cnt++?>
                  @endforeach
              </tbody>
            </table>
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