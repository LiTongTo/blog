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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index','IndexController@index');

// Route::get('/goods','IndexController@goods');

// Route::get('/add',function(){
//     echo "<form action='/adddo' method='post'><input type='text' name='name' >".csrf_field()."<button>提交</button></form>";
// });

// Route::post('/adddo',function(){
//     echo request()->name;
// });

// Route::get('/add','IndexController@add');
// Route::post('/adddo','IndexController@adddo');
// Route::match(['get','post'],'/add','IndexController@add');
// Route::any('/add','IndexController@add');
// Route::view('/add','add');

// Route::get('/cate/{id}','IndexController@cate');
/* Route::get('/cate/{id}/{name}',function($id,$name){
      echo $id.'--'.$name;
 });*/
//  Route::get('/cate/{id?}/{name}',function($id=null,$name){
//      echo '啥也不知道';
//      echo $id.'=='.$name;
//  });
//正则约束
// Route::get('/new/{id?}/{name?}','IndexController@cate')->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);


//品牌
  Route::prefix('/brand')->middleware('islogin')->group(function(){

        Route::get('/create','BrandController@create');
        Route::post('/store','BrandController@store');
        Route::get('/index','BrandController@index');
        Route::get('/edit/{id}','BrandController@edit');
        Route::post('/update/{id}','BrandController@update');
        Route::get('/destroy/{id}','BrandController@destroy');
  });


//学生
Route::prefix('/student')->middleware('islogin')->group(function(){
        Route::get('/create','StudentController@create');
        Route::post('/store','StudentController@store');
        Route::get('/index','StudentController@index');
});



//分类
Route::prefix('/cate')->middleware('islogin')->group(function(){
        Route::get('/create','CategoryController@create');
        Route::post('/store','CategoryController@store');
        Route::get('/index','CategoryController@index');
        Route::get('/edit/{id}','CategoryController@edit');
        Route::post('/update/{id}','CategoryController@update');
        Route::get('/destroy/{id}','CategoryController@destroy');
});



//售楼
  Route::prefix('/sale')->middleware('islogin')->group(function(){
        Route::get('/sale/create','SaleController@create');
        Route::post('/sale/store','SaleController@store');
        Route::get('/sale/index','SaleController@index');
  });

  //商品
  Route::prefix('/goods')->middleware('islogin')->group(function(){
        Route::get('/create','GoodsController@create');
        Route::post('/store','GoodsController@store');
        Route::get('/index','GoodsController@index');
        Route::get('/edit/{id}','GoodsController@edit');
        Route::post('/update/{id}','GoodsController@update');
        Route::get('/destroy/{id}','GoodsController@destroy');
  });

 // 图书
  Route::prefix('/books')->middleware('islogin')->group(function(){
        Route::get('/create','BooksController@create');
        Route::post('/store','BooksController@store');
        Route::get('/index','BooksController@index');
        Route::get('/edit/{id}','BooksController@edit');
        Route::post('/update/{id}','BooksController@update');
        Route::get('/destroy/{id}','BooksController@destroy');
  });

  //管理员
  Route::prefix('/admin')->middleware('islogin')->group(function(){
      Route::get('/create','AdminController@create');
      Route::post('/store','AdminController@store');
      Route::get('/index','AdminController@index'); 
      Route::get('/edit/{id}','AdminController@edit');
      Route::post('/update/{id}','AdminController@update');
      Route::get('/destroy/{id}','AdminController@destroy');
  });
 

   //新闻
   Route::prefix('/news')->group(function(){
      Route::get('/create','NewsController@create');
      Route::post('/store','NewsController@store');
      Route::get('/index','NewsController@index'); 
      Route::get('/edit/{id}','NewsController@edit');
      Route::post('/update/{id}','NewsController@update');
      Route::get('/destroy/{id}','NewsController@destroy');
  });
 
  //登录 
    Route::get('/login','LoginController@login');
    Route::post('/logindo','LoginController@logindo');

 //首页

  Route::get('/admins','AdminsController@admins');


  


//文章管理
Route::prefix('/art')->middleware('islogin')->group(function(){
    Route::get('/create','ArtController@create');
    Route::post('/store','ArtController@store');
    Route::get('/index','ArtController@index'); 
    Route::get('/edit/{id}','ArtController@edit');
    Route::post('/update/{id}','ArtController@update');
    Route::get('/destroy/{id}','ArtController@destroy');
});


//前台
Route::get('/','Index\IndexController@index')->name('index');
Route::get('/log','Index\LoginController@log');
Route::get('/reg','Index\LoginController@reg');
Route::get('/reg/sendSMS','Index\LoginController@sendSMS');//发送短信到手机号
Route::get('/reg/sendEmail','Index\LoginController@sendEmail');//发送短信到邮箱
Route::get('/reg/regDo','Index\LoginController@regDo');
Route::get('/log/logDo','Index\LoginController@logDo');
Route::get('/qiue','Index\LoginController@qiue');
Route::get('/prolist','Index\IndexController@prolist');//所有商品
Route::get('/proinfo/{id?}','Index\IndexController@proinfo')->middleware('islog')->name('proinfo');//商品详情页
Route::post('/addcar','Index\IndexController@addcar');//购物车加入数据库
Route::get('/car','Index\IndexController@car')->middleware('islog')->name('car');//购物车
Route::get('/car/changeNumber','Index\IndexController@changeNumber');//更改购买数量
Route::get('/car/getToal','Index\IndexController@getToal');//重新获取小计
Route::get('/car/getMoney','Index\IndexController@getMoney');//总价
Route::get('/pay','Index\IndexController@pay')->name('pay');//确认订单
Route::get('/user','Index\IndexController@user')->name('user');//个人中心
Route::get('/address','Index\IndexController@address')->name('address');//收货地址
Route::get('/address/adds','Index\IndexController@adds')->name('adds');//添加收货地址
Route::get('/address/addsDo','Index\IndexController@addsDo')->name('addsDo');//执行添加收货地址

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
