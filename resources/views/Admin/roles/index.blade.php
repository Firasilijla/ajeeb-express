@extends('Admin.layouts.app')
@section('title', 'All-Roles')
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
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All</span>
</div>
@endsection
@section('contents')
<div class="container " dir="{{ \App\Helpers\Helper::getTextDirection() }}">
    <div class="card card-custom">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="d-flex bg-primary  align-items-center justify-content-end  ">
                        <a class="btn btn-success m-2" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                    </div>
                </div>
            </div>
<!--           
            @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

            @endif -->



            <table class="table table-bordered">

                <tr>

                    <th>No</th>

                    <th>Name</th>

                    <th width="280px">Action</th>

                </tr>

                @foreach ($roles as $key => $role)

                <tr>

                    <td>{{ ++$i }}</td>

                    <td>{{ $role->name }}</td>

                    <td>

                        <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">Show</a>

                        @can('role-edit')

                        <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>

                        @endcan

                        @can('role-delete')

                        {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}

                        @endcan

                    </td>

                </tr>

                @endforeach

            </table>

            <!-- نهاية التغيير -->
        </div>
    </div>
</div>




@endsection