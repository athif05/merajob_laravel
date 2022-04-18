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

Route::get('/choose-one', function () {
	return view('choose-one');
});

/*Route::get('/jobs', function () {
return view('job');
});*/
Route::get('/jobs', 'AllJobController@show_jobs');

Route::get('/jobs/search', 'AllJobController@show_jobs_search')->name('jobs.search');

Route::post('delete-job-by-employer', 'AllJobController@delete_job');

Route::post('update-job-status-by-employer', 'AllJobController@update_job_status');

Route::post('apply-job-by-candidate', 'AllJobController@apply_job_candidate');

/*Route::get('/employers-details', function () {
return view('employers-details');
});*/
Route::get('/employers-details/{id}', 'EmployerDetailController@show');

Route::get('/employer-edit/{id}', 'EmployerDetailController@edit');

Route::post('employer-details/update', 'EmployerDetailController@update')->name('employer-details.update');

Route::get('/employers-jobs-list/{id}', 'EmployerDetailController@show_all_jobs');

Route::get('/post-new-job/{id}', 'AllJobController@show');

Route::post('create-job/create', 'AllJobController@create')->name('create-job.create');

/*Route::get('/job-details/{empr_id}/{id}', function () {
return view('job-details');
});*/

Route::get('/job-details/{empr_id}/{id}', 'AllJobController@show_job_Details');

Route::get('/edit-post-job/{empr_id}/{id}', 'AllJobController@edit_job');

Route::post('update-job/update', 'AllJobController@update')->name('update-job.update');

Route::get('/blog', function () {
	return view('blog');
});

Route::get('/blog-details', function () {
	return view('blog-details');
});

Route::get('/about-us', 'AboutusController@index');

Route::get('/contact-us', 'ContactusController@index');

Route::get('/login', function () {
	return view('login');
});

Route::get('/logout', 'UserController@logout');

Route::get('/account-verification/{id}/{code}', 'UserController@verification_account');

Route::get('/registration', function () {
	return view('registration');
});

Route::get('/candidate-jobs-list/{id}', 'CandidateController@show_all_jobs_list');

Route::post('delete-job-by-candiate-list', 'CandidateController@delete_job');

Route::post('registration/store', 'UserController@store')->name('registration.store');

Route::post('registration/store_employer', 'UserController@store_employer')->name('registration.store_employer');

Route::post('login/index', 'UserController@index')->name('login.index');

/*Route::get('/employment', function () {
return view('employee');
});*/

Route::get('/employment', 'HomePageController@show');

Route::get('/candidate-details/{id}', 'CandidateController@show');

/*Route::get('/candidate-details/{id}', function () {
return view('candidate-details');
});*/

Route::get('/company-details', function () {
	return view('company-details');
});

Route::post('get-cities-by-state', 'StateCityController@getCity');

Route::get('/candidate-edit/{id}', 'CandidateController@edit');

Route::post('candidate-details/update', 'CandidateController@update')->name('candidate-details.update');

Route::post('contact/touch', 'ContactEmailController@store')->name('contact.touch');

/*Route::get('/employee-profile', function () {
return view('employee-profile');
});*/



/******************** Admin Panel routes start here *********/
Route::get('/admin', function(){
	return view('admin/index');
});

Route::post('/login/admin', 'AdminUserController@login')->name('login.admin');

Route::get('/admin/logout', 'AdminUserController@logout');

Route::get('/admin/dashboard', 'AllJobController@showDashboard');

Route::get('/admin/all-applied-jobs', 'AllJobController@showAllAppliedJobs');

Route::get('/admin/all-job-lists', 'AllJobController@showAllJobs');

Route::get('/admin/job-details/{empr_id}/{job_id}', 'AllJobController@showSingleJobAdmin');

Route::post('/admin/update-applied-job-status-admin', 'AllJobController@updateAppliedJobStatus');

Route::get('/admin/employes-list', 'CandidateController@showAllCandidateAdmin');

Route::post('/admin/update-candidate-status', 'CandidateController@updateCandidateStatus');

Route::post('/admin/delete-candidate', 'CandidateController@deleteCandidate');

Route::get('/admin/single-candidate-details/{cand_id}', 'CandidateController@showSingleCandidateAdmin');

Route::get('/admin/manage-qualifications', 'QualificationController@fetchQualification');

Route::post('/admin/delete-qualification', 'QualificationController@deleteQualification');

Route::post('/admin/update-qualification-status', 'QualificationController@updateQualificationStatus');

Route::get('/admin/qualification-edit/{id}', 'QualificationController@editQualification');

Route::post('/admin/update-qualification/update', 'QualificationController@updateQualification')->name('admin/update-qualification.update');

Route::get('/admin/add-new-qualification', 'QualificationController@addNewQualification');

Route::post('/admin/add-new-qualification/add', 'QualificationController@saveNewQualification')->name('admin/add-new-qualification.add');

Route::get('/admin/employers-list', 'EmployerDetailController@fetchEmployerDetail');

Route::post('/admin/delete-employers-admin', 'EmployerDetailController@deleteEmployerDetailAdmin');

Route::post('/admin/update-employers-status-admin', 'EmployerDetailController@updateEmployerDetailStatusAdmin');

Route::get('/admin/single-employers-details/{cand_id}', 'EmployerDetailController@showEmployerDetailAdmin');



Route::get('/admin/manage-company-domains', 'CompanyDomainController@fetchCompanyDomains');

Route::post('/admin/delete-company-domain', 'CompanyDomainController@deleteCompanyDomains');

Route::post('/admin/update-company-domain-status', 'CompanyDomainController@updateCompanyDomainsStatus');

Route::get('/admin/company-domain-edit/{id}', 'CompanyDomainController@editCompanyDomain');

Route::post('/admin/update-company-domain/update', 'CompanyDomainController@updateCompanyDomain')->name('admin/update-company-domain.update');

Route::get('/admin/add-new-company-domain', 'CompanyDomainController@addNewCompanyDomain');

Route::post('/admin/add-new-company-domain/add', 'CompanyDomainController@saveNewCompanyDomain')->name('admin/add-new-company-domain.add');


Route::get('/admin/states', 'StateCityController@fetchStates');

Route::get('/admin/add-new-state', 'StateCityController@addNewState');

Route::post('/admin/add-new-state/add', 'StateCityController@saveNewState')->name('admin/add-new-state.add');

Route::get('/admin/state-edit/{id}', 'StateCityController@editState');

Route::post('/admin/update-state/update', 'StateCityController@updateState')->name('admin/update-state.update');

Route::post('/admin/delete-state', 'StateCityController@deleteState');

Route::post('/admin/update-state-status', 'StateCityController@updateStateStatus');

Route::get('/admin/cities', 'StateCityController@fetchCities');

Route::get('/admin/add-new-city', 'StateCityController@addNewCity');

Route::post('/admin/add-new-city/add', 'StateCityController@saveNewCity')->name('admin/add-new-city.add');

Route::get('/admin/city-edit/{id}', 'StateCityController@editCity');

Route::post('/admin/update-city/update', 'StateCityController@updateCity')->name('admin/update-city.update');

Route::post('/admin/delete-city', 'StateCityController@deleteCity');

Route::post('/admin/update-city-status', 'StateCityController@updateCityStatus');

/* main job domains, start here */
Route::get('/admin/manage-job-domains', 'MainJobCategoryController@fetch');

Route::get('/admin/main-job-domain-edit/{id}', 'MainJobCategoryController@editDomain');

Route::post('/admin/update-main-job-domain/update', 'MainJobCategoryController@updateDomain')->name('admin/update-main-job-domain.update');

Route::get('/admin/add-new-main-job-domain', 'MainJobCategoryController@addNewDomain');

Route::post('/admin/add-new-main-job-domain/add', 'MainJobCategoryController@saveNewDomain')->name('admin/add-new-main-job-domain.add');

Route::post('/admin/update-main-job-domain-status', 'MainJobCategoryController@updateStatus');

Route::post('/admin/delete-main-job-domain', 'MainJobCategoryController@deleteDomain');
/* main job domains, end here */


/* job category, start here */
Route::get('/admin/manage-job-categories', 'JobCategoriesController@fetch');

Route::get('/admin/job-category-edit/{id}', 'JobCategoriesController@editCategory');

Route::post('/admin/update-job-category/update', 'JobCategoriesController@updateCategory')->name('admin/update-job-category.update');

Route::get('/admin/add-new-job-categories', 'JobCategoriesController@addNewCategory');

Route::post('/admin/add-new-job-category/add', 'JobCategoriesController@saveNewCategory')->name('admin/add-new-job-category.add');

Route::post('/admin/update-job-categorie-status', 'JobCategoriesController@updateStatus');

Route::post('/admin/delete-job-category', 'JobCategoriesController@deleteJobCategory');
/* job category, end here */



/* notice periods, start here */
Route::get('/admin/manage-notice-periods', 'NoticePeriodController@fetch');

Route::get('/admin/notice-period-edit/{id}', 'NoticePeriodController@editNoticePeriod');

Route::post('/admin/update-notice-period/update', 'NoticePeriodController@updateNoticePeriod')->name('admin/update-notice-period.update');

Route::get('/admin/add-new-notice-period', 'NoticePeriodController@addNewNoticePeriod');

Route::post('/admin/add-new-notice-period/add', 'NoticePeriodController@saveNewNoticePeriod')->name('admin/add-new-notice-period.add');

Route::post('/admin/update-notice-period-status', 'NoticePeriodController@updateStatus');

Route::post('/admin/delete-notice-period', 'NoticePeriodController@deleteNoticePeriod');
/* notice periods, end here */



/* fees charges, start here */
Route::get('/admin/manage-fee-charge-reasons', 'FeeChargedReasonController@fetch');

Route::get('/admin/fee-charge-reason-edit/{id}', 'FeeChargedReasonController@editFeeChargeReason');

Route::post('/admin/update-fee-charge-reason/update', 'FeeChargedReasonController@updateFeeChargeReason')->name('admin/update-fee-charge-reason.update');

Route::get('/admin/add-new-fee-charge-reason', 'FeeChargedReasonController@addNewFeeChargeReason');

Route::post('/admin/add-new-fee-charge-reason/add', 'FeeChargedReasonController@saveNewFeeChargeReason')->name('admin/add-new-fee-charge-reason.add');

Route::post('/admin/update-fee-charge-reason-status', 'FeeChargedReasonController@updateStatus');

Route::post('/admin/delete-fee-charge-reason', 'FeeChargedReasonController@deleteFeeChargeReason');
/* fees charges, end here */



/* working days, start here */
Route::get('/admin/manage-working-days', 'WorkingDayController@fetch');

Route::get('/admin/working-day-edit/{id}', 'WorkingDayController@editWorkingDay');

Route::post('/admin/update-working-day/update', 'WorkingDayController@updateWorkingDay')->name('admin/update-working-day.update');

Route::get('/admin/add-new-working-day', 'WorkingDayController@addNewWorkingDay');

Route::post('/admin/add-new-working-day/add', 'WorkingDayController@saveNewWorkingDay')->name('admin/add-new-working-day.add');

Route::post('/admin/update-working-day-status', 'WorkingDayController@updateStatus');

Route::post('/admin/delete-working-day', 'WorkingDayController@deleteWorkingDay');
/* working days, end here */



/* working experiance, start here */
Route::get('/admin/manage-work-experiance', 'WorkExperienceController@fetch');

Route::get('/admin/work-experiance-edit/{id}', 'WorkExperienceController@editWorkingExperiance');

Route::post('/admin/update-work-experiance/update', 'WorkExperienceController@updateWorkingExperiance')->name('admin/update-work-experiance.update');

Route::get('/admin/add-new-work-experiance', 'WorkExperienceController@addNewWorkingExperiance');

Route::post('/admin/add-new-work-experiance/add', 'WorkExperienceController@saveNewWorkingExperiance')->name('admin/add-new-work-experiance.add');

Route::post('/admin/update-work-experiance-status', 'WorkExperienceController@updateStatus');

Route::post('/admin/delete-work-experiance', 'WorkExperienceController@deleteWorkingExperiance');
/* working experiance, end here */


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
Route::get('/admin/manage-admin-account', 'AdminUserController@fetch');

Route::get('/admin/admin-account-edit/{id}', 'AdminUserController@editAdminUser');

Route::post('/admin/update-admin-account/update', 'AdminUserController@updateAdminUser')->name('admin/update-admin-account.update');

Route::get('/admin/add-new-admin-account', 'AdminUserController@addNewAdminUser');

Route::post('/admin/add-new-admin-account/add', 'AdminUserController@saveNewAdminUser')->name('admin/add-new-admin-account.add');

Route::post('/admin/update-admin-account-status', 'AdminUserController@updateStatus');

Route::post('/admin/delete-admin-account', 'AdminUserController@deleteAdminUser');
/* manage admin account, end here */