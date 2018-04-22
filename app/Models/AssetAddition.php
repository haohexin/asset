<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetAddition extends Model
{
    protected $fillable = ['asset_id', 'title', 'specification', 'storage_place', 'unit_price', 'amount', 'original_value', 'commissioning_date'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'revisionable_id');
    }
}
