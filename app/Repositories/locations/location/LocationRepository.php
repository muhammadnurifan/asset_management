<?php

namespace App\Repositories\locations\location;

use App\Repositories\locations\location\LocationInterface;
use App\Models\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class LocationRepository implements LocationInterface
{
    public function index()
    {
        $locations = Location::all();
        return $locations;
    }

    public function store($request)
    {
        $request->validate([
            'name'        => 'required|string|unique:locations',
            'phone'       => 'required',
            'address'     => 'required',
            'postal_code' => 'required',
            'latitude'    => 'required|numeric',
            'longitude'   => 'required|numeric'
        ]);

        $array = [
            'name'        => $request->name,
            'phone'       => $request->phone,
            'address'     => $request->address,
            'postal_code' => $request->postal_code,
            'latitude'    => $request->latitude,
            'longitude'   => $request->longitude,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(), 
        ];

        $locations = Location::create($array);

        return $locations;
    }

    public function detail($id)
    {
        $locations = Location::find($id);

        return $locations;
    }

    public function edit($id)
    {
        $locations = Location::find($id);

        return $locations;
    }

    public function update($request, $id)
    {
        $locations = Location::find($id);
        $locations->update($request->all());
        
        return $locations;
    }

    public function destroy($id)
    {
        $locations = Location::find($id);
        $locations->delete('location');

        return $locations;
    }
}
