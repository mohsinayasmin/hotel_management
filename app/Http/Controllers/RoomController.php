<?php

namespace App\Http\Controllers;

use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
// or 
// use Alert;
use App\Models\Roomtype;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function all_roomtype(){
        $data = Roomtype::all();
        return view('admin.all_roomtype',compact('data'));
    }
    public function add_roomtype(){
        return view('admin.add_roomtype');
    }

    public function insert_roomtype(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
        ]);
        $data = new Roomtype();

        $data->title = $request->title;
        $data->detail = $request->detail;
        $result=$data->save();
        // $image_path = $request->file('photo')->store('roomtypeimg', 'public');
        // $data->photo  = $image_path;
        foreach ($request->file('imgs',[]) as $img) {
    
            $imgpath = $img->store('roomtypeimg', 'public');
            $imgdata = new Roomtypeimage;
            $imgdata->room_type_id = $data->id; 
            $imgdata->img_src = $imgpath; 
            $imgdata->img_alt = $data->title; 
            $imgdata->save();
        }
        

        if($result){
            Alert::success('Congrats', 'Roomtype Successfully Registered');
            return redirect('/add_roomtype');
            
        }else{
            Alert::error('Sorry', 'Roomtype Not Registered');
            return redirect('/add_roomtype');
        }

       
        
    }
    public function edit_roomtype($id){
       $data = Roomtype::find($id);
       return view('admin.edit_roomtype',compact('data'));
    }
    public function delete_roomtype($id){
        $data = Roomtype::find($id);
        $data_room = Room::where(['room_type_id' => $id])->get();
        $result = $data->delete();
        if($result){
            $data_room->each->delete();
        }
        Alert::success('Congrats', 'Roomtype Successfully Deleted');
        return redirect()->back();
    }

    public function update_roomtype($id , Request $request){
        $data = Roomtype::find($id);
        foreach ($request->file('imgs',[]) as $img) {
            
            $imgpath = $img->store('roomtypeimg', 'public');
            $imgdata = new Roomtypeimage;
            $imgdata->room_type_id = $id; 
            $imgdata->img_src = $imgpath; 
            $imgdata->img_alt = $data->title; 
            $imgdata->save();
        }
        
            $request->validate([
                'title' => 'required|max:255',
                'detail' => 'required',
            ]);
           
            $data->title = $request->title;
            $data->detail = $request->detail;
            $result=$data->save();

            if($result){
                Alert::success('Congrats', 'Roomtype Successfully updated');
                return redirect()->back();
                
            }else{
                Alert::error('Sorry', 'Roomtype Not updated');
                return redirect('/all_roomtype');
            }
    }

    public function all_room(){
        $data = Room::all();
        return view('admin.all_room',compact('data'));
    }
    public function add_room(){
        $data = Roomtype::all();
        return view('admin.add_room' , compact('data'));
    }

    public function insert_room(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'room_type_id' => 'required',
            'price' => 'required',
            'a_c' => 'required',
            'room_details' => 'required',
        ]);
        $data = new Room();

        $data->title = $request->title;
        $data->room_type_id = $request->room_type_id;
        $data->price = $request->price;
        $data->a_c = $request->a_c;
        $data->room_details = $request->room_details;
        $result=$data->save();
        if($result){
            Alert::success('Congrats', 'Roomtype Successfully Registered');
            return redirect('/add_room');
            
        }else{
            Alert::error('Sorry', 'Roomtype Not Registered');
            return redirect('/add_room');
        }
        
    }

    public function update_room($id , Request $request){
        
        $request->validate([
            'title' => 'required|max:255',
            'room_type_id' => 'required',
        ]);
        $data = Room::find($id);
        $data->title = $request->title;
        $data->room_type_id = $request->room_type_id;
        $data->price = $request->price;
        $data->a_c = $request->a_c;
        $data->room_details = $request->room_details;
        $result=$data->save();
        if($result){
            Alert::success('Congrats', 'Room Successfully updated');
            return redirect('/all_room');
            
        }else{
            Alert::error('Sorry', 'Room Not updated');
            return redirect('/all_room');
        }
}

public function edit_room($id){
    $data = Room::find($id);
    $type = Roomtype::all();
    return view('admin.edit_room',compact('type','data'));
 }

 public function delete_room($id){
     $data = Room::find($id);
     $data->delete();
     Alert::success('Congrats', 'Room Successfully Deleted');
     return redirect()->back();
 }

 public function delete_roomtype_img($img_id){
   
    $data= Roomtypeimage::where('id',$img_id)->first();
    Storage::delete($data->img_src);

    $data->delete();
    Alert::success('Congrats', 'Roomtype image Successfully deleted');
    return redirect()->back();


 }

 public function view_roomtype($id){
    $data = Roomtype::find($id);
    return view('admin.view_roomtype', compact('data'));
}

}
 