<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class Customercontroller extends Controller
{
    public function add_customer(){
        return view('admin.add_customer');
    }

    public function insert_customer(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email' =>  'required|email|max:255',
            'mobile' => 'required',
            'address'=>'required',
            'password'=>'required',
 
        ]);
        $data=new Customer;

        // $image = $request->photo;
        // $imageName = time() . '.' . $image->getClientOriginalExtension();
        // $request->photo->move('image', $imageName);
        // $data->photo = $imageName;

        $image_path = $request->file('photo')->store('customer_image', 'public');
        $data->photo  = $image_path;

        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        Alert::success('Congrats', 'Customer Successfully Registered');
        return redirect()->back();
    }

    public function all_customer(){
        $data = Customer::all();
        return view('admin.all_customer',compact('data'));
    }
    
    public function view_customer($id){
        $data = Customer::find($id);
        return view('admin.view_customer', compact('data'));
    }
    public function delete_customer($id){
        $data = Customer::find($id);
        if($data->photo){
            $path='storage/'.$data->photo;
            if(File::exists($path)) {
                File::delete($path);
            }        
          }
        $data->delete();
        Alert::success('Succesful !!', 'Customer Successfully Deleted');
        return redirect()->back();
    }

    public function edit_customer($id ){
       $data = Customer::find($id);
       return view('admin.edit_customer', compact('data'));
    }

    public function update_customer($id , Request $request){
        $request->validate([
            'full_name'=>'required',
            'email' =>  'required|email|max:255',
            'mobile' => 'required',
            'address'=>'required',
            'password'=>'required',
 
        ]);
        $data=Customer::find($id);
        if($request->hasFile('photo')){
          $path='storage/'.$data->photo;
          if(File::exists($path)) {
              File::delete($path);
          }
          $image=$request->photo;
          if($image){
            $image_path = $request->file('photo')->store('customer_image', 'public');
            $data->photo  = $image_path;
          }
        }
        
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        Alert::success('Congrats', 'Customer updated Succesfully');
        return redirect()->back();

    }

}
