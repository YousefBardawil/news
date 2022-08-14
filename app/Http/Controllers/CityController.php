<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $cities = City::with('country')->get();

        return response()->view('cms.city.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
         $request->validate([
            'city_name' => 'required|string|min:3|max:20',
            'street_name' => 'required|string|min:3|max:20',

         ],
        [
            // 'city_name.required'  => ' الرجاء إدخال قيمة للعمود الأول',
            // 'city_name.min'  => ' الرجاء إدخال قيمة تتكون أكثر من 3 أحرف',

        ]);

        $cities = new City();
        // $cities->city_name = $request->city_name;
        // $cities->city_name = $request->input('city_name');
        $cities->city_name = $request->get('city_name');
        $cities->street_name = $request->get('street_name');
        $cities->country_id = $request->get('country_id');


        $isSaved = $cities->save();
        session()->flash('message', $isSaved ? 'created succesfully' : 'created failed');
        return redirect()->back();
        // return redirect()->route('cities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $cities = City::findorFail($id);

        $countries = Country::all();

        return response()->view('cms.city.edit' , compact('cities' , 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'city_name' => 'required|string|min:3|max:20',
            'street_name' => 'required|string|min:3|max:20',

        ]);

        $cities = City::findorFail($id);
        $cities->city_name = $request->get('city_name');
        $cities->street_name = $request->get('street_name');
        $cities->country_id = $request->get('country_id');


        $isUpdated = $cities->save();

        session()->flash('message', $isUpdated ? 'updated succesfully' : 'updated failed');
        return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cities = City::destroy($id);

        session()->flash('message', $cities ? 'deleted successfuly' : ' deleted failed');

        return redirect()->route('cities.index');

    }
}
