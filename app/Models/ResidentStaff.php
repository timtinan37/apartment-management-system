<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidentStaff extends Model
{
    protected $table = 'resident_staffs';
    
    protected $fillable = [
    	'resident_id',
		'name',
		'designation',
		'phone',
		'nid_no',
    ];

    public function prepareResidentStaffArray($request)
    {
    	return [
			'name' => $request->input('name'),
			'resident_id' => $request->input('resident'),
			'designation' => $request->input('designation'),
			'phone' => $request->input('phone'),
			'nid_no' => $request->input('nid_no'),
    	];
    }

    public function resident()
    {
    	return $this->belongsTo(Resident::class);
    }
}
