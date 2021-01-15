<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
		'category',
		'description',
		'amount',
    ];

    public function prepareTransactionArray($request)
    {
    	return [
			'category' => $request->input('category'),
			'description' => $request->input('description'),
			'amount' => $request->input('amount'),
    	];
    }
}
