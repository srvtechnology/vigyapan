@extends('admin.layouts.app')


@section('title')
<title>Astroaquila | Add Customer</title>
@endsection

@section('style')
@include('admin.includes.style')
<link href="{{ URL::asset('public/frontend/croppie/croppie.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('public/frontend/croppie/croppie.min.css') }}" rel="stylesheet" />
<style type="text/css">
  .checkBox li {
    width: 33%;
    float: left;
}
.uplodimgfilimg {
    margin-left: 20px;
    padding-top: 20px;
}
.uplodimgfilimg em {
    width: 58px;
    height: 58px;
    position: relative;
    display: inline-block;
    overflow: hidden;
    border-radius: 4px;
}

 .uplodimgfilimg em img{
    position: absolute;
    max-width: 100%;
    max-height: 100%;
  }
/*    .select-pure__option {
    margin-bottom: 65px !important;
 }*/
</style>
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
                    <h4 class="pull-left page-title">Add Customer</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active"><a href="{{route('admin.home')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     @include('admin.includes.message')  
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Customer</h3>
                            </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" action="{{route('admin.customer.add.insert')}}" method="POST" id="add_form" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="category_name">Name</label>
                                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">Email</label>
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">Mobile No</label>
                                        <input type="text" placeholder="Mobile No" id="mobile" class="form-control" name="mobile" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">Password</label>
                                        <input type="text" placeholder="Password" id="password" class="form-control" name="password" >
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group rm03">
                                        <label for="category_name">Address 1</label>
                                        <input type="text" placeholder="Address 1" id="address_one" class="form-control" name="address_one" >
                                    </div>

                                    <div class="form-group rm03">
                                        <label for="category_name">Address 2</label>
                                        <input type="text" placeholder="Address 2" id="address_two" class="form-control" name="address_two" >
                                    </div>


                                     <div class="form-group">
                                        <label for="category_name">Pincode</label>
                                        <input type="text" placeholder="Pincode" id="pincode" class="form-control" name="pincode" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">Landmark</label>
                                        <input type="text" placeholder="Landmark" id="landmark" class="form-control" name="landmark" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">House No/Flat No</label>
                                        <input type="text" placeholder="House No/Flat No" id="house_no" class="form-control" name="house_no" >
                                    </div>

                                    <div class="clearfix"></div>

                                     <div class="form-group">
                                        <label for="category_name">State</label>
                                        <input type="text" placeholder="State" id="state" class="form-control" name="state" >
                                    </div>

                                    <div class="form-group">
                                        <label for="category_name">City</label>
                                        <input type="text" placeholder="City" id="city" class="form-control" name="city" >
                                    </div>






                                    
                                    
                                <div class="clearfix"></div>
                                    <div class="col-lg-12"> <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button></div>
                                </form>

                            </div>
                        </div>
                        <!-- Personal-Information -->
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

<script src="{{ URL::asset('public/frontend/croppie/croppie.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function(){
      jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                    return true;
                } else {
                    return false;
                }
            }, "{{ __('Please enter valid email') }}");
       $("#add_form").validate({
            rules: {
                name: {
                   required:true,
                 },
                  email: {
                    required: true,
                    validate_email: true,
                    remote: {
                          url:  '{{route('admin.customer.check.email')}}',
                          type: "POST",
                          data: {
                            email: function() {
                              return $( "#email").val() ;
                            },
                            _token: '{{ csrf_token() }}',
                          }
                    },
                  },
                  mobile:{
                    required:true,
                  },
                  password:{
                    required:true,
                  },
                  address_one:{
                    required:true,
                  },
                  address_two:{
                    required:true,
                  },
                  pincode:{
                    required:true,
                  },
                  landmark:{
                    required:true,
                  },
                  
                  state:{
                    required:true,
                  },
                  city:{
                    required:true,
                  },

          },
            
        messages: {
          email:{
            remote:'Email already added.Try another.',
          }

        },

        });
    })
</script>
 
@endsection
