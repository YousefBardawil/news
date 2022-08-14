<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\LinesOfCode\Counter;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::with('cities')->withCount('cities')->orderBy('id' ,'desc')->Paginate(8);
        return response()->view('cms.country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
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
         'country_name' => 'required|String|min:3|max:20',
         'code' => 'required|String|min:3|max:20',

        ]);

        if(!$validator->fails()){
            $countries= new Country();
            $countries->country_name = $request->get('country_name');
            $countries->code = $request->get('code');
            $isSaved = $countries->save();

            if($isSaved){

                return response()->json(['icon'=>'success' , 'title' => 'created successfully' ] , 200);
            }else {

                return response()->json(['icon'=>'error' , 'title' => 'created failed' ] , 400);

            };

        } else {

            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
        }





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findorFail($id);
        return response()->view('cms.country.edit',compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'country_name' => 'required|String|min:3|max:20',
            'code' => 'required|String|min:3|max:20',

           ]);

           if(!$validator->fails()){
               $countries= Country::findorFail($id);
               $countries->country_name = $request->get('country_name');
               $countries->code = $request->get('code');
               $isUpdated = $countries->save();

               return ['redirect' => route('countries.index' , $id)];

               if($isUpdated){

                   return response()->json(['icon'=>'success' , 'title' => 'updated successfully' ] , 200);
               }else {

                   return response()->json(['icon'=>'error' , 'title' => 'updated failed' ] , 400);

               };

           } else {

               return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->first() ] ,400 );
           }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::destroy($id);
        return response()->json(['icon' =>'success' , 'tittle' => 'Deleted successfuly'] , 200 );

    }
}
