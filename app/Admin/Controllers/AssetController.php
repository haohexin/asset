<?php

namespace App\Admin\Controllers;

use App\Models\Asset;

use App\Models\AssetCategory;
use App\Models\Department;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AssetController extends Controller
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

            $content->header('资产管理');
            $content->description('资产列表');

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

            $content->header('资产管理');
            $content->description('编辑资产');

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

            $content->header('资产管理');
            $content->description('创建资产');

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
        return Admin::grid(Asset::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('title', '名称');
            $grid->column('category.title', '类型');
            $grid->column('number', '编号');
            $grid->column('supply', '供应单位');
            $grid->column('original_value', '原值');
            $grid->column('purchase_date', '购入日期');
            $grid->column('commissioning_date', '启用日期');
            $grid->column('durable_year', '使用年限');
            $grid->column('department.title', '使用部门');
            $grid->column('departmentKeeper.title', '所属部门');
            $grid->column('user.name', '使用人');
            $grid->column('userKeeper.name', '保管人');
            $grid->column('storage_place', '存放地址');
            $grid->column('specification', '型号规格');
            $grid->column('source', '来源');
            $grid->column('unit', '计量单位');
            $grid->column('deprecition', '折旧方法');
            $grid->column('deprecition_year', '折旧年限');
            $grid->column('deprecition_rate', '折旧率');
            $grid->column('deprecition_monthly', '月折旧额');
            $grid->column('worth', '预计残净值');
            $grid->column('certificate_number', '凭证号');
            $grid->column('purpose', '用途');
            $grid->column('status', '正常?')->switch();
            $grid->model()->orderBy('id', 'desc');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Asset::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->number('asset_id', '资产ID');
            $form->select('category_id', '类型')->options(AssetCategory::selectOptions());
            $form->text('number', '编号');
            $form->text('title', '名称');
            $form->text('supply', '供应单位');
            $form->text('original_value', '原值');
            $form->date('purchase_date', '购入日期');
            $form->date('commissioning_date', '启用日期');
            $form->text('durable_year', '使用年限');
            $form->select('department_id', '使用部门')->options(Department::selectOptions());
            $form->select('department_keeper_id', '所属部门')->options(Department::selectOptions());
            $users = User::get()->pluck('name', 'id');
            $form->select('user_id', '使用人')->options($users);
            $form->select('user_keeper_id', '保管人')->options($users);
            $form->text('storage_place', '存放地址');
            $form->text('specification', '型号规格');
            $form->text('source', '来源');
            $form->text('unit', '计量单位');
            $form->text('deprecition', '折旧方法');
            $form->text('deprecition_year', '折旧年限');
            $form->text('deprecition_rate', '折旧率');
            $form->text('deprecition_monthly', '月折旧额');
            $form->text('worth', '预计残净值');
            $form->text('certificate_number', '凭证号');
            $form->text('purpose', '用途');
            $form->switch('status', '正常');
        });
    }
}
