<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
    	'name',
    	'amount',
    ];

    public function prepareAssetArray($request)
    {
    	return [
			'name' => $request->input('name'),
			'amount' => $request->input('amount'),
    	];
    }
}
