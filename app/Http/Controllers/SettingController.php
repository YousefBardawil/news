<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function editpassword(){
        return response()->view('cms.auth.changepassword');
    }

    public function updatepassword(Request $request){
        $guard = auth('admin')->check() ? 'admin':'author';
        $validator = Validator($request->all(),[
            'password' => 'required|string|min:6|max:20',
            'new_password' => 'required|string|min:6|max:20',
            'new_password_confirmation' => 'required|string|min:6|max:20|same:new_password',

        ]);

        if(!$validator->fails()){
        if(Hash::check($request->get('password'), Auth::user()->password)){
          $user = auth('admin')->user();
           $user->password = Hash::make($request->get('new_password'));
           $isSaved = $user->save();

           if($isSaved){
            return response()->json(['icon'=>'success' , 'title' =>'your password has been changed'],200);


           } else{
            return response()->json(['icon'=>'error' , 'title' =>'your password has been failed'],400);

           }

        }else{
            return response()->json(['icon' => 'error' , 'title' => 'your current password not the same'],400);

        }

            }
     else{
                return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()],400);
            }

    }
}
