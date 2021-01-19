<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingStaff extends Model
{
	protected $table = 'building_staffs';
	
    protected $fillable = [
		'name',
		'designation',
		'phone',
		'nid_no',
    ];

    public function prepareBuildingStaffArray($request)
    {
    	return [
			'name' => $request->input('name'),
			'designation' => $request->input('designation'),
			'phone' => $request->input('phone'),
			'nid_no' => $request->input('nid_no'),
    	];
    }
}
