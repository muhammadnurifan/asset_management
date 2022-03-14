<?php

namespace App\Http\Controllers;

use App\Repositories\transaction\StockMovement\StockMovementRepository;
use App\Models\StockMovement;
use App\Models\Location;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    protected $stock_movement;

    public function __construct(StockMovementRepository $stock_movement)
    {
        $this->stock_movement = $stock_movement;    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_movements = $this->stock_movement->index();
        return view('stock_movement.index', compact('stock_movements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $locations = Location::all();
        $floors = Floor::all();
        $rooms = Room::all();
        $document_number = StockMovement::document_number();
        return view('stock_movement.create', compact('locations', 'floors', 'rooms'), ['document_number' => $document_number]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_movements = $this->stock_movement->store($request);

        if (empty($stock_movements)) {
            return view('stock_movement.index')->with('error', 'error, please try again');
        }

        return redirect('/stock-movements')->with('success','Data inputted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function show(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::all();
        $floors = Floor::all();
        $rooms = Room::all();
        $stock_movements = StockMovement::find($id);

        return view('stock_movement.edit',compact('locations', 'floors', 'rooms', 'stock_movements'));
    }

    public function addItem($id)
    {
        $stock_movements = StockMovement::find($id);
        dd($stock_movements);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockMovement $stockMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockMovement  $stockMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockMovement $stockMovement)
    {
        //
    }
}
