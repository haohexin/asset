<?php

namespace App\Admin\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
{
    use ModelForm;

    public function __construct()
    {
        $this->departments = Department::selectOptions();
        $this->positions = Position::selectOptions();
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户管理');
            $content->description('用户列表');

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

            $content->header('用户管理');
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

            $content->header('用户管理');
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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '姓名')->editable();
            $grid->column('department.title', '所属部门');
            $grid->column('position.title', '职位');
            $grid->created_at();
            $grid->updated_at();
            $grid->model()->orderBy('id', 'desc');
            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name', '姓名');
                $filter->in('department_id', '部门')->multipleSelect($this->departments);
                $filter->in('position_id', '职务')->multipleSelect($this->positions);
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
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '姓名');
            $form->select('department_id', '所属部门')->options($this->departments);
            $form->select('position_id', '职位')->options($this->positions);
        });
    }
}
