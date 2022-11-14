<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'apartments.index',
            [
                'apartments' => Apartment::latest()
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
        return view('apartments.create');
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
            'apartment_type' =>  'required',
            'town' => 'required',
            'location' => 'required',
            'description' => ['required', 'email'],
            'landlord' => 'required',
            'management_fee' => 'required'
        ]);


        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        Apartment::create($data);

        return redirect('/')->with('message', 'Apartment created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {

        return view(
            'apartment.show',
            [
                'apartments' => $apartment
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('apartments.edit', ['apartments' => $apartment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->validate([
            'apartment_name' => 'required',
            'apartment_type' =>  'required',
            'town' => 'required',
            'location' => 'required',
            'description' => ['required', 'email'],
            'landlord' => 'required',
            'management_fee' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        Apartment::create($data);

        return redirect('/')->with('message', 'Updated created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect('apartments.edit')->with('message', 'Apartment Deleted successfully');
    }
}
