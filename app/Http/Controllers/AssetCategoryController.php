<?php

namespace App\Http\Controllers;

use App\Repositories\items\AssetCategory\AssetCategoryRepository;
use App\Models\AssetCategory;
use Illuminate\Http\Request;

class AssetCategoryController extends Controller
{
    protected $asset_category;

    public function __construct(AssetCategoryRepository $asset_category)
    {
        $this->asset_category = $asset_category;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset_categories = $this->asset_category->index();
        return view('asset_category.index', compact('asset_categories'));
    }

    // public function datatable()
    // {
    //     $asset_categories = AssetCategory::select('asset_categories.*');

    //     return \DataTables::eloquent($asset_categories)->toJson();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset_categories = $this->asset_category->store($request);

        if (empty($asset_categories)) {
            return view('asset_category.index')->with('error', 'error, please try again');
        }

        return redirect('/asset-categories')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset_categories = $this->asset_category->edit($id);

        return view('asset_category.edit', compact('asset_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asset_categories = $this->asset_category->update($request, $id);

        return redirect('/asset-categories')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset_categories = $this->asset_category->destroy($id);

        return redirect('/asset-categories')->with('success','Data deleted successfully');
    }
}
