@extends('Admin.layouts.app')
@section('title', 'Roles-Create')
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
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Create</span>
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

            <!-- إذا كانت هناك أخطاء -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- نموذج الادخال -->
            {!! Form::open(array('route' => 'admin.roles.store', 'method'=>'POST')) !!}
            <div class="row">
                <!-- الحقل الخاص بالاسم -->
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Enter Role Name', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <!-- البيرمشن -->
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>Permissions:</strong><br />
                        <div class="d-flex flex-wrap">
                            @foreach($permission as $value)
                                <div class="form-check form-check-inline m-2">
                                    <label class="form-check-label">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'form-check-input')) }}
                                        {{ $value->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- زر التقديم على اليمين -->
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>



@endsection