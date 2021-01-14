<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = [
		'flat_no',
		'floor',
		'owner_id',
    ];

    public function prepareFlatArray($request)
    {
    	return [
			'flat_no' => $request->input('flat_no'),
			'floor' => $request->input('floor'),
			'owner_id' => $request->input('owner'),
    	];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withDefault();
    }
}
