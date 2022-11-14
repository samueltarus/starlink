<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'houses.index',
            [
                'houses' => House::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(8)
    
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_name' => 'required',
            'house_no' => 'required',
            'montly_rent' => 'required',
        ]);
        
    
        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }
    
    
        // $data['user_id'] = auth()->id();
    
        House::create($data);
    
        return redirect('/')->with('message', 'House created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        return view(
            'houses.show',
            [
                'houses' => $house
            ]
        );  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        return view('houses.edit', ['houses' => $house]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        
        $data = $request->validate([
            'apartment_name' => 'required',
            'house_no' => 'required',
            'montly_rent' => 'required',
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $house->update($data);

        return back()->with('message', 'House updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {        
    $house->delete();    
    return redirect('houses.edit')->with('message', 'Houses Deleted successfully');
    }
}
