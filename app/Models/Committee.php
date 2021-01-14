<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = [
		'president',
		'president_id',
		'vp',
		'vp_id',
		'gs',
		'gs_id',
		'ags',
		'ags_id',
		'treasurer',
		'treasurer_id',
		'status',
		'deactivated_at',
    ];

    public function prepareCommitteeArray($request)
    {
    	return [
            'president' => User::find($request->input('president'))->name,
            'president_id' => $request->input('president'),
            'vp' => User::find($request->input('vice_president'))->name,
            'vp_id' => $request->input('vice_president'),
            'gs' => User::find($request->input('gs'))->name,
            'gs_id' => $request->input('gs'),
            'ags' => User::find($request->input('ags'))->name,
            'ags_id' => $request->input('ags'),
            'treasurer' => User::find($request->input('treasurer'))->name,
            'treasurer_id' => $request->input('treasurer'),
            'status' => $request->input('status') ? $request->input('status') : 'ACTIVE',
        ];
    }
}
