<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'category_id', 'uom', 'image'];

    public function getImage()
    {
        if(!$this->image){
            return asset('img/default-placeholder.png');
        }

        return asset('img/'.$this->image);
    }

    public function asset_category() {
        return $this->belongsTo('App\Models\AssetCategory', 'category_id');
    }
}
