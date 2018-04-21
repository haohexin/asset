<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetMaintain extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
