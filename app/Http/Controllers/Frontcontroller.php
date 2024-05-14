<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Frontcontroller extends Controller
{
    public function user_login(){
        if(Auth::check()){
          return redirect()->back();
        }
        else{
            return view('front.front_login');
        }
       
    }

    public function post_login(Request $request){
       
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Congrats', 'Login Successfull !!');
            return redirect('/');
                        
        }
        else{
            return redirect()->back()->with('errormsg','Invalid Username  or password');
        }
       
        
        
    }

    public function user_register(){
        return view('front.front_register');
    }

    public function post_register(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email' =>  'required|email|max:255',
            'password'=>'required|confirmed',
 
        ]);
        
        $data=new User();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password =Hash::make( $request->password);
        $data->save();

        $data=new Customer;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password =Hash::make( $request->password);
        $data->save();
       

       
        Alert::success('Congrats', 'Customer Successfully Registered');
        return redirect('/user_login');
    }
    public function logout( Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function book_now() {
        return view('front.book_now');
    }
    
    public function search_room(Request $request) {
        $start_date = $request->input('check_in');
        $end_date = $request->input('check_out');

    //    $rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$start_date' BETWEEN 'checkin_date' AND 'checkout_date')");
         
        $data = Room::whereNotIn('id', function($query) use ($start_date, $end_date) {
            $query->from('bookings')
             ->select('room_id')
             ->whereBetween('checkin_date', [$start_date, $end_date])
             ->orWhereBetween('checkin_date', [$start_date, $end_date]);
         })->get();   
       
         return view('front.room_search_result',compact('data','start_date','end_date'));
    }

    public function confirm_booking(Request $request) {
        $data = new Booking();

        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adult = $request->total_adult;
        $data->total_clildren = $request->total_clildren;
        $data->save();
        Alert::success('Congrats', 'Room Booking Succesfull !!');
        return redirect('/');
    }

    public function room_details($id, Request $request){
        $data = Room::find($id);
        $start_date = $request->input('check_in');
        $end_date = $request->input('check_out');
       return view('front.room_details',compact('data','start_date','end_date' ));
    }
}
