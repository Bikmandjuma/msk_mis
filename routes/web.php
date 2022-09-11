<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;

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

Route::get('cool', function () {
    return view('users.citizen.Complains');
})->name('citizen_complains');

Route::get('About','App\Http\Controllers\CitizensController@HomepageAboutUs');

Route::get('Services', 'App\Http\Controllers\CitizensController@HomepageService');

Route::get('Staff', function () {
    return view('staff');
});


Route::get('ContactUs', function () {
    return view('contact');
});

//forgot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//staff member on homepage

Route::get('login','App\Http\Controllers\AuthController@GetLogin')->name('Login');
Route::post('Submit_login_data', 'App\Http\Controllers\AuthController@PostLogin')->name('LoginPost');
Route::post('logout', 'App\Http\Controllers\AuthController@Logout')->name('Logout');

//Citizen route to send his/her complains
Route::post('send-complains', 'App\Http\Controllers\CitizensController@CitizenComplains')->name('send_complains');

//Admin routing
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	Route::get('dashboard','App\Http\Controllers\AdminController@dashboard')->name('admindashboard');

	Route::get('staffrole','App\Http\Controllers\AdminController@ViewStaffRoles')->name('staffroles');
	Route::post('Addstaffrole','App\Http\Controllers\AdminController@Addstaffrolefn')->name('Addstaffrole');
	Route::get('add/staffmember','App\Http\Controllers\AdminController@FormRegisterStaffMember');
	Route::post('create/staffmember','App\Http\Controllers\RigisterTaskerController@CreateStaffMember')->name('CreateStaffMember');
	Route::get('about','App\Http\Controllers\AdminController@About')->name('servicetitle');
	Route::post('create/about','App\Http\Controllers\AdminController@CreateAbout')->name('createAbout');
	Route::get('view/about','App\Http\Controllers\AdminController@aboutdata')->name('editabout');
	Route::get('edit/about/{id}','App\Http\Controllers\AdminController@EditAbout');
	Route::post('update/about/{id}','App\Http\Controllers\AdminController@UpdateAbout')->name('updateabout');
	Route::post('homepage/service','App\Http\Controllers\AdminController@FormServices');
	Route::get('staff/members','App\Http\Controllers\AdminController@ViewStaffMembers')->name('staffmembers');

	Route::get('view/about','App\Http\Controllers\AdminController@aboutdata')->name('editabout');

	Route::get('edit/staff/members/{id}','App\Http\Controllers\AdminController@EditStaffMembers')->name('AdminEditStaffMembes');
	Route::post('update/staff/members/{id}','App\Http\Controllers\AdminController@UpdateStaffMembers')->name('AdminUpdateStaffMembes');
	Route::get('edit/es/{id}','App\Http\Controllers\AdminController@EditEs')->name('AdminEditEs');
	Route::post('update/es/{id}','App\Http\Controllers\AdminController@UpdateEs')->name('AdminUpdateEs');
	Route::get('edit/role/{id}','App\Http\Controllers\AdminController@EditRole')->name('EditRole');
	Route::post('update/role/{id}','App\Http\Controllers\AdminController@UpdateRoles')->name('UpdateRole');
	Route::get('View/Form/Servive','App\Http\Controllers\AdminController@FormService')->name('formservice');
	Route::get('View/Service','App\Http\Controllers\AdminController@ViewService')->name('ViewServices');
	Route::post('Create/Servive','App\Http\Controllers\AdminController@CreateService')->name('CreateServices');
	Route::get('delete/servive/{id}','App\Http\Controllers\AdminController@DeleteService')->name('DeleteService');
	Route::get('edit/service/{id}','App\Http\Controllers\AdminController@EditService')->name('EditService');
	Route::post('update/service/{id}','App\Http\Controllers\AdminController@UpdateServices')->name('UpdateService');
	Route::get('service/content/{id}','App\Http\Controllers\AdminController@ServiveContent')->name('ServiceContents');
	Route::post('Create/service/content/{id}','App\Http\Controllers\AdminController@CreateServiveContent')->name('createServiceContent');
	Route::get('manage/passwords','App\Http\Controllers\AdminController@ManagePassword');
	Route::post('create/passwords','App\Http\Controllers\AdminController@CreatePassword')->name('Adminchangepassword'); 
	Route::get('manage/profiles','App\Http\Controllers\AdminController@ManageProfile');
	Route::post('Create/profiles','App\Http\Controllers\AdminController@CreateProfile')->name('changeprofiles');
	Route::get('View/Info','App\Http\Controllers\AdminController@Myinformation')->name('AdminInformation');

	Route::get('edit/infos/{id}','App\Http\Controllers\AdminController@EditAdminInfo')->name('editinfos');

	Route::post('update/infos/{id}','App\Http\Controllers\AdminController@UpdateAdminInfo')->name('UpdateInfos');

	Route::get('edit/service/title/{id}','App\Http\Controllers\AdminController@EditServiceTitle')->name('EditServiceTitle');

	Route::post('update/service/title/{id}','App\Http\Controllers\AdminController@UpdateServiceTitle')->name('UpdateServiceTitle');

	Route::get('edit/service/content/{ids}/{id}','App\Http\Controllers\AdminController@EditServiceContent')->name('EditServiceContent');
	Route::post('update/service/content/{ids}/{id}','App\Http\Controllers\AdminController@UpdateServiceContent')->name('UpdateServiceContent');

});

//Es routing
Route::group(['prefix' => 'es','middleware' => 'esauth'], function () {
	Route::get('dashboard','App\Http\Controllers\EsController@dashboard')->name('esdashboard');
	Route::get('citizen/complains','App\Http\Controllers\EsController@CitizenComplains');
	Route::get('forwarding/{id}','App\Http\Controllers\EsController@forwardComplains')->name('forwardComplain');
	Route::get('solved/complains','App\Http\Controllers\EsController@SolvedComplains');
	Route::get('unsolved/complains','App\Http\Controllers\EsController@UnsolvedComplains');
	Route::get('viewstaff','App\Http\Controllers\EsController@ViewStaff');
	Route::get('information','App\Http\Controllers\EsController@Myinformation')->name('EsInformation');
	Route::get('form/document','App\Http\Controllers\EsController@formdocument');
	Route::post('create/document','App\Http\Controllers\EsController@CreateDocument')->name('createdocument');
	Route::get('view/document','App\Http\Controllers\EsController@ViewDocument');
	Route::get('manage/password','App\Http\Controllers\EsController@ManagePassword');
	Route::get('manage/profile','App\Http\Controllers\EsController@ManageProfile');
	Route::post('create/password','App\Http\Controllers\EsController@CreatePassword')->name('changepassword');
	Route::post('create/profile','App\Http\Controllers\EsController@CreateProfile')->name('changeprofile');
	Route::get('edit/info/{id}','App\Http\Controllers\EsController@EditEsInfo')->name('editinfo');
	Route::post('update/info/{id}','App\Http\Controllers\EsController@UpdateInfo')->name('UpdateInfo');
	Route::get('view/complains/{id}','App\Http\Controllers\EsController@EsViewComplains')->name('esViewComplains');
});

//Tasker routing
Route::group(['prefix' => 'tasker','middleware' => 'taskerauth'], function () {
	Route::get('dashboard','App\Http\Controllers\TaskerController@dashboard')->name('taskerdashboard');
	Route::get('myinformation','App\Http\Controllers\TaskerController@myinfo')->name('taskerinfo');
	Route::get('citizen/complain','App\Http\Controllers\TaskerController@CitizenComplain');
	Route::get('pending/complains','App\Http\Controllers\TaskerController@PendingComplain')->name('unsolved');
	Route::get('solved/complains','App\Http\Controllers\TaskerController@SolvedComplain')->name('SolveCompl');
	Route::get('form/Files','App\Http\Controllers\TaskerController@formFile');
	Route::post('create/Files','App\Http\Controllers\TaskerController@CreateFile')->name('createfile');
	Route::get('view/files','App\Http\Controllers\TaskerController@ViewDocument');
	Route::post('create/profile/picture','App\Http\Controllers\TaskerController@CreateProfile')->name('changeprofilepicture');
	Route::get('manage/profile/picture','App\Http\Controllers\TaskerController@ManageProfiles');
	Route::get('form/password','App\Http\Controllers\TaskerController@ManagePassword');

	Route::post('change/password','App\Http\Controllers\TaskerController@CreatePassword')->name('changepasswords');
	Route::get('view/single/complain/{id}','App\Http\Controllers\TaskerController@SingleComplains')->name('viewsingleComplains');
	Route::get('Care/complain/{id}','App\Http\Controllers\TaskerController@CareOnComplains')->name('CareComplains');
	Route::get('view/single/pending/{id}','App\Http\Controllers\TaskerController@PendingComplains')->name('PendingComplains');
	Route::get('Solving/Complain/{id}','App\Http\Controllers\TaskerController@SolvingComplains')->name('SolveComplains');

});
