<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Http\Requests\Backend\AssetRequest;
use Illuminate\Support\Facades\View;

class AssetController extends Controller
{
    function __construct(Asset $asset)
    {
        $this->asset = $asset;
     
        $this->authorizeResource(Asset::class, 'asset');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = $this->asset->paginate(10);

        return View::make('backend.assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('backend.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backend\AssetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRequest $request)
    {
        $assetArray = $this->asset->prepareAssetArray($request);
        $asset = $this->asset->create($assetArray);

        return redirect()->route('dashboard.assets.show', $asset->id)->with('status', 'Asset created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return View::make('backend.assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return View::make('backend.assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\AssetRequest  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(AssetRequest $request, Asset $asset)
    {
        $assetArray = $this->asset->prepareAssetArray($request);
        $asset->update($assetArray);

        return redirect()->route('dashboard.assets.show', $asset->id)->with('status', 'Asset updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('dashboard.assets.index')->with('status', 'Asset Deleted!');
    }
}
