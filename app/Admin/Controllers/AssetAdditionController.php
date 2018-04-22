<?php

namespace App\Admin\Controllers;

use App\Models\Asset;
use App\Models\AssetAddition;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AssetAdditionController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('附加设备管理');
            $content->description('所有附加设备');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('附加设备管理');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('附加设备管理');
            $content->description('创建');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(AssetAddition::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('title', '名称');
            $grid->column('asset.title', '所属资产');
            $grid->column('specification', '型号规格');
            $grid->column('storage_place', '存放地点');
            $grid->column('unit_price', '单价');
            $grid->column('amount', '数量');
            $grid->column('original_value', '设备原值');
            $grid->column('commissioning_date', '启用日期');

            $grid->created_at();
            $grid->updated_at();
            $grid->model()->orderBy('id', 'desc');
            $grid->filter(function ($filter) {
                $assets = Asset::get()->pluck('title', 'id');
                $filter->disableIdFilter();
                $filter->in('asset_id', '资产')->multipleSelect($assets);
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(AssetAddition::class, function (Form $form) {

            $form->display('id', 'ID');
            $assets = Asset::get()->pluck('title', 'id');
            $form->select('asset_id', '所属资产')->options($assets);
            $form->text('title', '名称');
            $form->text('specification', '型号规格');
            $form->text('storage_place', '存放地点');
            $form->text('unit_price', '单价');
            $form->number('amount', '数量');
            $form->text('original_value', '设备原值');
            $form->date('commissioning_date', '启用日期');
        });
    }
}
