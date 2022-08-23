<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $admins = Admin::with('user','country')->orderBy('id','desc');
        $admins = $admins->simplePaginate(2);
        $this->authorize('viewAny', Admin::class);
        return response()->view('cms.admin.index', compact('admins'));

        // search and filter
        if($request->get('email')){
            $admins = $admins->where('email','like','%' . $request->email . '%');
        }

         // if($request->get('first_name')){
        //     $admins = $admins->user->where('first_name','like','%' . $request->first_name. '%');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $countries = Country::all();
        $roles = Role::where('guard_name' ,'admin')->get();
        $this->authorize('create', Admin::class);
        return response()->view('cms.admin.create' , compact('countries' , 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins = Admin::findOrFail($id);
        $countries = Country::all();
        return response()->view('cms.admin.show',compact('countries','admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries= Country::all();
        $admins = Admin::findOrFail($id);
        $this->authorize('update', Admin::class);


        return response()->view('cms.admin.edit' , compact('admins','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'first_name' => 'required|String|min:3|max:20',
            // 'code' => 'required|String|min:3|max:20',
            'image' => 'required|image|max:2048|mimes:png,jpg,jpeg,pdf',


           ]);

           if(!$validator->fails()){
               $admins= Admin::findorFail($id);
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
                return ['redirect' => route('admins.index' , $id)];
                return response()->json(['icon'=>'success' , 'title' => $isSaved ? 'updated succesfully' : 'updated filed' ] , $isSaved ? 200 : 400);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

            }

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        // $admins = Admin::destroy($id);
        $this->authorize('delete', Admin::class);


        if($admin->id == Auth::id()){
            return redirect()->route('admins.index')->withErrors(trans('can not delete yourself'));
        }else{
            $admin->user()->delete();
            $isDeleted = $admin->delete();
            return response()->json(['icon'=> 'success' , 'title' => 'admin deleted successfuly'],200);
        }



    }
}
