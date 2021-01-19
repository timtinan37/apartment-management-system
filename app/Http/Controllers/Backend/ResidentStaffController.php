<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ResidentStaff;
use App\Models\Resident;
use App\Http\Requests\Backend\ResidentStaffRequest;
use Illuminate\Support\Facades\View;

class ResidentStaffController extends Controller
{
    function __construct(ResidentStaff $residentStaff, Resident $resident)
    {
        $this->residentStaff = $residentStaff;
        $this->resident = $resident;
     
        $this->authorizeResource(ResidentStaff::class, 'residentStaff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentStaffs = $this->residentStaff->with('resident.contactPerson')->paginate(10);

        return View::make('backend.residentStaffs.index', compact('residentStaffs'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = $this->resident->with('contactPerson')->get();

        return View::make('backend.residentStaffs.create', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\ResidentStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentStaffRequest $request)
    {
        $residentStaffArray = $this->residentStaff->prepareResidentStaffArray($request);
        $residentStaff = $this->residentStaff->create($residentStaffArray);

        return redirect()->route('dashboard.resident-staffs.show', $residentStaff->id)->with('status', 'Resident-Staff created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return \Illuminate\Http\Response
     */
    public function show(ResidentStaff $residentStaff)
    {
        return View::make('backend.residentStaffs.show', compact('residentStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidentStaff $residentStaff)
    {
        $residents = $this->resident->with('contactPerson')->get();

        return View::make('backend.residentStaffs.edit', compact('residentStaff', 'residents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\ResidentStaffRequest  $request
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return \Illuminate\Http\Response
     */
    public function update(ResidentStaffRequest $request, ResidentStaff $residentStaff)
    {
        $residentStaffArray = $this->residentStaff->prepareResidentStaffArray($request);
        $residentStaff->update($residentStaffArray);

        return redirect()->route('dashboard.resident-staffs.show', $residentStaff->id)->with('status', 'Resident-Staff updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentStaff  $residentStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidentStaff $residentStaff)
    {
        $residentStaff->delete();

        return redirect()->route('dashboard.resident-staffs.index')->with('status', 'Resident-Staff Deleted!');
    }
}
