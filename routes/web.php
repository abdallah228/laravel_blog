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



Route::get('/test',function(){

return App\Profile::find(1)->user;

});




Route::get('/','frontend_controller@index')->name('index.frontend');
Route::get('/post/{slug}','frontend_controller@single')->name('single.post');
//category for front end
Route::get('/category/{id}','frontend_controller@category')->name('single.category');
//tag for front end
Route::get('/tag/{id}','frontend_controller@tag')->name('single.tag');
//Search
Route::get('/search','frontend_controller@search')->name('result');



Auth::routes();





Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

Route::get('/dashboard', 'HomeController@index')->name('home');

// post
//create post
Route::get('/create/post','post_controller@create')->name('post.create');
//store post
Route::post('store/post','post_controller@store')->name('post.store');
//show post
Route::get('show/posts','post_controller@index')->name('post.index');
//Trash post
Route::get('trash/post/{id}','post_controller@destroy')->name('post.destroy');
//posts trashed
Route::get('trashed/post','post_controller@trashed')->name('post.trashed');
//delete post
Route::get('delete/post/{id}','post_controller@kill')->name('trashed.delete');
//Restore
Route::get('restore/post/{id}','post_controller@restore')->name('post.restore');
//Edit post
Route::get('edit/post/{id}','post_controller@edit')->name('post.edit');
//Update Post
Route::post('update/post/{id}','post_controller@update')->name('post.update');


///////////////////category
Route::get('/create/category','category_controller@create')->name('category.create');
//store category
Route::post('/store/category','category_controller@store')->name('category.store');
//show categories
Route::get('show/categories','category_controller@index')->name('category.index');
//Delete Category
Route::get('delete/category/{id}','category_controller@destroy')->name('category.delete');
//edit category 
Route::get('edit/category/{id}','category_controller@edit')->name('category.edit');
//update category
Route::post('update/category/{id}','category_controller@update')->name('category.update');


////////////////////Tags
//create tag
Route::get('create/tag','Tag_controller@create')->name('tag.create');
//store tag
Route::post('store/tag','Tag_controller@store')->name('tag.store');
//show tags
Route::get('show/tags','Tag_controller@index')->name('tags');
//Delete Tag
Route::get('delete/tag/{id}','Tag_controller@destroy')->name('tag.delete');
//edit tag
Route::get('edit/tag/{id}','Tag_controller@edit')->name('tag.edit');
//update tag
Route::post('update/tag/{id}','Tag_controller@update')->name('tag.update');

///////////Users
//add new user
Route::get('create/user','User_controller@create')->name('user.create');
//store users
Route::post('store/user/','User_controller@store')->name('user.store');

//show users
Route::get('show/users','User_controller@index')->name('users');
//make admin
Route::get('make/admin/{id}','User_controller@makeadmin')->name('user.admin');
//remove permession
Route::get('delete/permession/{id}','User_controller@notadmin')->name('user.not.admin');
//user profile
//to edit profile user
Route::get('/user/profile','profile_controller@index')->name('user.profile');
//update user profile
Route::post('/user/profile/update','profile_controller@update')->name('user.profile.update');
//delete user and profile
Route::get('user/delete/{id}','User_controller@destroy')->name('user.delete');
//setting
Route::get('setting','Setting_controller@index')->name('setting');
//update setting
Route::post('update/setting','Setting_controller@update')->name('setting.update');

////////front end singlepage.....


});



