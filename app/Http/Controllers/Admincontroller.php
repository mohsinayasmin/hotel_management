<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Admincontroller extends Controller
{
    public function login(){
        return view('admin/login');
    }
    public function admin_login(Request $request){
         $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'type' => 'admin'])) {
            Alert::success('Congrats', 'login Successfull !!');
            return redirect('/dashboard');
        } else{
            return redirect()->back()->with('errormsg','Invalid Username  or password');
        }
 
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}

public function dashboard_chart(){
    $bookings = DB::table('bookings')->selectraw('count(id) as total_booking , checkin_date')->groupBy('checkin_date')->get();
    $lebels=[];
    $data = [];

    foreach($bookings as $booking){
        $lebels[] =$booking->checkin_date; 
        $data[] =$booking->total_booking; 
    }
    return view('admin.welcome',compact('lebels','data'));
}

}
