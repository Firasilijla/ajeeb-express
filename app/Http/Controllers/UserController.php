<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserLoginReuest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_deleted', 0)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $d = '
                    <td class="text-right pr-0">
                    <div class="btn-group btn-group-sm ">
                     
                       <a  href="javascript:void(0)"  data-id="' . $row->id . '"   class="btn btn-icon btn-light btn-hover-danger btn-sm  delete-user">
                       <span class="svg-icon svg-icon-md svg-icon-danger">
                           <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                               <rect x="0" y="0" width="24" height="24"></rect>
                                                  <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                  <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                              </g>
                                  </svg>
                           <!--end::Svg Icon-->
                       </span>
                   </a>                   
              

         
                     <a  data-toggle="modal" data-target="#exampleModalSizeXl" href="javascript:void(0)" class="btn btn-icon btn-light btn-hover-success btn-sm edit-user" data-id="' . $row->id . '"   >
		               <span class="svg-icon svg-icon-md svg-icon-success">
			            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <rect x="0" y="0" width="24" height="24"></rect>
                                   <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                   <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                               </g>
                           </svg>
	                   		<!--end::Svg Icon-->
	                   	</span>
	                   </a>
                
                
                   <a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->n_password . '"  class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3 show_pass">
                    <span class="svg-icon svg-icon-md svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                            <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                        </g>
                    </svg>
                        <!--end::Svg Icon-->
                    </span>
                    </a>

                </div></td>';

                    return   $d;
                })
                ->addColumn('status', function ($row) {
                    $data = "";
                    if ($row->status == 0) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="1"  class="change_status label label-lg font-weight-bold label-light-danger  label-inline" style="margin:2px"><span>تفعيل</span></a>';
                    }
                    if ($row->status == 1) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="0"  class="change_status label label-lg font-weight-bold label-light-success  label-inline" style="margin:2px">تعطيل</a>';
                    }

                    return   $data;
                })
                ->addColumn('type', function ($row) {

                    $d = "";
                    if ($row->type === "admin") {
                        $d = "";
                        $d = '<span class="label label-lg font-weight-bold label-light-success  label-inline" style="width:50px">مدير</span>';
                    }
                    if ($row->type === "user") {
                        $d = '<span class="label label-lg font-weight-bold label-light-danger  label-inline" style="width:50px">موظف</span>';
                    }
                    return   $d;
                })
                ->rawColumns(['action', 'status', 'type'])
                ->make(true);
        }

        return view('Admin.UsersManagement.index');
    }
    public function indexVerify(Request $request)
    {

        if ($request->ajax()) {
            $data = User::where('is_deleted', 0)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $data = "";
                    if ($row->verify == 0) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="1"  class="change_status label label-lg font-weight-bold label-light-danger  label-inline" style="margin:2px"><span>غير موثق</span></a>';
                    }
                    if ($row->verify == 1) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="0"  class="change_status label label-lg font-weight-bold label-light-success  label-inline" style="margin:2px">موثق</a>';
                    }

                    return   $data;
                })
                ->addColumn('identity', function ($row) {
                    $url = $row->identity;
                    return '<div class="d-flex align-items-center">
                    <div class="symbol symbol-50 flex-shrink-0">
                        <img src="' .  $url . '" alt="photo">
                    </div>
               
                </div>';
                    // return '<img src="' . $url . '" border="0"   width="50px" height="50px;"  border-radius: 50%;" class="img-rounded" align="center" />';
                })
                ->rawColumns(['action', 'identity'])
                ->make(true);
        }

        return view('Admin.UsersManagement.index');
    }

    public function users()
    {
        return  view('Admin.UsersManagement.index');
    }
    public function usersVerify()
    {
        return  view('Admin.UsersManagement.usersVerify');
    }

    public function changeStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = DB::table('users')->where('id', $request->id)->update(['status' => $request->status]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => 'Error in changeStatus']);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in changeStatus']);
    }


    public function acceptsVerify(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = DB::table('users')->where('id', $request->id)->update(['verify' => $request->status]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => 'Error in changeStatus']);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in changeStatus']);
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            // $user = DB::table('users')->where('id', $request->id)->first();

            // // File::delete($user->avatar);

            // // --------------------------
            // DB::table('courses')->where('user_id', $request->id)->delete();
            // DB::table('qualifications')->where('user_id', $request->id)->delete();
            // DB::table('users')->where('id', $request->id)->delete();
            $user = DB::table('users')->where('id', $request->id)->update(['is_deleted' => 1]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => '0', 'msg' => 'Error in delete']);
        }
        return response()->json(['status' => '1', 'msg' => 'Success in delete']);
    }

    public function Useredit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return Response()->json($user);
    }

    public function updateUser(UserUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            $userdata = [

                'fname' => $request->fname,
                'lname' => $request->lname,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' =>  Hash::make($request->password),
                'n_password' => $request->password,
                'type' => $request->type

            ];

            $admis = DB::table('users')->where('id', $request->user_id)->update($userdata);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1', 'msg' => 'Success to update user']);
    }

    public function StoreUser(UserUpdateRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->n_password = $request->password;
            $user->type = $request->type;
            $user->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1', 'msg' => 'Success to Store user']);
    }



    function register()
    {
        if (!session()->has("loggedInUser")) {
            return view('User.Auth.register');
        } else {
            return redirect('/profile');
        }
    }
    function forgot()
    {
        return view('User.Auth.forgot');
    }

    function reset()
    {
        return view('User.Auth.reset');
    }
    function profile()
    {
        DB::beginTransaction();
        try {
            $data = ['userInfo' => DB::table('users')->where('id', session('loggedInUser'))->first()];
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '400', 'msg' => $ex->getMessage()]);
        }
        return view('User.profile', $data);
    }
    // ------------------------------------------------- 
    function saveUser(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '400', 'msg' => $ex->getMessage()]);
        }
        return response()->json(['status' => '200', 'msg' => 'Success SaveUser']);
    }
    function loginUser(UserLoginReuest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loggedInUser', $user->id);
                    return response()->json(['status' => '200', 'msg' => 'Success Login']);
                } else {
                    return response()->json(['status' => '401', 'msg' => 'E-mail or Password incorrect ']);
                }
            } else {
                return response()->json(['status' => '404', 'msg' => "User not found !"]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '400', 'msg' => $ex->getMessage()]);
        }
        return response()->json(['status' => '200', 'msg' => 'Success Login']);
    }
    function profileImageUpdate(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id)->first();
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $file->storeAs("public/User/images/", $fileName);
            if ($user->picture) {
                Storage::delete("public/User/images/", $user->picture);
            }
        }
        User::where('id', $user_id)->update(['picture' =>  $fileName]);
        return response()->json(['status' => '200', 'msg' => "Successfully Updated Image"]);
    }
    public function Update_profile(Request $request)
    {
        $userdata = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,

        ];
        $data =  User::where('id', $request->id)->update($userdata);



        return response()->json(['status' => '200', 'msg' => " $data Successfully $request->id Updated  $request->name Profile  $request->email Data  $request->gender .."]);
    }

    function logout()
    {

        if (session()->has('loggedInUser')) {
            session()->pull('loggedInUser');
            return redirect("/");
        }
    }

    // --------------profile ------- 
    

    function editProfile()
    {
        return view('User.Profile.edit');
    }

    function profiledata()
    {
      $user=  User::where('id', Auth::user()->id)->first();
        return response()->json( $user);
    }

    

    public function updateProfile(UpdateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = DB::table('users')->where('id',  Auth::user()->id)->first();

            $path = "";
            if ($request->has("profile_avatar")) {
                $file = $request->file('profile_avatar');
                $filename =  $file->hashName();
                $path = 'assets/media/images/users/' . $filename;
                $file->move(public_path('assets/media/images/users/'), $filename);
            }

            $userdata = [

                'fname' => $request->fname,
                'lname' => $request->lname,
                'username' => $request->username,
                // 'email' => $request->email,
                'phone' => $request->phone,
                'password' =>  Hash::make($request->password),
                'n_password' => $request->password,
                'passcode' => $request->passcode,
                'avatar' => (!empty($path)) ? $path : $data->avatar,
            ];

            $admis = DB::table('users')->where('id', Auth::user()->id)->update($userdata);


            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1', 'msg' => 'Success to update Profile']);
    }
}
