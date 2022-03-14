<?php

namespace App\Repositories\locations\Room;

use App\Repositories\locations\Room\RoomInterface;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;


class RoomRepository implements RoomInterface
{
    public function index()
    {
        $rooms = Room::all()->sortByDesc('id');
        return $rooms;
    }

    public function store($request)
    {
        $request->validate([
            'name' => 'required|string|unique:rooms'
        ]);

        $array = [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ];

        $rooms = Room::create($array);

        return $rooms;
    }

    public function edit($id)
    {
        $rooms = Room::find($id);

        return $rooms;
    }

    public function update($request, $id)
    {
        $rooms = Room::find($id);
        $rooms->update($request->all());
        
        return $rooms;
    }

    public function destroy($id)
    {
        $rooms = Room::find($id);
        $rooms->delete('floor');

        return $rooms;
    }
}
