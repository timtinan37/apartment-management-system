<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\User;
use App\Http\Requests\Backend\CommitteeRequest;
use Illuminate\Support\Facades\View;

class CommitteeController extends Controller
{
    function __construct(User $user, Committee $committee)
    {
        $this->user = $user;
        $this->committee = $committee;

        $this->authorizeResource(Committee::class, 'committee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committees = $this->committee->paginate(10);

        return View::make('backend.committees.index', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->all()->except([1]);

        return View::make('backend.committees.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommitteeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommitteeRequest $request)
    {
        if (count($request->all()) !== count(array_flip($request->all())))
        {
            return redirect()->route('dashboard.committees.create')->withErrors("Multiple positions can't be hold by same user.");
        }

        $committeeArray = $this->committee->prepareCommitteeArray($request);
        $committee = $this->committee->create($committeeArray);

        return redirect()->route('dashboard.committees.show', $committee->id)->with('status', 'Committee created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        return View::make('backend.committees.show', compact('committee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        $users = $this->user->all()->except([1]);
     
        return View::make('backend.committees.edit', compact('committee', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CommitteeRequest  $request
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(CommitteeRequest $request, Committee $committee)
    {
        if (count($request->all()) !== count(array_flip($request->all())))
        {
            return redirect()->route('dashboard.committees.update', $committee->id)->withErrors("Multiple positions can't be hold by same user.");
        }

        $committeeArray = $this->committee->prepareCommitteeArray($request);
        $committee->update($committeeArray);

        return redirect()->route('dashboard.committees.show', $committee->id)->with('status', 'Committee updated.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        $committee->delete();

        return redirect()->route('dashboard.committees.index')->with('status', 'Committee Deleted!');
    }
}
