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

/*Route::get('/', function () {
return view('welcome');
});*/

Auth::routes();

Route::get('/', function () {
	return view('index');
});

Route::get('/blog', 'BlogController@showAll');

Route::get('/blog-details/{id}', 'BlogController@showBlogDetails');

Route::get('/blogs/search', 'BlogController@show_blogs_search')->name('blogs.search');

Route::get('/blogs/category/{id}', 'BlogController@blogs_search_category')->name('blogs.category');

Route::get('/about-us', 'AboutusController@index');

Route::get('/contact-us', 'ContactusController@index');

Route::post('contact/touch', 'ContactEmailController@store')->name('contact.touch');


/******************** Admin Panel routes start here *********/
Route::get('/admin', function(){
	return view('admin/index');
});

Route::get('/admin/no-access', function(){
	return view('admin/no-access');
});

Route::post('/login/admin', 'AdminUserController@login')->name('login.admin');

Route::get('/admin/logout', 'AdminUserController@logout');

Route::get('/admin/dashboard', 'AdminUserController@showDashboard');



/* contact us email, start here */
Route::get('/admin/contact-us-emails', 'ContactEmailController@fetch');
/* contact us email, end here */



/* website about us, start here */
Route::get('/admin/about-us', 'AboutusController@fetch');

Route::post('/admin/update-about-us/update', 'AboutusController@update')->name('admin/update-about-us.update');
/* website about us, end here */


/* website contact us, start here */
Route::get('/admin/contact-us', 'ContactusController@fetch');

Route::post('/admin/update-contact-us/update', 'ContactusController@update')->name('admin/update-contact-us.update');
/* website contact us, end here */


/* blog list, start here */
Route::get('/admin/blog-lists', 'BlogController@fetch');

Route::get('/admin/blog-edit/{id}', 'BlogController@editBlog');

Route::post('/admin/update-blog/update', 'BlogController@updateBlog')->name('admin/update-blog.update');

Route::get('/admin/add-new-blog', 'BlogController@addNewBlog');

Route::post('/admin/add-new-blog/add', 'BlogController@saveNewBlog')->name('admin/add-new-blog.add');

Route::post('/admin/update-blog-status', 'BlogController@updateStatus');

Route::post('/admin/delete-blog', 'BlogController@deleteBlog');
/* blog list, end here */


/* blog categories, start here */
Route::get('/admin/manage-blog-categories', 'BlogCategoryController@fetch');

Route::get('/admin/blog-category-edit/{id}', 'BlogCategoryController@editBlogCategory');

Route::post('/admin/update-blog-category/update', 'BlogCategoryController@updateBlogCategory')->name('admin/update-blog-category.update');

Route::get('/admin/add-new-blog-category', 'BlogCategoryController@addNewBlogCategory');

Route::post('/admin/add-new-blog-category/add', 'BlogCategoryController@saveNewBlogCategory')->name('admin/add-new-blog-category.add');

Route::post('/admin/update-blog-category-status', 'BlogCategoryController@updateStatus');

Route::post('/admin/delete-blog-category', 'BlogCategoryController@deleteBlogCategory');
/* blog categories, end here */


/* blog author, start here */
Route::get('/admin/manage-blog-authors', 'AuthorController@fetch');

Route::get('/admin/blog-author-edit/{id}', 'AuthorController@editAuthor');

Route::post('/admin/update-blog-author/update', 'AuthorController@updateAuthor')->name('admin/update-blog-author.update');

Route::get('/admin/add-new-author', 'AuthorController@addNewAuthor');

Route::post('/admin/add-new-blog-author/add', 'AuthorController@saveNewAuthor')->name('admin/add-new-blog-author.add');

Route::post('/admin/update-blog-author-status', 'AuthorController@updateStatus');

Route::post('/admin/delete-blog-author', 'AuthorController@deleteAuthor');
/* blog author, end here */

Route::group(['middleware'=>['is_admin']], function(){

	/* manage role, start here */
	Route::get('/admin/manage-role', 'RoleController@fetch');

	Route::get('/admin/role-edit/{id}', 'RoleController@editRole');

	Route::post('/admin/update-role/update', 'RoleController@updateRole')->name('admin/update-role.update');

	Route::get('/admin/add-role', 'RoleController@addNewRole');

	Route::post('/admin/add-new-role/add', 'RoleController@saveNewRole')->name('admin/add-new-role.add');

	Route::post('/admin/update-role-status', 'RoleController@updateStatus');

	Route::post('/admin/delete-role', 'RoleController@deleteRole');
	/* manage role, end here */
	
	
	/* manage admin account, start here */
	//Route::get('/admin/manage-admin-account', 'AdminUserController@fetch')->middleware('is_admin');

	Route::get('/admin/manage-admin-account', 'AdminUserController@fetch');

	Route::get('/admin/admin-account-edit/{id}', 'AdminUserController@editAdminUser');

	Route::post('/admin/update-admin-account/update', 'AdminUserController@updateAdminUser')->name('admin/update-admin-account.update');

	Route::get('/admin/add-new-admin-account', 'AdminUserController@addNewAdminUser');

	Route::post('/admin/add-new-admin-account/add', 'AdminUserController@saveNewAdminUser')->name('admin/add-new-admin-account.add');

	Route::post('/admin/update-admin-account-status', 'AdminUserController@updateStatus');

	Route::post('/admin/delete-admin-account', 'AdminUserController@deleteAdminUser');
	/* manage admin account, end here */

});