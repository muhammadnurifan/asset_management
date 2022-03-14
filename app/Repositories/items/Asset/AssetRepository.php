<?php

namespace App\Repositories\items\Asset;

use App\Repositories\items\Asset\AssetInterface;
use App\Models\AssetCategory;
use App\Models\Asset;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class AssetRepository implements AssetInterface
{
    public function index()
    {
        $assets = Asset::with('asset_category')->get();
        return $assets;
    }

    public function store($request)
    {
        $request->validate([
            'code'        => 'required|string|unique:assets',
            'name'        => 'required',
            'category_id' => 'required',
            'uom'         => 'required'
        ]);

        $array = [
            'code'        => $request->code,
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'uom'         => $request->uom,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(), 
        ];

        $assets = Asset::create($array);

        return $assets;
    }

    public function detail($id)
    {
        $assets = Asset::find($id)
                        ->with('asset_category')
                        ->get();
        return $assets;
    }

    public function destroy($id)
    {
        $assets = Asset::find($id);
        $assets->delete('asset');

        return $assets;
    }
}
