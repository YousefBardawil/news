<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showlogin(Request $request, $guard){

        return response()->view('cms.auth.login', compact('guard'));
      }

      public function login(Request $request){
        $validator = Validator($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credintial=[
            'email' => $request->get('email'),
            'password' => $request->get('password'),

        ];

        if(!$validator->fails()){

            if(Auth::guard($request->get('guard'))->attempt($credintial, $request->get('remember'))){

                return response()->json(['icon'=>'success', 'title' =>'login is successfully'], 200);
            }else{
                return response()->json(['icon'=>'error', 'title' =>'login is failed'], 400);
            }
        }
        else{

            return response()->json([ 'message' => $validator->getMessageBag()->first()],400);
        }
     }

     public function logout(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'author';
          Auth::guard($guard)->logout();
          $request->session()->invalidate();
          return redirect()->route('view.login', $guard);

     }
}
