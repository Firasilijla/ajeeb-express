@extends('Admin.layouts.app')
@section('title', 'All-Users')
@section('Breadcrumb')

<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
<!--end::Title-->
<!--begin::Separator-->
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200">  </div>
<!--end::Separator-->
<!--begin::Search Form-->
<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">User</span>
</div>
<div class="subheader-separator subheader-separator-ver mt- mb-2 ml-2 mr-2 bg-gray-200">  </div>

<div class="d-flex align-items-center " id="kt_subheader_search">
    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">All</span>
</div>
@endsection
@section('contents')
<div class="container">
    <div class="card card-custom">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="d-flex bg-primary  align-items-center justify-content-end  ">
                        <a class="btn btn-white m-2" href="{{ route('admin.users.create') }}"><i class="text-primary fa fa-plus"></i> Create New User</a>
                    </div>
                </div>
            </div>
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif -->

            <!-- جعل الجدول ريسبونسف هنا -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.users.show',$user->id) }}"><i class=" fa fa-solid fa-list"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit',$user->id) }}"><i class=" fa-solid fa-pen-to-square"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- نهاية التغيير -->
        </div>
    </div>
</div>




@endsection