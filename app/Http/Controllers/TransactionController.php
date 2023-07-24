<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    // ---------- deposit -----
    // ---admin 
    function getDeposit()
    {
        return view('Admin.Deposit.index');
    }
    function getTranaction()
    {
        return view('User.Tranaction.index');
    }
    

    public function Depositindex(Request $request)
    {

        if ($request->ajax()) {
            $data = Transaction::with("users")->where('type', 'LIKE', 'DEPOSIT%')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $data = "";
                    if ($row->status == 0) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-danger  label-inline" style="margin:2px"><span>انجاز الإيداع</span></a>';
                    }
                    if ($row->status == 1) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-success  label-inline" style="margin:2px">الغاء</a>';
                    }

                    return   $data;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Deposit.index');
    }
    //  ---- user 
    public function UsergetDeposit()
    {
        return view('User.Deposit.index');
    }
    public function DepositAmount(Request $request)
    {
        DB::beginTransaction();
        try {


            if (!empty($request->quantites)) {

                if (intval($request->quantites) > 0) {
                    $type = $request->type;
                    if ($type == "BTC") {
                        $type = "DEPOSIT_BTC";
                    } else if ($type == "ETH") {
                        $type = "DEPOSIT_ETH";
                    }else
                    if ($type == "LTC") {
                        $type = "DEPOSIT_LTC";
                    }else{
                  
                        $type = "DEPOSIT_USD";
                    }
                    $data = [
                        'user_id' => Auth::user()->id,
                        'quantites' => $request->quantites,
                        'quantites_convert' => $request->quantites_convert,
                        'type' => $type,
                        'withdrow_address' => null,
                        'withdrow_type' => null,
                        'status' => '0'
                    ];

                    Transaction::create($data);
                } else {
                    return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " Please reset deposit_amount  to positvie number"]);
                }
            } else {
                return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " Please fill in the data correctly"]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1',  'title' => "   The Deposit operation success  ", 'msg' => 'Please wait a few minutes, maybe 5 to 30 minutes']);
    }
    function UsergetDepositBitcoin()
    {
        return view('User.Deposit.BTC');
    }
    function UsergetDepositEthereum()
    {
        return view('User.Deposit.ETH');
    }
    function UsergetDepositTether()
    {
        return view('User.Deposit.USD');
    }
    function UsergetDepositLTC()
    {
        return view('User.Deposit.LTC');
    }
    // ----------withdrow 
    function getWithdrow()
    {
        return view('Admin.Withdrow.index');
    }    function WithdrowIndexUser()
    {
        return view('User.Withdrow.index');
    }
    function UsergetWithdrow()
    {
        return view('User.Withdrow.WithdrowType');
    }
    public function Withdrowindex(Request $request)
    {

        if ($request->ajax()) {
            $data = Transaction::with("users")->where('type', 'WITHDROW')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $data = "";
                    if ($row->status == 0) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-danger  label-inline" style="margin:2px"><span>انجاز السحب</span></a>';
                    }
                    if ($row->status == 1) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-success  label-inline" style="margin:2px">الغاء</a>';
                    }

                    return   $data;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Withdrow.index');
    }
    //  ---- user 

  
    public function  getAmount()
    {
        $data =   DB::table('transactions')
            ->selectRaw('sum(quantites) as quantites')
            ->where('user_id', '=', Auth::user()->id)->where('type', 'WITHDROW')->where('status', 0)
            ->get();

        return $data[0]->quantites;
    }
    public function WithdrowAmount(Request $request)
    {
        DB::beginTransaction();
        try {


        //   if(Auth::user()->is_trading==0){
            if (!empty($request->withdrow_amount) && !empty($request->withdrow_address)) {
                $amount = Auth::user()->total_amount;
                if ($amount - ($this->getAmount() + $request->withdrow_amount) >= 0 && $request->withdrow_amount >= 0) {

                    $data = [
                        'user_id' => Auth::user()->id,
                        'quantites' => $request->withdrow_amount,
                        'quantites_convert' => $request->withdrow_amount,
                        'type' => "WITHDROW",
                        'withdrow_address' => $request->withdrow_address,
                        'withdrow_type' => "TRC",
                        'status' => '0'
                    ];

                    Transaction::create($data);
                } else {
                    return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " The wallet is not enough to fill your withdrawals or Please reset withdrow_amount  to positvie number"]);
                }
            } else {
                return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " Please fill in the data correctly"]);
            }

        //   }else{
        //     return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => "Your Balanced in Trading ^__^"]);


        //   }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1',  'title' => "   The withdrow operation success  ", 'msg' => 'Please wait a few minutes, maybe 5 to 30 minutes']);
    }
    // ----------TRX 
    function getTRX()
    {
        return view('Admin.TRX.index');
    }

    public function TRXindex(Request $request)
    {

        if ($request->ajax()) {
            $data = Transaction::with("users")->where('type', 'TRX')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $data = "";
                    if ($row->status == 0) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-danger  label-inline" style="margin:2px"><span> Accept Trx</span></a>';
                    }
                    if ($row->status == 1) {
                        $data = '<a data-toggle="modal" data-target="#modal-xl"  href="javascript:void(0)"  data-id="' . $row->id . '" data-status="' . $row->status . '"  class="change_status label label-lg font-weight-bold label-light-success  label-inline" style="margin:2px">Cancel</a>';
                    }

                    return   $data;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.TRX.index');
    }
    //  ---- user 

    function UsergetTRX()
    {
        return view('User.TRX.index');
    }
    // -------- excuteOperation 
    public function excuteOperation(Request $request)
    {

        if ($request->ajax()) {
            $transaction = Transaction::with("users")->where('id', $request->transaction_id)->first();
            if ($request->status == 0) {
                if ($transaction->type == "WITHDROW") {
                    if (($transaction->users->total_amount - $transaction->quantites) > 0) {
                        $userData = [
                            'total_amount' => ($transaction->users->total_amount - $transaction->quantites)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);

                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه السحب بنجاح  "]);
                    } else {
                        return response()->json(['status' => '0', 'msg' => "المبلغ في المحفظه لديه غير كافي "]);
                    }
                }
                if ($transaction->type == "DEPOSIT_USD" || $transaction->type == "DEPOSIT_LTC"   || $transaction->type == "DEPOSIT_ETH" || $transaction->type == "DEPOSIT_BTC") {

                    if (($transaction->quantites_convert) <= 0) {
                        return response()->json(['status' => '0', 'msg' => "المبلغ    الذي ارسلته غير صحيح "]);
                    } else {
                        $userData = [
                            'total_amount' => ($transaction->users->total_amount + $transaction->quantites_convert)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);

                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه الايداع بنجاح  "]);
                    }
                }
                if ($transaction->type == "TRX") {

                    if (($transaction->quantites_convert) <= 0) {
                        return response()->json(['status' => '0', 'msg' => "المبلغ    الذي ارسلته غير صحيح "]);
                    } else {
                        $userData = [
                            'total_trx' => ($transaction->users->total_trx + $transaction->quantites_convert)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);

                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه الايداع بنجاح  "]);
                    }
                }
            } else {
                if ($transaction->type == "WITHDROW") {
                    if (($transaction->quantites) > 0) {
                        $userData = [
                            'total_amount' => ($transaction->users->total_amount + $transaction->quantites)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);

                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه التراجع  عن السحب بنجاح  "]);
                    } else {
                        return response()->json(['status' => '0', 'msg' => "المبلغ    المودع غير صحيح  "]);
                    }
                }
                if ($transaction->type == "DEPOSIT_USD" || $transaction->type == "DEPOSIT_LTC"   || $transaction->type == "DEPOSIT_ETH" || $transaction->type == "DEPOSIT_BTC") {

                    if (($transaction->users->total_amount - $transaction->quantites_convert) <= 0) {
                        return response()->json(['status' => '0', 'msg' => "       عذرا لا يمكنك التراجع عن العمليه لان المحفظه لا تحتوي على المبلغ الكافي "]);
                    } else {
                        $userData = [
                            'total_amount' => ($transaction->users->total_amount - $transaction->quantites_convert)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);
                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه التراجع عن الايداع بنجاح  "]);
                    }
                }
                if ($transaction->type == "TRX") {

                    if (($transaction->users->total_trx - $transaction->quantites_convert) < 0) {
                        return response()->json(['status' => '0', 'msg' => "المبلغ    الذي ارسلته غير صحيح "]);
                    } else {
                        $userData = [
                            'total_trx' => ($transaction->users->total_trx - $transaction->quantites_convert)
                        ];
                        User::where('id', $transaction->users->id)->update($userData);

                        $TransactionData = [
                            'status' => ($request->status == '0') ? '1' : '0'
                        ];
                        Transaction::where('id', $transaction->id)->update($TransactionData);
                        return response()->json(['status' => '1', 'msg' => "    تمت عمليه الايداع بنجاح  "]);
                    }
                }
            }
        }
    }

    // ----------- user trx ------- 


    public function TRXAmount(Request $request)
    {
        DB::beginTransaction();
        try {


            if (!empty($request->trx_amount)) {
                $amount = Auth::user()->total_amount;
                if ($amount - ($this->getAmount() + $request->withdrow_amount) >= 0 && $request->withdrow_amount >= 0) {

                    $data = [
                        'user_id' => Auth::user()->id,
                        'quantites' => $request->receive_amount,
                        'quantites_convert' => $request->receive_amount,
                        'type' => "TRX",
                        'withdrow_address' => null,
                        'withdrow_type' => null,
                        'status' => '0'
                    ];

                    Transaction::create($data);
                } else {
                    return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " The wallet is not enough to fill your withdrawals or Please reset withdrow_amount  to positvie number"]);
                }
            } else {
                return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => " Please fill in the data correctly"]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status' => '0', 'title' => "   The operation failed  ", 'msg' => $ex->getMessage()]);
            // something went wrong
        }

        return response()->json(['status' => '1',  'title' => "   The withdrow operation success  ", 'msg' => 'Please wait a few minutes, maybe 5 to 30 minutes']);
    }
    function acceptTRXAmount(Request $request)
    {
        return view('User.TRX.acceptTrx')->with('usd', $request->usd);
    }
    function getQrPgae()
    {
        return view('User.TRX.QrPage');
    }

    function getTranactionData(){
        // $data=Transaction::where('status','1')->get();
        $data=Transaction::get();

        return response()->json($data);
    }
    function getTranactionUserData(Request $request){
        $data=Transaction::where('user_id', Auth::user()->id)->get();
        return response()->json($data);
    }
    function getTranactionDetails(Request $request){
        $data=Transaction::where('id', $request->id)->first();
        return response()->json($data);
    }
    
}
