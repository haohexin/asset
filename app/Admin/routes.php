<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('assetCategory', AssetCategoryController::class);
    $router->resource('departments', DepartmentsController::class);
    $router->resource('positions', PositionsController::class);

    $router->resource('users', UserController::class);

    $router->resource('assets', AssetController::class);

    $router->resource('assetAddition', AssetAdditionController::class);

    $router->resource('assetMaintain', AssetMaintainController::class);
    $router->resource('assetScraped', AssetScrapedController::class);
    $router->resource('revisions', RevisionController::class);
});
