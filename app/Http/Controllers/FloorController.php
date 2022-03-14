<?php

namespace App\Http\Controllers;

use App\Repositories\locations\Floor\FloorRepository;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    protected $floor;

    public function __construct(FloorRepository $floor)
    {
        $this->floor = $floor;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = $this->floor->index();
        return view('floor.index', compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $floors = $this->floor->store($request);

        if (empty($floors)) {
            return view('floor.index')->with('error', 'error, please try again');
        }

        return redirect('/floor')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $floors = $this->floor->edit($id);

        return view('floor.edit', compact('floors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $floors = $this->floor->update($request, $id);

        return redirect('/floor')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $floors = $this->floor->destroy($id);

        return redirect('/floor')->with('success','Data deleted successfully');
    }
}
