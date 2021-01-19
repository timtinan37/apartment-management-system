<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BuildingStaff;
use App\Http\Requests\Backend\BuildingStaffRequest;
use Illuminate\Support\Facades\View;

class BuildingStaffController extends Controller
{
    function __construct(BuildingStaff $buildingStaff)
    {
        $this->buildingStaff = $buildingStaff;
     
        $this->authorizeResource(BuildingStaff::class, 'buildingStaff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildingStaffs = $this->buildingStaff->paginate(10);

        return View::make('backend.buildingStaffs.index', compact('buildingStaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('backend.buildingStaffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\BuildingStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingStaffRequest $request)
    {
        $buildingStaffArray = $this->buildingStaff->prepareBuildingStaffArray($request);
        $buildingStaff = $this->buildingStaff->create($buildingStaffArray);

        return redirect()->route('dashboard.building-staffs.show', $buildingStaff->id)->with('status', 'Building-Staff created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return \Illuminate\Http\Response
     */
    public function show(BuildingStaff $buildingStaff)
    {
        return View::make('backend.buildingStaffs.show', compact('buildingStaff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildingStaff $buildingStaff)
    {
        return View::make('backend.buildingStaffs.edit', compact('buildingStaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\BuildingStaffRequest  $request
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingStaffRequest $request, BuildingStaff $buildingStaff)
    {
        $buildingStaffArray = $this->buildingStaff->prepareBuildingStaffArray($request);
        $buildingStaff->update($buildingStaffArray);

        return redirect()->route('dashboard.building-staffs.show', $buildingStaff->id)->with('status', 'Building-Staff updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuildingStaff  $buildingStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildingStaff $buildingStaff)
    {
        $buildingStaff->delete();

        return redirect()->route('dashboard.building-staffs.index')->with('status', 'Building-Staff Deleted!');
    }
}
