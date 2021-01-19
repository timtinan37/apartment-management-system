<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
    	'contact_person',
    	'flat_id',
    	'no_of_habitats',
    ];

    public function flat()
    {
    	return $this->belongsTo(Flat::class)->withDefault();
    }

    public function contactPerson()
    {
    	return $this->belongsTo(User::class, 'contact_person')->withDefault();
    }

    public function prepareResidentArray($request)
    {
    	return [
			'contact_person' => $request->input('contact_person'),
			'flat_id' => $request->input('flat'),
			'no_of_habitats' => $request->input('no_of_habitats'),
    	];
    }
}
