<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//关于我们
Route::get('about',function () {
    return view('about');
});

//产品页
Route::get('products',function () {
    return view('products');
});

//服务页
Route::get('services',function () {
    return view('services');
});
/*
 *  路由参数里加问号  是代表可选参数，加上可选参数后要给个默认值到闭包里
 * */
Route::get('user/{id?}',function ($id = 11) {
    return "用户ID：".$id;
})->where('id','[0-9]+');

//中间件
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard',function () {
        return view('dashboard');
    });
    Route::get('account',function () {
        return view('account');
    });
});

//路由路径前缀
Route::prefix('api')->group(function () {
    Route::get('/',function () {
        //处理/api路由

    })->name('api.index');
    Route::get('users',function () {
        //处理api/users路由

    })->name('api.users');
});

//子域名路由
Route::domain('admin.blog.test')->group(function () {
    Route::get('/',function () {
        //处理http://admin.blog.test路由
    });
});
Route::domain('{account}.blog.test')->group(function () {
    Route::get('/',function ($account) {
        //
    });
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

//



