<?php

namespace App\Http\Controllers;

use App\Models\AssignTenantHouse;
use Illuminate\Http\Request;

class AssignTenantHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'assign_houses.index',
            [
                'assign_houses' => AssignTenantHouse::latest()
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
        return view('assign_houses.create');
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
            'house_name' => 'required',
            'montly_rent' => 'required',
            'tenant_id' => 'required',
            'tenant_name' => 'required',
            'deposit_amount' => 'required',
            'placement_date' => 'required',
        ]);


        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        AssignTenantHouse::create($data);

        return redirect('/')->with('message', 'Assign House created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignTenantHouse  $assignTenantHouse
     * @return \Illuminate\Http\Response
     */
    public function show(AssignTenantHouse $assignTenantHouse)
    {
        return view(
            'assign_houses.show',
            [
                'assignTenantHouses' => $assignTenantHouse
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignTenantHouse  $assignTenantHouse
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignTenantHouse $assignTenantHouse)
    {
        return view('assign_houses.edit', ['assignTenantHouses' => $assignTenantHouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignTenantHouse  $assignTenantHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignTenantHouse $assignTenantHouse)
    {

        $data = $request->validate([
            'apartment_name' => 'required',
            'house_name' => 'required',
            'montly_rent' => 'required',
            'tenant_id' => 'required',
            'tenant_name' => 'required',
            'deposit_amount' => 'required',
            'placement_date' => 'required',
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $assignTenantHouse->update($data);

        return back()->with('message', 'Assign Tenant Houses updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignTenantHouse  $assignTenantHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignTenantHouse $assignTenantHouse)
    {
        $assignTenantHouse->delete();

        return redirect('landlords.edit')->with('message', 'Assign Tenant Houses Deleted successfully');
    }
}
