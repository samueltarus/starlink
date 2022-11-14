<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;

class HouseTypeController extends Controller
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
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function show(HouseType $houseType)
    {
        return view(
            'house_types.show',
            [
                'house_types' => $houseType
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseType $houseType)
    {
        return view('house_types.edit', ['house_types' => $houseType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseType $houseType)
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
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseType $houseType)
    {
        $houseType->delete();
        return redirect('house_types.edit')->with('message', 'House Types Deleted successfully');
    }
}
