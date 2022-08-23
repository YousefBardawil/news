<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

     public function editProfile(){
      $admins = Admin::findOrFail(Auth::guard('admin')->id());
      $countries = Country::all();
      return response()->view('cms.auth.editprofile', compact('admins' , 'countries'));

     }

     public function updateProfile(Request $request){
        $validator = Validator($request->all(),[
            'first_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',
            'image' => 'required|image|max:2048|mimes:png,jpg,jpeg,pdf',


           ]);

           if(!$validator->fails()){
               $admins= Admin::findorFail(Auth::guard('admin')->id());
               $admins->email = $request->get('email');
               $isSaved = $admins->save();

               if($isSaved){

                $users= $admins->user;

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('images/admin', $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($admins);

                $isSaved=$users->save();
                return ['redirect' => route('admins.index')];
                return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'updated succesfully' : 'updated filed' ] , $isSaved ? 200 : 400);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

            }

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }

    }

     public function showRegister(){
        $countries = Country::all();
        return response()->view('cms.auth.register' , compact('countries'));

     }


     public function register(Request $request)
     {
         $validator = Validator($request->all(),[
             'first_name' => 'required|String|min:3|max:20',
             // 'code' => 'required|String|min:3|max:20',
             'image' => 'required|image|max:2048|mimes:png,jpg,jpeg,pdf',

            ]);

            if(!$validator->fails()){
                $admins= new Admin();
                $admins->email = $request->get('email');
                $admins->password = Hash::make($request->get('password')) ;
                $isSaved = $admins->save();

                if($isSaved){

                 $users= new User();

                 if(request()->hasFile('image')){
                     $image = $request->file('image');
                     $imageName =time() . 'image.' . $image->getClientOriginalExtension();
                     $image->move('images/admin', $imageName);
                     $users->image = $imageName;
                 }

                 $users->first_name = $request->get('first_name');
                 $users->last_name = $request->get('last_name');
                 $users->mobile = $request->get('mobile');
                 $users->gender = $request->get('gender');
                 $users->status = $request->get('status');
                 $users->date_of_birth = $request->get('date_of_birth');
                 $users->country_id = $request->get('country_id');
                 $users->actor()->associate($admins);

                 $isSaved=$users->save();
                  return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'created succesfully' : 'created failed' ] , $isSaved ? 200 : 400);
                }
                else {

                 return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

             }

            }
            else{

                return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
            }
     }




    }
   
