<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

use App\Models\User;

use App\Models\shafes;

class HomeController extends Controller
{
    public function index(){
        $data = Food::all();
        $shafesdata = shafes::all();
        return view("home", compact("data", "shafesdata"));

    }
    public function redirect(){
        $data = Food::all();
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.adminhome');
        }else{
            return view('home', compact("data"));
        }
    }
}
