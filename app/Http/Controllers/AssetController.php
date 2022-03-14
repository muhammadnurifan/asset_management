<?php

namespace App\Http\Controllers;

use App\Repositories\items\Asset\AssetRepository;
use App\Repositories\items\AssetCategory\AssetCategoryRepository;
use App\Models\AssetCategory;
use App\Models\Asset;
use Illuminate\Http\Request;
use DB;

class AssetController extends Controller
{
    protected $asset, $asset_category;

    public function __construct(AssetRepository $asset, AssetCategoryRepository $asset_category)
    {
        $this->asset = $asset;
        $this->asset_category = $asset_category;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = $this->asset->index();
        return view('asset.index', compact('assets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $asset_categories = AssetCategory::all();
        return view('asset.create', compact('asset_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assets = $this->asset->store($request);

        if (empty($assets)) {
            return view('asset.index')->with('error', 'error, please try again');
        }

        return redirect('/asset')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset_categories = AssetCategory::all();
        $assets = Asset::find($id);

        return view('asset.edit',compact('asset_categories', 'assets'));
    }

    public function detail($id)
    {
        $assets = $this->asset->detail($id);
        return $assets;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $assets = Asset::find($id);
         // dd($assets);
         $assets->update($request->all());
         if($request->hasFile('image')){
             $request->file('image')->move('img/',$request->file('image')->getClientOriginalName());
             $assets->image = $request->file('image')->getClientOriginalName();
             $assets->save();
         }
        return redirect('/asset')->with('success','Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assets = $this->asset->destroy($id);

        return redirect('/asset')->with('success','Data deleted successfully');
    }
}
