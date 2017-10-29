<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');


	/* ================== Frontend_posts ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_posts', 'LA\Frontend_postsController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_post_dt_ajax', 'LA\Frontend_postsController@dtajax');

	/* ================== Frontend_users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_users', 'LA\Frontend_usersController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_user_dt_ajax', 'LA\Frontend_usersController@dtajax');

	/* ================== Frontend_menu_items ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_menu_items', 'LA\Frontend_menu_itemsController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_menu_item_dt_ajax', 'LA\Frontend_menu_itemsController@dtajax');

	/* ================== Frontend_menu_pos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_menu_pos', 'LA\Frontend_menu_posController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_menu_po_dt_ajax', 'LA\Frontend_menu_posController@dtajax');

	/* ================== Frontend_post_types ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_post_types', 'LA\Frontend_post_typesController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_post_type_dt_ajax', 'LA\Frontend_post_typesController@dtajax');

	/* ================== Frontend_enrolls ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_enrolls', 'LA\Frontend_enrollsController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_enroll_dt_ajax', 'LA\Frontend_enrollsController@dtajax');


	/* ================== Frontend_tools ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_tools', 'LA\Frontend_toolsController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_tool_dt_ajax', 'LA\Frontend_toolsController@dtajax');

	/* ================== Frontend_orders ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_orders', 'LA\Frontend_ordersController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_order_dt_ajax', 'LA\Frontend_ordersController@dtajax');

	/* ================== Frontend_grouporders ================== */
	Route::resource(config('laraadmin.adminRoute') . '/frontend_grouporders', 'LA\Frontend_groupordersController');
	Route::get(config('laraadmin.adminRoute') . '/frontend_grouporder_dt_ajax', 'LA\Frontend_groupordersController@dtajax');

	/* ================== FE_Type_Services ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_type_services', 'LA\FE_Type_ServicesController');
	Route::get(config('laraadmin.adminRoute') . '/fe_type_service_dt_ajax', 'LA\FE_Type_ServicesController@dtajax');

	/* ================== FE_Services ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_services', 'LA\FE_ServicesController');
	Route::get(config('laraadmin.adminRoute') . '/fe_service_dt_ajax', 'LA\FE_ServicesController@dtajax');

	/* ================== FE_Type_Machines ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_type_machines', 'LA\FE_Type_MachinesController');
	Route::get(config('laraadmin.adminRoute') . '/fe_type_machine_dt_ajax', 'LA\FE_Type_MachinesController@dtajax');

	/* ================== FE_Type_Locations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_type_locations', 'LA\FE_Type_LocationsController');
	Route::get(config('laraadmin.adminRoute') . '/fe_type_location_dt_ajax', 'LA\FE_Type_LocationsController@dtajax');

	/* ================== Fe_discounts ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_discounts', 'LA\Fe_discountsController');
	Route::get(config('laraadmin.adminRoute') . '/fe_discount_dt_ajax', 'LA\Fe_discountsController@dtajax');

	/* ================== FE_Status_Orders ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_status_orders', 'LA\FE_Status_OrdersController');
	Route::get(config('laraadmin.adminRoute') . '/fe_status_order_dt_ajax', 'LA\FE_Status_OrdersController@dtajax');

	/* ================== FE_Sub_Services ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_sub_services', 'LA\FE_Sub_ServicesController');
	Route::get(config('laraadmin.adminRoute') . '/fe_sub_service_dt_ajax', 'LA\FE_Sub_ServicesController@dtajax');

	/* ================== FE_Service_Tools ================== */
	Route::resource(config('laraadmin.adminRoute') . '/fe_service_tools', 'LA\FE_Service_ToolsController');
	Route::get(config('laraadmin.adminRoute') . '/fe_service_tool_dt_ajax', 'LA\FE_Service_ToolsController@dtajax');
});
