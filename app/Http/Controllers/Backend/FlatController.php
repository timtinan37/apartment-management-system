<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\{
    Flat,
    User
};
use App\Http\Requests\FlatRequest;
use Illuminate\Support\Facades\View;

class FlatController extends Controller
{
    function __construct(User $user, Flat $flat)
    {
        $this->user = $user;
        $this->flat = $flat;

        $this->authorizeResource(Flat::class, 'flat');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = $this->flat->paginate(10);

        return View::make('backend.flats.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->all()->except([1]);

        return View::make('backend.flats.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FlatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlatRequest $request)
    {
        $flatArray = $this->flat->prepareFlatArray($request);
        $flat = $this->flat->create($flatArray);

        return redirect()->route('dashboard.flats.show', $flat->id)->with('status', 'Flat created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function show(Flat $flat)
    {
        return View::make('backend.flats.show', compact('flat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function edit(Flat $flat)
    {
        $users = $this->user->all()->except([1]);
     
        return View::make('backend.flats.edit', compact('flat', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FlatRequest  $request
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function update(FlatRequest $request, Flat $flat)
    {
        $flatArray = $this->flat->prepareFlatArray($request);
        $flat->update($flatArray);

        return redirect()->route('dashboard.flats.show', $flat->id)->with('status', 'Flat updated.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flat  $flat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        $flat->delete();

        return redirect()->route('dashboard.flats.index')->with('status', 'Flat Deleted!');
    }
}
