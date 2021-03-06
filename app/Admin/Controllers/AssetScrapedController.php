<?php

namespace App\Admin\Controllers;

use App\Models\Asset;
use App\Models\AssetScraped;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AssetScrapedController extends Controller
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

            $content->header('报废信息管理');
            $content->description('所有报废信息');

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

            $content->header('报废信息管理');
            $content->description('编辑');

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

            $content->header('报废信息管理');
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
        return Admin::grid(AssetScraped::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('asset.title', '资产')->label();;
            $grid->column('date', '日期');
            $grid->column('record', '记录');
            $grid->column('remark', '备注');

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
        return Admin::form(AssetScraped::class, function (Form $form) {

            $form->display('id', 'ID');

            $assets = Asset::get()->pluck('title', 'id');
            $form->select('asset_id', '资产')->options($assets);
            $form->date('date', '日期');
            $form->textarea('record', '记录');
            $form->textarea('remark', '备注');
        });
    }
}
