<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetMaintain extends Model
{
    protected $fillable = ['date', 'cost', 'record', 'remark'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
