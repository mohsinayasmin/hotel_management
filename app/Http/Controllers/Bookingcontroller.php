<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class Bookingcontroller extends Controller
{
    public function all_booking() {
        $data = Booking::all();
        return view('admin.all_booking',compact('data'));
    }

    public function search_room(){
        return view('admin.add_booking');
    }

   

    public function room_availability(Request $request){
        $start_date = $request->input('check_in');
        $end_date = $request->input('check_out');

    //    $rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$start_date' BETWEEN 'checkin_date' AND 'checkout_date')");
         
        $data = Room::whereNotIn('id', function($query) use ($start_date, $end_date) {
            $query->from('bookings')
             ->select('room_id')
             ->whereBetween('checkin_date', [$start_date, $end_date])
             ->orWhereBetween('checkin_date', [$start_date, $end_date]);
         })->get();   
       
         return view('admin.room_search_table',compact('data','start_date','end_date'));
    }

    public function final_booking($id , $in , $out) {
        $in=$in;
        $out=$out;
       $data = Room::find($id);
       $customer = Customer::all(); 
       return view('admin.final_book',compact('data','customer','in','out'));
    }

    public function room_booking(Request $request){
       
        $data = new Booking();

        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->checkin_date;
        $data->checkout_date = $request->checkout_date;
        $data->total_adult = $request->total_adult;
        $data->total_clildren = $request->total_clildren;
        $data->save();
        Alert::success('Congrats', 'Room Booking Succesfull !!');
        return redirect()->back();
    }


}
