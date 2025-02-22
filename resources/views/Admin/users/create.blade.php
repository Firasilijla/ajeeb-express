@extends('Admin.layouts.app')
@section('title', 'User-Create')
@section('Breadcrumb')

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
<!--end::Title-->
<!--begin::Separator-->
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200"> </div>
<!--end::Separator-->
<!--begin::Search Form-->
<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">User</span>
</div>
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200"> </div>

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
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <!-- سبيريتور (فاصل) -->
                    <div class="border-bottom w-100 my-3"></div>
                </div>
            </div>

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

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="row">
                    <!-- Name and Email fields (for large screens, 2 fields per row) -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                            @error('name') 
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                            @error('email') 
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- Password and Confirm Password fields (2 fields per row) -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="form-control">
                            @error('password') 
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input type="password" name="confirm-password" value="{{ old('confirm-password') }}" placeholder="Confirm Password" class="form-control">
                            @error('confirm-password') 
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- Role selection (span all columns) -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select name="roles[]" class="form-control" multiple="multiple">
                                @foreach ($roles as $value => $label)
                                <option value="{{ $value }}" {{ in_array($value, old('roles', [])) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                                @endforeach
                            </select>
                            @error('roles') 
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection