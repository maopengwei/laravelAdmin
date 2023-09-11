<?php

namespace App\Admin\Controllers;

use App\Models\Movies;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MoviesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movies';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movies());
        $grid->id('ID')->sortable();
        $grid->username('Username');
        //$grid->column('id', __('Id'));
        $grid->director()->display(function($userId){
             return User::find($userId)->name;
        });
        $grid->describe();
        $grid->rate();
        $grid->released('Released')->display(function($released){
            return $released? "yes" : "no";
        });
        $grid->release_at();
        $grid->created_at();
        $grid->updated_at();

        $grid-> filter(function ($filter) {
            $filter->between('create_at', 'Created Time')->datetime();
        });
        $grid->model()->where('id', '<', 100);
        $grid->paginate(1);
        $grid->disableCreateButton();
        $grid->disablePagination();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableActions();
//        $grid->disableColumnSelector();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Movies::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('director', __('Director'));
        $show->field('describe', __('Describe'));
        $show->field('rate', __('Rate'));
        $show->field('release_at', __('Release at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('released', __('Released'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movies());

        $form->text('title', __('Title'));
        $form->number('director', __('Director'));
        $form->text('describe', __('Describe'));
        $form->switch('rate', __('Rate'));
        $form->datetime('release_at', __('Release at'))->default(date('Y-m-d H:i:s'));
        $form->text('released', __('Released'));

        return $form;
    }
}
