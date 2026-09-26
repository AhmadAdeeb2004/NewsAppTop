<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cities = City::all();
        return view('cms.cities.index',['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.cities.create') ;
    //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'name_en'=> 'required|string|min:3|max:50',
        'name_ar'=> 'required|string|min:3|max:50',
        'active'=> 'nullable|string|in:on',
        ]);
        $city=new City();
        $city->name_en=$request->input('name_en');
        $city->name_ar=$request->input('name_ar');
        $city->active=$request->has('active');
        $isSaved=$city->save();
        if($isSaved){
            session()->flash('message',__('messages.create_success'));
            return Redirect()->back();
        }
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('cms.cities.edit',['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
        //
        $request->validate([
            'name_en' => 'required|string|min:3|max:50',
            'name_ar' => 'required|string|min:3|max:50',
            'active' => 'nullable|string|in:on',
        ]);
        $city->name_en = $request->input('name_en');
        $city->name_ar = $request->input('name_ar');
        $city->active = $request->has('active');
        $isUpdated = $city->save();
        if ($isUpdated) {
            session()->flash('message', __('messages.update_success'));
            return Redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $deleted = $city->delete();
        return redirect()->back();
        //
    }
}
