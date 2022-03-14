<?php

namespace App\Http\Controllers;

use App\Repositories\locations\location\LocationRepository;
use App\Models\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LocationController extends Controller
{
    protected $location;

    public function __construct(LocationRepository $location)
    {
        $this->location = $location;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = $this->location->index();
        return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations = $this->location->store($request);

        if (empty($locations)) {
            return view('location.index')->with('error', 'error, please try again');
        }

        return redirect('/locations')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = $this->location->edit($id);
        return view('location.edit', compact('locations'));
    }

    public function detail($id)
    {
        $locations = $this->location->detail($id);
        return $locations;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $locations = $this->location->update($request, $id);

        return redirect('/locations')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locations = $this->location->destroy($id);

        return redirect('/locations')->with('success','Data deleted successfully');
    }
}
