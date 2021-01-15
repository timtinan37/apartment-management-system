<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\{
    Flat,
    Resident,
    User
};
use App\Http\Requests\ResidentRequest;
use Illuminate\Support\Facades\View;

class ResidentController extends Controller
{
    function __construct(User $user, Flat $flat, Resident $resident)
    {
        $this->user = $user;
        $this->flat = $flat;
        $this->resident = $resident;

        $this->authorizeResource(Resident::class, 'resident');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = $this->resident->with(['flat', 'contactPerson'])->paginate(10);

        return View::make('backend.residents.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->all()->except([1]);
        $flats = $this->flat->all();

        return View::make('backend.residents.create', compact('users', 'flats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ResidentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRequest $request)
    {
        $residentArray = $this->resident->prepareResidentArray($request);
        $resident = $this->resident->create($residentArray);

        return redirect()->route('dashboard.residents.show', $resident->id)->with('status', 'Resident created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        return View::make('backend.residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident)
    {
        $users = $this->user->all()->except([1]);
        $flats = $this->flat->all();
     
        return View::make('backend.residents.edit', compact('resident', 'users', 'flats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ResidentRequest  $request
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentRequest $request, Resident $resident)
    {
        $residentArray = $this->resident->prepareResidentArray($request);
        $resident->update($residentArray);

        return redirect()->route('dashboard.residents.show', $resident->id)->with('status', 'Resident updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect()->route('dashboard.residents.index')->with('status', 'Resident Deleted!');
    }
}
