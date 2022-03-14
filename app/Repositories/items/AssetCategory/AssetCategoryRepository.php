<?php

namespace App\Repositories\items\AssetCategory;

use App\Repositories\items\AssetCategory\AssetCategoryInterface;
use App\Models\AssetCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;


class AssetCategoryRepository implements AssetCategoryInterface
{
    public function index()
    {
        $asset_categories = AssetCategory::all()->sortByDesc('id');
        return $asset_categories;
    }

    public function store($request)
    {
        $request->validate([
            'name' => 'required|string|unique:asset_categories'
        ]);

        $array = [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ];

        $asset_categories = AssetCategory::create($array);

        return $asset_categories;
    }

    public function edit($id)
    {
        $asset_categories = AssetCategory::find($id);

        return $asset_categories;
    }

    public function update($request, $id)
    {
        $asset_categories = AssetCategory::find($id);
        $asset_categories->update($request->all());
        
        return $asset_categories;
    }

    public function destroy($id)
    {
        $asset_categories = AssetCategory::find($id);
        $asset_categories->delete('asset_category');

        return $asset_categories;
    }
}
