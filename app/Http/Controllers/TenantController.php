<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'tenants.index',
            [
                'tenants' => Tenant::latest()
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
        return view('tenants.create');
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
            'full_name' => 'required',
            'phone_number' => 'required',
            'email' => ['required', 'email'],
            'id_number' => 'required',
            'password' => 'required',
            'physical_address' => 'required',
            'occupation_status' => 'required',
            'at' => 'required',
            'contact_person' => 'required'
        ]);


        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // $data['user_id'] = auth()->id();

        Tenant::create($data);

        return redirect('/')->with('message', 'Tenant created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view(
            'tenant.show',
            [
                'tenant' => $tenant
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', ['tenants' => $tenant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'email' => ['required', 'email'],
            'id_number' => 'required',
            'password' => 'required',
            'physical_address' => 'required',
            'occupation_status' => 'required',
            'at' => 'required',
            'contact_person' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $data['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $tenant->update($data);

        return back()->with('message', 'Tenant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {

        $tenant->delete();
        return redirect('tenants.edit')->with('message', 'Tenant Deleted successfully');
    }
}
