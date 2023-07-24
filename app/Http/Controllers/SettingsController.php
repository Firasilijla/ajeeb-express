<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{


    function getSettings()
    {
        return view('Admin.Settings.index');
    }
    function update(Request $request)
    {
        $data = DB::table('settings')->first();
        DB::beginTransaction();
        try {

            $path_Qr_image_eth = "";
            if ($request->has("Qr_image_eth")) {
                $file = $request->file('Qr_image_eth');
                $filename =  $file->hashName();
                $path_Qr_image_eth = 'assets/media/images/QR/' . $filename;
                $file->move(public_path('assets/media/images/QR/'), $filename);
            }
            $path_Qr_image_btc = "";
            if ($request->has("Qr_image_btc")) {
                $file = $request->file('Qr_image_btc');
                $filename =  $file->hashName();
                $path_Qr_image_btc = 'assets/media/images/QR/' . $filename;
                $file->move(public_path('assets/media/images/QR/'), $filename);
            }

            $path_Qr_image_teh = "";
            if ($request->has("Qr_image_teh")) {
                $file = $request->file('Qr_image_teh');
                $filename =  $file->hashName();
                $path_Qr_image_teh = 'assets/media/images/QR/' . $filename;
                $file->move(public_path('assets/media/images/QR/'), $filename);
            }
            $path_Qr_image_ltc = "";
            if ($request->has("Qr_image_ltc")) {
                $file = $request->file('Qr_image_ltc');
                $filename =  $file->hashName();
                $path_Qr_image_ltc = 'assets/media/images/QR/' . $filename;
                $file->move(public_path('assets/media/images/QR/'), $filename);
            }

            $path_Qr_image_trx = "";
            if ($request->has("Qr_image_trx")) {
                $file = $request->file('Qr_image_trx');
                $filename =  $file->hashName();
                $path_Qr_image_trx = 'assets/media/images/QR/' . $filename;
                $file->move(public_path('assets/media/images/QR/'), $filename);
            }

            if ($data != null) {
                $SettingsData = [
                    'Qr_image_teh' => (!empty($path_Qr_image_teh)) ? $path_Qr_image_teh : $data->Qr_image_teh,
                    'Qr_image_btc' => (!empty($path_Qr_image_btc)) ? $path_Qr_image_btc : $data->Qr_image_btc,
                    'Qr_image_eth' => (!empty($path_Qr_image_eth)) ? $path_Qr_image_eth : $data->Qr_image_eth,
                    'Qr_image_ltc' => (!empty($path_Qr_image_ltc)) ? $path_Qr_image_ltc : $data->Qr_image_ltc,
                    'Qr_image_trx' => (!empty($path_Qr_image_trx)) ? $path_Qr_image_trx : $data->Qr_image_trx,

                    'Qr_address_teh' => $request->Qr_address_teh,
                    'Qr_address_btc' => $request->Qr_address_btc,
                    'Qr_address_eth' => $request->Qr_address_eth,
                    'Qr_address_ltc' => $request->Qr_address_ltc,
                    'Qr_address_trx' => $request->Qr_address_trx,


                    'location' => $request->location,
                    'email' => $request->email,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp
                ];

                Settings::where('id', $data->id)->update($SettingsData);
            } else {

                $SettingsData = [
                    'Qr_image_teh' => (!empty($path_Qr_image_teh)) ? $path_Qr_image_teh : "assets/media/images/QR/notfound.png",
                    'Qr_image_btc' => (!empty($path_Qr_image_btc)) ? $path_Qr_image_btc : "assets/media/images/QR/notfound.png",
                    'Qr_image_eth' => (!empty($path_Qr_image_eth)) ? $path_Qr_image_eth : "assets/media/images/QR/notfound.png",
                    'Qr_image_ltc' => (!empty($path_Qr_image_ltc)) ? $path_Qr_image_ltc : "assets/media/images/QR/notfound.png",
                    'Qr_image_trx' => (!empty($path_Qr_image_trx)) ? $path_Qr_image_trx : "assets/media/images/QR/notfound.png",

                    'Qr_address_teh' => $request->Qr_address_teh,
                    'Qr_address_btc' => $request->Qr_address_btc,
                    'Qr_address_eth' => $request->Qr_address_eth,
                    'Qr_address_ltc' => $request->Qr_address_ltc,
                    'Qr_address_trx' => $request->Qr_address_trx,


                    'location' => $request->location,
                    'email' => $request->email,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp

                ];
                Settings::create($SettingsData);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => '1', 'msg' => 'Success to stor ']);
    }
    function updatemedia(Request $request)
    {
        $data = DB::table('settings')->first();
        DB::beginTransaction();
        try {



            if ($data != null) {
                $SettingsData = [


                    'location' => $request->location,
                    'email' => $request->email,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp
                ];

                Settings::where('id', $data->id)->update($SettingsData);
            } else {

                $SettingsData = [

                    'location' => $request->location,
                    'email' => $request->email,
                    'telegram' => $request->telegram,
                    'whatsapp' => $request->whatsapp

                ];
                Settings::create($SettingsData);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => '1', 'msg' => 'Success to stor ']);
    }

    function Verify(Request $request)
    {
        DB::beginTransaction();
        try {

            $identity_path = "";
            if ($request->has("identity")) {
                $file = $request->file('identity');
                $filename =  $file->hashName();
                $identity_path = 'assets/media/images/identity/' . $filename;
                $file->move(public_path('assets/media/images/identity/'), $filename);
            }

            $user = DB::table('users')->where('id', Auth::user()->id)->update(['identity' => $identity_path, 'verify' => 0]);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => '0', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => '1', 'msg' => 'Success to Add Image To verify ']);
    }

    public function getQRData(Request $request)
    {
        $data = DB::table('settings')->first();
        $qrdata = Settings::where('id', $data->id)->first();
        return Response()->json($qrdata);
    }
    // ----------user ---
    function usergetSettings()
    {
        return view('User.Settings.index');
    }

    // ------------ user getContact 

    function getContact()
    {
        return view('User.Contact.index');
    }
}
