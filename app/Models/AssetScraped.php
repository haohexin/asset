<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetScraped extends Model
{
    protected $fillable = ['date', 'record', 'remark'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
