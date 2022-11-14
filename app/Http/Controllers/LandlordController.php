<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(
            'landlords.index',
            [
                'landlords' => Landlord::latest()
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
        return view('landlords.create');
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
            'first_name' => 'required',
            'middle_name' => ['required', Rule::unique('listings', 'company')],
            'other_names' => 'required',
            'id_number' => 'required',
            'email' => ['required', 'email'],
            'phone_number' => 'required',
            'password' => 'required',
            'physical_address' => 'required'
        ]);



        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        Landlord::create($data);

        return redirect('/')->with('message', 'Landlord created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function show(Landlord $landlord)
    {
        return view(
            'listing.show',
            [
                'landlords' => $landlord
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function edit(Landlord $landlord)
    {
        return view('landlords.edit', ['landlords' => $landlord]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landlord $landlord)
    {
        // Make sure logged in user is owner
        // if($landlord->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        $data = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'other_names' => 'required',
            'id_number' => 'required',
            'email' => ['required', 'email'],
            'phone_number' => 'required',
            'password' => 'required',
            'physical_address' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $landlord->update($data);

        return back()->with('message', 'Landlord updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landlord $landlord)
    {

        $landlord->delete();
        return redirect('landlords.edit')->with('message', 'Landlord Deleted successfully');
    }
}
