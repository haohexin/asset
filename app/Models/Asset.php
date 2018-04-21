<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function category()
    {
        return $this->hasOne(AssetCategory::class, 'id', 'category_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function departmentKeeper()
    {
        return $this->hasOne(Department::class, 'id', 'department_keeper_id');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'asset_users', 'asset_id', 'user_id');
    }

    public function userkeepers()
    {
        return $this->belongsToMany(User::class, 'asset_keeper_users', 'asset_id', 'user_id');
    }
}
