<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest:web'])->group(function () {
    Route::get('/', [HomeController::class, 'getwelcome'])->name('welcome');

    Route::get('/getLogin', [App\Http\Controllers\UserAuth::class, 'getLogin'])->name('getLogin');
    Route::get('/getRegister', [App\Http\Controllers\UserAuth::class, 'getRegister'])->name('getRegister');


    Route::post('/check', [App\Http\Controllers\UserAuth::class, 'check'])->name('check');
    Route::post('/register', [App\Http\Controllers\UserAuth::class, 'register'])->name('register');

    Route::get('/XRPTradindChart', [App\Http\Controllers\HomeController::class, 'XRPTradindChart'])->name('XRPTradindChart');
    Route::get('/LTCTradindChart', [App\Http\Controllers\HomeController::class, 'LTCTradindChart'])->name('LTCTradindChart');
    Route::get('/ETHTradindChart', [App\Http\Controllers\HomeController::class, 'ETHTradindChart'])->name('ETHTradindChart');
    Route::get('/BTCTradindChart', [App\Http\Controllers\HomeController::class, 'BTCTradindChart'])->name('BTCTradindChart');
});
// Auth::routes();
// -------------------------- user --------------------------------

Route::middleware(["auth", 'user-access:user'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        // ------- get page --
        Route::get('/home', [App\Http\Controllers\UserAuth::class, 'UserHome'])->name('user.home');

        Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('user.logout');
        Route::post('/sendMessage', [App\Http\Controllers\UserAuth::class, 'sendMessage'])->name('user.sendMessage');

        Route::prefix('Deposit')->name('Deposit.')->group(function () {
            Route::get('/UsergetDeposit', [TransactionController::class, 'UsergetDeposit'])->name('UsergetDeposit');

            Route::get('/UsergetDepositBitcoin', [TransactionController::class, 'UsergetDepositBitcoin'])->name('UsergetDepositBitcoin');
            Route::get('/UsergetDepositEthereum', [TransactionController::class, 'UsergetDepositEthereum'])->name('UsergetDepositEthereum');
            Route::get('/UsergetDepositTether', [TransactionController::class, 'UsergetDepositTether'])->name('UsergetDepositTether');
            Route::get('/UsergetDepositLTC', [TransactionController::class, 'UsergetDepositLTC'])->name('UsergetDepositLTC');


            Route::post('/DepositAmount', [TransactionController::class, 'DepositAmount'])->name('DepositAmount');
        });
        Route::prefix('Withdrow')->name('Withdrow.')->group(function () {
            Route::get('/UsergetWithdrow', [TransactionController::class, 'UsergetWithdrow'])->name('getWithdrow');

            Route::get('/WithdrowIndexUser', [TransactionController::class, 'WithdrowIndexUser'])->name('WithdrowIndexUser');

            Route::post('/WithdrowAmount', [TransactionController::class, 'WithdrowAmount'])->name('WithdrowAmount');
            Route::get('/getam', [TransactionController::class, 'getAmount'])->name('getam');
        });
        Route::prefix('TRX')->name('TRX.')->group(function () {
            Route::get('/UsergetTRX', [TransactionController::class, 'UsergetTRX'])->name('getTRX');
            Route::post('/TRXAmount', [TransactionController::class, 'TRXAmount'])->name('TRXAmount');
            Route::get('/acceptTRXAmount', [TransactionController::class, 'acceptTRXAmount'])->name('acceptTRXAmount');
            Route::get('/getQrPgae', [TransactionController::class, 'getQrPgae'])->name('getQrPgae');
        });
        Route::group(['prefix' => 'Trading', 'namespace' => 'Trading'], function () {
            Route::get('/getTrading', [App\Http\Controllers\TradingController::class, 'getTrading'])->name('Trading.getTrading');
            Route::post('/Trading', [App\Http\Controllers\TradingController::class, 'Trading'])->name('Trading.Trading');
            //    -----------trading buy 
            Route::post('/Tradingbuy', [App\Http\Controllers\TradingController::class, 'Tradingbuy_ok'])->name('Trading.buy_ok');
            Route::post('/Tradingbuynow', [App\Http\Controllers\TradingController::class, 'Tradingbuynow'])->name('Trading.buy_now');
            //    -----------trading sale 
            Route::post('/Tradingsale', [App\Http\Controllers\TradingController::class, 'Tradingsale_ok'])->name('Trading.sale_ok');
            Route::post('/Tradingsalenow', [App\Http\Controllers\TradingController::class, 'Tradingsalenow'])->name('Trading.sale_now');
        });
        Route::group(['prefix' => 'Tranaction', 'namespace' => 'Tranaction'], function () {
            Route::get('/getTranaction', [App\Http\Controllers\TransactionController::class, 'getTranaction'])->name('Tranaction.getTranaction');
            Route::post('/getTranactionData', [App\Http\Controllers\TransactionController::class, 'getTranactionData'])->name('Tranaction.getTranactionData');
            Route::post('/getTranactionUserData', [App\Http\Controllers\TransactionController::class, 'getTranactionUserData'])->name('Tranaction.getTranactionUserData');
            Route::post('/getTranactionDetails', [App\Http\Controllers\TransactionController::class, 'getTranactionDetails'])->name('Tranaction.getTranactionDetails');
        });
        Route::group(['prefix' => 'About', 'namespace' => 'About'], function () {
            Route::get('/getAbout', [App\Http\Controllers\HomeController::class, 'getAbout'])->name('About.getAbout');
        });
        Route::group(['prefix' => 'Settings', 'namespace' => 'Settings'], function () {
            Route::post('/getQRData', [App\Http\Controllers\SettingsController::class, 'getQRData'])->name('Settings.getQRData');
            Route::get('/userSettings', [App\Http\Controllers\SettingsController::class, 'usergetSettings'])->name('Settings.userSettings');

            Route::post('/Verify', [App\Http\Controllers\SettingsController::class, 'Verify'])->name('Settings.Verify');
        });
        Route::group(['prefix' => 'Chart', 'namespace' => 'Chart'], function () {
            Route::get('/UserXRPTradindChart', [App\Http\Controllers\HomeController::class, 'UserXRPTradindChart'])->name('UserChart.XRPTradindChart');
            Route::get('/UserLTCTradindChart', [App\Http\Controllers\HomeController::class, 'UserLTCTradindChart'])->name('UserChart.LTCTradindChart');
            Route::get('/UserETHTradindChart', [App\Http\Controllers\HomeController::class, 'UserETHTradindChart'])->name('UserChart.ETHTradindChart');
            Route::get('/UserBTCTradindChart', [App\Http\Controllers\HomeController::class, 'UserBTCTradindChart'])->name('UserChart.BTCTradindChart');
        });

        Route::group(['prefix' => 'Profile', 'namespace' => 'Profile'], function () {
            Route::get('/edit', [App\Http\Controllers\UserController::class, 'editProfile'])->name('Profile.editProfile');
            Route::post('/profiledata', [App\Http\Controllers\UserController::class, 'profiledata'])->name('Profile.data');
            Route::post('/updateProfile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('Profile.updateProfile');
        });
        Route::group(['prefix' => 'Contact', 'namespace' => 'Contact'], function () {
            Route::get('/Contact', [App\Http\Controllers\SettingsController::class, 'getContact'])->name('Contact.getContact');
        });
    });
});

// -------------------------- admin --------------------------------
Route::middleware(["auth", 'user-access:admin'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', [App\Http\Controllers\UserAuth::class, 'AdminHome'])->name('admin.home');
        Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('admin.logout');

        // ----------- userManagments ------- 
        Route::get('/users', [App\Http\Controllers\UserController::class, 'users'])->name('admin.users');
        Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('admin.index');
        Route::get('/indexVerify', [App\Http\Controllers\UserController::class, 'indexVerify'])->name('admin.indexVerify');


        Route::post('/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.delete');
        Route::post('/changeStatus', [App\Http\Controllers\UserController::class, 'changeStatus'])->name('admin.changeStatus');
        Route::post('/edit', [App\Http\Controllers\UserController::class, 'Useredit'])->name('admin.edit');
        Route::post('/updateUser', [App\Http\Controllers\UserController::class, 'updateUser'])->name('admin.updateUser');
        Route::post('/StoreUser', [App\Http\Controllers\UserController::class, 'StoreUser'])->name('admin.StoreUser');
        Route::post('/sendMessage', [App\Http\Controllers\UserAuth::class, 'sendMessage'])->name('admin.sendMessage');
        Route::get('/usersVerify', [App\Http\Controllers\UserController::class, 'usersVerify'])->name('admin.usersVerify');
        Route::post('/acceptsVerify', [App\Http\Controllers\UserController::class, 'acceptsVerify'])->name('admin.acceptsVerify');


        Route::group(['prefix' => 'Deposit', 'namespace' => 'Deposit'], function () {
            Route::get('/getDeposit', [TransactionController::class, 'getDeposit'])->name("Deposit.getDeposit");
            Route::get('/Deposit', [App\Http\Controllers\TransactionController::class, 'Depositindex'])->name('Deposit.index');
        });
        Route::group(['prefix' => 'Withdrow', 'namespace' => 'Withdrow'], function () {
            Route::get('/getWithdrow', [TransactionController::class, 'getWithdrow'])->name("Withdrow.getWithdrow");
            Route::get('/Withdrow', [App\Http\Controllers\TransactionController::class, 'Withdrowindex'])->name('Withdrow.index');
        });
        Route::group(['prefix' => 'TRX', 'namespace' => 'TRX'], function () {
            Route::get('/getTRX', [TransactionController::class, 'getTRX'])->name("TRX.getTRX");
            Route::get('/TRX', [App\Http\Controllers\TransactionController::class, 'TRXindex'])->name('TRX.index');
        });
        Route::group(['prefix' => 'Settings', 'namespace' => 'Settings'], function () {
            Route::get('/getSettings', [SettingsController::class, 'getSettings'])->name("Settings.getSettings");
            Route::post('/getQRData', [App\Http\Controllers\SettingsController::class, 'getQRData'])->name('Settings.getQRData');
            Route::post('/update', [App\Http\Controllers\SettingsController::class, 'update'])->name('Settings.update');
            Route::post('/updatemedia', [App\Http\Controllers\SettingsController::class, 'updatemedia'])->name('Settings.updatemedia');
        });
        Route::group(['prefix' => 'Transaction', 'namespace' => 'Transaction'], function () {
            Route::post('/excuteOperation', [App\Http\Controllers\TransactionController::class, 'excuteOperation'])->name('Transaction.excuteOperation');
        });
    });
});
