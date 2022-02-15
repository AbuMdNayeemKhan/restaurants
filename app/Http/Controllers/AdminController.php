<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

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
    }
}
