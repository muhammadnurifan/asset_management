<?php

namespace App\Http\Controllers;

use App\Repositories\locations\Room\RoomRepository;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $room;

    public function __construct(RoomRepository $room)
    {
        $this->room = $room;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = $this->room->index();
        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rooms = $this->room->store($request);

        if (empty($rooms)) {
            return view('room.index')->with('error', 'error, please try again');
        }

        return redirect('/rooms')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = $this->room->edit($id);

        return view('room.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rooms = $this->room->update($request, $id);

        return redirect('/rooms')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms = $this->room->destroy($id);

        return redirect('/rooms')->with('success','Data deleted successfully');
    }
}
