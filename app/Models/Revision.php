<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'revisionable_id');
    }
}
