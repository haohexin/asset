<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionFormattedFieldNames = array(
        'asset_id' => '资产ID',
        'category_id' => '类型',
        'number' => '编号',
        'title' => '名称',
        'supply' => '供应单位',
        'original_value' => '原值',
        'purchase_date' => '购入日期',
        'commissioning_date' => '启用日期',
        'durable_year' => '使用年限',
        'department_id' => '使用部门',
        'department_keeper_id' => '所属部门',
        'storage_place' => '存放地址',
        'specification' => '型号规格',
        'source' => '来源',
        'unit' => '计量单位',
        'deprecition' => '折旧方法',
        'deprecition_year' => '折旧年限',
        'deprecition_rate' => '折旧率',
        'deprecition_monthly' => '月折旧额',
        'worth' => '预计残净值',
        'certificate_number' => '凭证号',
        'purpose' => '用途',
    );

    public function category()
    {
        return $this->hasOne(AssetCategory::class, 'id', 'category_id');
    }

    public function additions()
    {
        return $this->hasMany(AssetAddition::class);
    }

    public function maintains()
    {
        return $this->hasMany(AssetMaintain::class);
    }

    public function scraped()
    {
        return $this->hasMany(AssetScraped::class);
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
