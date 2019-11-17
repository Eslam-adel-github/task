<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class Users extends Controller
{
    public function index(){
        if(Auth::check()){
            if(Auth::user()->role<=2){
            $data=User::all();
            return view('users',['data'=>$data]);
        }
        else{
                return redirect()->route('bookprofile');
        }
        }

        return redirect('login');
    }
    public function Update(Request $request){
        $id=$request->input('id');
        $user=User::find($id);
        $user->role=$request->input('role');
        if($user->save()){
            return redirect('user');
        }
    }
}
