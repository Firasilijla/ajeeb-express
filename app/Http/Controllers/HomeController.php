<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function getwelcome(){
        return view('User.welcome');
    }
    public function index()
    {
        return view('home');
    }
    public function Userindex()
    {
        return view('User.home');
    }
    public function Adminindex()
    {
        return view('Admin.home');
    } public function getAbout()
    {
        return view('User.About.index');
    }
    
    // ----------- chart  home -----
    public function XRPTradindChart()
    {
        return view('XRPTradindChart');
    }
    public function LTCTradindChart()
    {
        return view('LTCTradindChart');
    }
    public function ETHTradindChart()
    {
        return view('ETHTradindChart');
    }
    public function BTCTradindChart()
    {
        return view('BTCTradindChart');
    }

    
    // ----------- chart  home -----
    public function UserXRPTradindChart()
    {
        return view('User.Chart.XRPTradindChart');
    }
    public function UserLTCTradindChart()
    {
        return view('User.Chart.LTCTradindChart');
    }
    public function UserETHTradindChart()
    {
        return view('User.Chart.ETHTradindChart');
    }
    public function UserBTCTradindChart()
    {
        return view('User.Chart.BTCTradindChart');
    }
    
}
