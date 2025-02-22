@extends('Admin.layouts.app')
@section('title', 'Roles-Details')
@section('Breadcrumb')

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
<!--end::Title-->
<!--begin::Separator-->
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200">  </div>
<!--end::Separator-->
<!--begin::Search Form-->
<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Roles</span>
</div>
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200">  </div>

<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Details</span>
</div>
@endsection
@section('contents')


<div class="container">
    <div class="card card-custom">
        <div class="card-body">
            <!-- زر الرجوع وسبيريتور -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- زر الرجوع -->
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <!-- سبيريتور (فاصل) -->
                    <div class="border-bottom w-100 my-3"></div>
                </div>
            </div>

            <div class="row">
                <!-- حقل اسم الدور -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>

                <!-- حقل البيرمشن -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            <div class="d-flex flex-wrap">
                                @foreach($rolePermissions as $v)
                                    <label class="permission-label p-2 m-1" style="background-color: #4CAF50; color: white; padding: 8px 15px; border-radius: 5px; font-size: 14px; margin-bottom: 5px;">
                                        {{ $v->name }}
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection