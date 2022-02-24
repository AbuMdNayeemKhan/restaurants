<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\shafes;

use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // Display Users page Resive all data for users table
    public function users(){
        $data = user::all();
        return view('admin.users', compact("data"));
    }

    // Send Data for Delete users
    public function deleteusers($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Display Food Menu page and submit form
    public function foodmenu(){
        $data = Food::all();
        return view('admin.foodmenu', compact("data"));
    }

    // Post Food Menu upload items
    public function uploadfood(Request $request){
        $data = new Food;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->discription = $request->discription;
        $data->save();
        return redirect()->back();
    }

    // Delete food manu item
    public function fooddelete($id){
        $data = Food::find($id);
        $destination = "foodimage/".$data->image;
        if(file::exists($destination)){
            file::delete($destination);
        }
        $data -> delete();
        return redirect()->back();
    }

    // Edit food manu item
    public function foodedit($id){
        $data = Food::find($id);
        return view('admin.foodedit', compact("data"));
    }

    // Update food menu item
    public function foodupdate(Request $request, $id){
        $data = Food::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->discription = $request->discription;
        $data->save();
        return redirect()->back();
    }

    // Reservation data send for Mysql
    public function reservation(Request $request){
        $data = new Reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back();
    }

    // Resservation data show in admin panel
    public function adminreservation(){
        $data = reservation::all();
        return view('admin.adminreservation', compact("data"));
    }

    // Delete reservation
    public function deletereservation($id){
        $data = reservation::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Display shafes
    public function shafes(){
    $data = Shafes::all();
    return view('admin.adminshafes', compact("data"));
    }
    
    // Add new shefs
    public function uploadchef(Request $request){
        $data = new shafes;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('shefsimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    // Edit Chef item
    public function editchef($id){
        $data = shafes::find($id);
        return view('admin.editchef', compact("data"));
    }

    // Update Chef
    public function updatechef(Request $request, $id){
        $data = shafes::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('shefsimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
    }

    // Delete Chef
    public function deletechef($id){
        $data = shafes::find($id);
        $data->delete();
        return redirect()->back();
    }

}
