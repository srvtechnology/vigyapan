@extends('admin.layouts.app')


@section('title')
<title>Vigyapan | Manage Customer</title>
@endsection

@section('style')
@include('admin.includes.style')
@endsection

@section('content')
<!-- Top Bar Start -->
@include('admin.includes.header')
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
@include('admin.includes.sidebar')
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Manage Customer</h4>
                    <ol class="breadcrumb pull-right">
              <li class="active"><a href="{{route('admin.customer.add.view')}}"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Add Customer</a></li>
            </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                       <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @include('admin.includes.message')
                                    <div class="table-responsive">
                                        <table class="table" id="example" >
                                            <thead>
                                                <tr>
                                                    <th>Customer name</th>
                                                    <th> Email</th>
                                                    <th> Mobile No.</th>
                                                    <th> Pincode</th>
                                                    <th> City</th>
                                                    <th> State</th>
                                                    <th>Status</th>
                                                    <th class="rm07">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                @foreach ($data as $customer)
                                                <tr>
                                                    <td>{{@$customer->name}}</td>
                                                    <td>{{$customer->email}}</td>
                                                    <td>{{$customer->mobile}}</td>
                                                    <td>{{$customer->pincode}}</td>
                                                    <td>{{@$customer->city}}</td>
                                                    <td>{{@$customer->state}}</td>
                                                    <td>
                                                        @if(@$customer->status=="A")
                                                        Active
                                                        @elseif(@$customer->status=="I")
                                                        Inactive
                                                        @else
                                                        Unverified
                                                        @endif
                                                    </td>
                                                    
                                                    <td class="rm07">
                                                        <a href="javascript:void(0);" class="action-dots" id="action{{$customer->id}}"><img src="{{ URL::to('public/admin/assets/images/action-dots.png')}}" alt=""></a>
                                                        <div class="show-actions" id="show-{{$customer->id}}" style="display: none;">
                                                            <span class="angle"><img src="{{ URL::to('public/admin/assets/images/angle.png')}}" alt=""></span>
                                                            <ul>
                                                                
                                                               {{--  <li><a href="{{route('admin.customer.view',['id'=>@$customer->id])}}">View </a></li> --}}

                                                               <li><a href="{{route('admin.customer.edit',['id'=>@$customer->id])}}">Edit</a></li>


                                                               <li><a href="{{route('admin.customer.delete',['id'=>@$customer->id])}}" onclick="return confirm('Do you want to remove this customer ?')">Delete</a></li>


                                                               <li>
                                                                    @if(@$customer->status=='A')
                                                                   <a href="{{route('admin.customer.status',['id'=>@$customer->id])}}" onclick="return confirm('Do you want to change status for this customer ?')">Inactive</a>
                                                                    @elseif(@$customer->status=='I')
                                                                   <a href="{{route('admin.customer.status',['id'=>@$customer->id])}}" onclick="return confirm('Do you want to change status for this customer ?')"> Active</a>
                                                                   @elseif(@$customer->status=='U')
                                                                    @endif
                                                                    </li>
                                                               
                                                               {{--  @if(@$customer->status!="U")
                                                                <li><a href="#">View Order</a></li>
                                                                @endif --}}
                                                              {{--   
                                                                
																<li><a href="{{route('admin.customer.reset.password',['id'=>@$customer->id])}}" onclick="return confirm('Are you sure you want to reset the password of this customer?')">Reset Password</a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                


                                            </tbody>
                                        </table>
                                    </div>


                                  


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    @include('admin.includes.footer')
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

@endsection

@section('script')
@include('admin.includes.script')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/public/admin/assets/css/dataTables.bootstrap4.min.css">
<script type="text/javascript">
         $(document).ready(function() {
         $('#example').DataTable();
         } );
      </script>

      <script>
         @foreach (@$data as $value)

    $("#action{{$value->id}}").click(function(){
        $('.show-actions:not(#show-{{$value->id}})').slideUp();
        $("#show-{{$value->id}}").slideToggle();
    });
 @endforeach
</script>
@endsection
