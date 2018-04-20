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

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userKeeper()
    {
        return $this->hasOne(User::class, 'id', 'user_keeper_id');
    }
}
