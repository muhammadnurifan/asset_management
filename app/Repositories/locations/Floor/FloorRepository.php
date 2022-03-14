<?php

namespace App\Repositories\locations\Floor;

use App\Repositories\locations\Floor\FloorInterface;
use App\Models\Floor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;


class FloorRepository implements FloorInterface
{
    public function index()
    {
        $floors = Floor::all()->sortByDesc('id');
        return $floors;
    }

    public function store($request)
    {
        $request->validate([
            'name' => 'required|string|unique:floors'
        ]);

        $array = [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ];

        $floors = Floor::create($array);

        return $floors;
    }

    public function edit($id)
    {
        $floors = Floor::find($id);

        return $floors;
    }

    public function update($request, $id)
    {
        $floors = Floor::find($id);
        $floors->update($request->all());
        
        return $floors;
    }

    public function destroy($id)
    {
        $floors = Floor::find($id);
        $floors->delete('floor');

        return $floors;
    }
}
