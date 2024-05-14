<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\Staffpayment;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class Staffcontroller extends Controller
{
    public function add_department(){
        return view('admin.add_department');
    }
    public function all_department(){
        $data = Department::all();
        return view('admin.all_department',compact('data'));
    }

    public function insert_department(Request $request){
        $request->validate([
            'title'=>'required',
            'detail' =>  'required',
 
        ]);
        $data = new Department();
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->save();
        Alert::success('Congrats', 'Departement Succesfully added');
        return redirect()->back();

    }
    public function edit_department($id){
        $data = Department::find($id);
        return view('admin.edit_department',compact('data'));
    }
    public function update_department($id ,Request $request){
        $data = Department::find($id);
        $request->validate([
            'title'=>'required',
            'detail' =>  'required',
 
        ]);
        $data->title = $request->title;
        $data->detail = $request->detail;
        $data->save();
        Alert::success('Congrats', 'Department Successfully updated');
        return redirect('/all_department');
    }

    public function delete_department($id){
        $data = Department::find($id);
        $data->delete();
        Alert::success('Congrats', 'Department Successfully deleted');
        return redirect()->back();
    }

    public function add_staff(){
        $department =Department::all();
        return view('admin.add_staff',compact('department'));
    }

    public function insert_staff(Request $request){
        $request->validate([
            'full_name'=>'required',
            'department_id' =>  'required',
            'mobile'=>'required',
            'bio' =>  'required',
            'salary_type' =>  'required',
            'salary_amt' =>  'required',
 
        ]);
        $data = new Staff();
        $data->full_name = $request->full_name;
        $data->department_id = $request->department_id;

        $image_path = $request->file('photo')->store('staff_image', 'public');
        $data->photo  = $image_path;

        $data->mobile = $request->mobile;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
        $data->save();
        Alert::success('Congrats', 'Staff Succesfully added');
        return redirect()->back();

    }

    public function all_staff() {
        $data = Staff::all();
        return view('admin.all_staff',compact('data'));

    }

    public function view_staff($id) {
        $data = Staff::find($id);
        return view('admin.view_staff',compact('data'));

    }

    public function edit_staff($id) {
        $data = Staff::find($id);
        $department =Department::all();
        return view('admin.edit_staff',compact('data','department'));
    }

    public function update_staff($id ,Request $request){
        $request->validate([
            'full_name'=>'required',
            'department_id' =>  'required',
            'mobile'=>'required',
            'bio' =>  'required',
            'salary_type' =>  'required',
            'salary_amt' =>  'required',
 
        ]);
        $data = Staff::find($id);
        if($request->hasFile('photo')){
            $path='storage/'.$data->photo;
            if(File::exists($path)) {
                File::delete($path);
            }
            $image=$request->photo;
            if($image){
              $image_path = $request->file('photo')->store('staff_image', 'public');
              $data->photo  = $image_path;
            }
          }
        $data->full_name = $request->full_name;
        $data->department_id = $request->department_id;
        $data->mobile = $request->mobile;
        $data->bio = $request->bio;
        $data->salary_type = $request->salary_type;
        $data->salary_amt = $request->salary_amt;
        $data->save();
        Alert::success('Congrats', 'Staff Succesfully updated');
        return redirect()->back();

    }
    public function delete_staff($id) {
        $data = Staff::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function payment_staff($id) {
        $data = Staff::find($id);
        return view('admin.staff_payment',compact('data'));
    }


    public function insert_staff_payment($id , Request $request) {
       $data = new Staffpayment();
       $data->staff_id = $id;
       $data->amount = $request->amount;
       $data->date = $request->date;
       $data->save();
       Alert::success('Congrats', 'Staff Payment Succesfull!!');
       return redirect()->back();

    }

    public function all_staff_payment() {
        $data = Staffpayment::all();
        return view('admin.all_staff_payment',compact('data'));
    }

}
