<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = ['document_number', 'posting_date', 'type', 'source_location_id', 'source_room_id', 'source_floor_id', 'destination_location_id', 'destination_room_id', 'destination_floor_id', 'status'];

    public function location() {
        return $this->belongsTo('App\Models\Location', 'source_location_id');
    }

    public function floor() {
        return $this->belongsTo('App\Models\Floor', 'source_floor_id');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room', 'source_room_id');
    }

    public static function document_number()
    {
    	$document_number = DB::table('stock_movements')->max('document_number');
    	$addNol = '';
    	$document_number = str_replace("STOK-MVM-", "", $document_number);
    	$document_number = (int) $document_number + 1;
        $incrementKode = $document_number;

    	if (strlen($document_number) == 1) {
    		$addNol = "0000";
    	} elseif (strlen($document_number) == 2) {
    		$addNol = "000";
    	} elseif (strlen($document_number == 3)) {
    		$addNol = "00";
    	} elseif (strlen($document_number == 4)) {
            $addNol = "0";
        }

    	$kodeBaru = "STOK-MVM-".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
