<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/

Route::get('/', 'DashboardController@index')->name('home');

// Select All Routes.
Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
Route::delete('restore', 'DeleteController@restore')->name('restore.selected');

// Select All Routes.
Route::get('export', 'ExcelController@export')->name('excel.export');
Route::post('import', 'ExcelController@import')->name('excel.import');

// Customers Routes.
Route::get('trashed/customers', 'CustomerController@trashed')->name('customers.trashed');
Route::get('trashed/customers/{trashed_customer}', 'CustomerController@showTrashed')->name('customers.trashed.show');
Route::post('customers/{trashed_customer}/restore', 'CustomerController@restore')->name('customers.restore');
Route::delete('customers/{trashed_customer}/forceDelete', 'CustomerController@forceDelete')->name('customers.forceDelete');
Route::resource('customers', 'CustomerController');
Route::get('status/customers/{customer}', 'CustomerController@status')->name('customers.status');

// managers Routes
Route::get('trashed/managers', 'ManagerController@trashed')->name('managers.trashed');
Route::get('trashed/managers/{trashed_manager}', 'ManagerController@showTrashed')->name('managers.trashed.show');
Route::post('managers/{trashed_manager}/restore', 'ManagerController@restore')->name('managers.restore');
Route::delete('managers/{trashed_manager}/forceDelete', 'ManagerController@forceDelete')->name('managers.forceDelete');
Route::resource('managers', 'ManagerController');
Route::get('status/managers/{manager}', 'ManagerController@status')->name('managers.status');

// Assistants Routes.
Route::get('trashed/assistants', 'AssistantController@trashed')->name('assistants.trashed');
Route::get('trashed/assistants/{trashed_assistant}', 'AssistantController@showTrashed')->name('assistants.trashed.show');
Route::post('assistants/{trashed_assistant}/restore', 'AssistantController@restore')->name('assistants.restore');
Route::delete('assistants/{trashed_assistant}/forceDelete', 'AssistantController@forceDelete')->name('assistants.forceDelete');
Route::resource('assistants', 'AssistantController');
Route::get('status/assistants/{assistant}', 'AssistantController@status')->name('assistants.status');

// Supervisors Routes.
Route::get('trashed/supervisors', 'SupervisorController@trashed')->name('supervisors.trashed');
Route::get('trashed/supervisors/{trashed_supervisor}', 'SupervisorController@show')->name('supervisors.trashed.show');
Route::post('supervisors/{trashed_supervisor}/restore', 'SupervisorController@restore')->name('supervisors.restore');
Route::delete('supervisors/{trashed_supervisor}/forceDelete', 'SupervisorController@forceDelete')->name('supervisors.forceDelete');
Route::resource('supervisors', 'SupervisorController');
Route::get('status/supervisors/{supervisor}', 'SupervisorController@status')->name('supervisors.status');

// Admins Routes.
Route::get('trashed/admins', 'AdminController@trashed')->name('admins.trashed');
Route::get('trashed/admins/{trashed_admin}', 'AdminController@show')->name('admins.trashed.show');
Route::post('admins/{trashed_admin}/restore', 'AdminController@restore')->name('admins.restore');
Route::delete('admins/{trashed_admin}/forceDelete', 'AdminController@forceDelete')->name('admins.forceDelete');
Route::resource('admins', 'AdminController');

// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Feedback Routes.
Route::patch('feedback/read', 'FeedbackController@read')->name('feedback.read');
Route::patch('feedback/unread', 'FeedbackController@unread')->name('feedback.unread');
Route::resource('feedback', 'FeedbackController')->only('index', 'show', 'destroy');


// notifications
Route::resource('notifications', 'NotificationController');

Route::get('trashed/roles', 'RoleController@trashed')->name('roles.trashed');
Route::get('trashed/roles/{trashed_role}', 'RoleController@showTrashed')->name('roles.trashed.show');
Route::post('roles/{trashed_role}/restore', 'RoleController@restore')->name('roles.restore');
Route::delete('roles/{trashed_role}/forceDelete', 'RoleController@forceDelete')->name('roles.forceDelete');
Route::resource('roles', 'RoleController');
// Countries
Route::resource('countries', 'CountryController');
Route::get('status/countries/{country}', 'CountryController@status')->name('countries.status');
Route::resource('countries.cities', 'CityController')->except('create');
Route::resource('cities.areas', 'AreaController')->except('create', 'show');
// pages
Route::resource('pages', 'PageController');

Route::get('trashed/providers', 'ProviderController@trashed')->name('providers.trashed');
Route::get('trashed/providers/{trashed_provider}', 'ProviderController@showTrashed')->name('providers.trashed.show');
Route::post('providers/{trashed_provider}/restore', 'ProviderController@restore')->name('providers.restore');
Route::delete('providers/{trashed_provider}/forceDelete', 'ProviderController@forceDelete')->name('providers.forceDelete');
Route::resource('providers', 'ProviderController');
Route::get('status/providers/{provider}', 'ProviderController@status')->name('providers.status');

        Route::get('trashed/profiles', 'ProfileController@trashed')->name('profiles.trashed');
        Route::get('trashed/profiles/{trashed_profile}', 'ProfileController@showTrashed')->name('profiles.trashed.show');
        Route::post('profiles/{trashed_profile}/restore', 'ProfileController@restore')->name('profiles.restore');
        Route::delete('profiles/{trashed_profile}/forceDelete', 'ProfileController@forceDelete')->name('profiles.forceDelete');
        Route::resource('profiles', 'ProfileController');

        Route::get('trashed/martials', 'MartialController@trashed')->name('martials.trashed');
        Route::get('trashed/martials/{trashed_martial}', 'MartialController@showTrashed')->name('martials.trashed.show');
        Route::post('martials/{trashed_martial}/restore', 'MartialController@restore')->name('martials.restore');
        Route::delete('martials/{trashed_martial}/forceDelete', 'MartialController@forceDelete')->name('martials.forceDelete');
        Route::resource('martials', 'MartialController');

        Route::get('trashed/education', 'EducationController@trashed')->name('education.trashed');
        Route::get('trashed/education/{trashed_education}', 'EducationController@showTrashed')->name('education.trashed.show');
        Route::post('education/{trashed_education}/restore', 'EducationController@restore')->name('education.restore');
        Route::delete('education/{trashed_education}/forceDelete', 'EducationController@forceDelete')->name('education.forceDelete');
        Route::resource('education', 'EducationController');

        Route::get('trashed/job_types', 'JobTypeController@trashed')->name('job_types.trashed');
        Route::get('trashed/job_types/{trashed_job_type}', 'JobTypeController@showTrashed')->name('job_types.trashed.show');
        Route::post('job_types/{trashed_job_type}/restore', 'JobTypeController@restore')->name('job_types.restore');
        Route::delete('job_types/{trashed_job_type}/forceDelete', 'JobTypeController@forceDelete')->name('job_types.forceDelete');
        Route::resource('job_types', 'JobTypeController');

        Route::get('trashed/job_fields', 'JobFieldController@trashed')->name('job_fields.trashed');
        Route::get('trashed/job_fields/{trashed_job_field}', 'JobFieldController@showTrashed')->name('job_fields.trashed.show');
        Route::post('job_fields/{trashed_job_field}/restore', 'JobFieldController@restore')->name('job_fields.restore');
        Route::delete('job_fields/{trashed_job_field}/forceDelete', 'JobFieldController@forceDelete')->name('job_fields.forceDelete');
        Route::resource('job_fields', 'JobFieldController');

        Route::get('trashed/skills', 'SkillController@trashed')->name('skills.trashed');
        Route::get('trashed/skills/{trashed_skill}', 'SkillController@showTrashed')->name('skills.trashed.show');
        Route::post('skills/{trashed_skill}/restore', 'SkillController@restore')->name('skills.restore');
        Route::delete('skills/{trashed_skill}/forceDelete', 'SkillController@forceDelete')->name('skills.forceDelete');
        Route::resource('skills', 'SkillController');

        Route::get('trashed/employers', 'EmployerController@trashed')->name('employers.trashed');
        Route::get('trashed/employers/{trashed_employer}', 'EmployerController@showTrashed')->name('employers.trashed.show');
        Route::post('employers/{trashed_employer}/restore', 'EmployerController@restore')->name('employers.restore');
        Route::delete('employers/{trashed_employer}/forceDelete', 'EmployerController@forceDelete')->name('employers.forceDelete');
        Route::resource('employers', 'EmployerController');

        Route::get('trashed/supporters', 'SupporterController@trashed')->name('supporters.trashed');
        Route::get('trashed/supporters/{trashed_supporter}', 'SupporterController@showTrashed')->name('supporters.trashed.show');
        Route::post('supporters/{trashed_supporter}/restore', 'SupporterController@restore')->name('supporters.restore');
        Route::delete('supporters/{trashed_supporter}/forceDelete', 'SupporterController@forceDelete')->name('supporters.forceDelete');
        Route::resource('supporters', 'SupporterController');

        Route::get('trashed/training_types', 'TrainingTypeController@trashed')->name('training_types.trashed');
        Route::get('trashed/training_types/{trashed_training_type}', 'TrainingTypeController@showTrashed')->name('training_types.trashed.show');
        Route::post('training_types/{trashed_training_type}/restore', 'TrainingTypeController@restore')->name('training_types.restore');
        Route::delete('training_types/{trashed_training_type}/forceDelete', 'TrainingTypeController@forceDelete')->name('training_types.forceDelete');
        Route::resource('training_types', 'TrainingTypeController');
/*  The routes of generated crud will set here: Don't remove this line  */
        
        
        
        
        
        
