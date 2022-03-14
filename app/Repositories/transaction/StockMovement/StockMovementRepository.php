<?php

namespace App\Repositories\transaction\StockMovement;

use App\Repositories\transaction\StockMovement\StockMovementInterface;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;


class StockMovementRepository implements StockMovementInterface
{
    public function index()
    {
        $stock_movements = StockMovement::all()->sortByDesc('id');
        return $stock_movements;
    }

    public function store($request)
    {
        $request->validate([
            'document_number'    => 'required|string|unique:stock_movements',
            'posting_date'       => 'required',
            'type'               => 'required',
            'source_location_id' => 'required',
            'source_floor_id'    => 'required',
            'source_room_id'     => 'required'
        ]);

        $array = [
            'document_number'         => $request->document_number,
            'posting_date'            => $request->posting_date,
            'type'                    => $request->type,
            'source_location_id'      => $request->source_location_id,
            'source_floor_id'         => $request->source_floor_id,
            'source_room_id'          => $request->source_room_id,
            'destination_location_id' => $request->destination_location_id,
            'destination_floor_id'    => $request->destination_floor_id,
            'destination_room_id'     => $request->destination_room_id,
            'status'                  => 1,
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(), 
        ];

        $stock_movements = StockMovement::create($array);

        return $stock_movements;
    }

    
}
