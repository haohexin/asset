<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetScraped extends Model
{
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
