<?php

namespace App\Http\Controllers;

use App\Models\ApartmentType;
use App\Models\HouseType;
use Illuminate\Http\Request;

class ApartmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'house_types.index',
            [
                'house_types' => HouseType::latest()
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
        return view('house_types.create');
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
            'name' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        HouseType::create($data);

        return redirect('/')->with('message', 'House Type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Http\Response
     */
    public function show(ApartmentType $apartmentType)
    {
        return view(
            'house_types.show',
            [
                'house_types' => $apartmentType
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(ApartmentType $apartmentType)
    {
        return view('house_types.edit', ['house_types' => $apartmentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApartmentType $apartmentType)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        HouseType::create($data);

        return redirect('/')->with('message', 'House Type created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApartmentType  $apartmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApartmentType $apartmentType)
    {
        $apartmentType->delete();

        return redirect('apartments.edit')->with('message', 'House Type Deleted successfully');
    }
}
