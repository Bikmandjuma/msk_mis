<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('About', function () {
    return view('about');
});

Route::get('Services', function () {
    return view('service');
});

Route::get('Staff', function () {
    return view('staff');
});


Route::get('ContactUs', function () {
    return view('contact');
});


//staff member on homepage

Route::get('login','App\Http\Controllers\AuthController@GetLogin')->name('Login');
Route::post('Submit_login_data', 'App\Http\Controllers\AuthController@PostLogin')->name('LoginPost');
Route::post('logout', 'App\Http\Controllers\AuthController@Logout')->name('Logout');

//Citizen route to send his/her complains
Route::post('send-complains', 'App\Http\Controllers\CitizensController@CitizenComplains')->name('send_complains');

//Admin routing
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	Route::get('dashboard','App\Http\Controllers\AdminController@dashboard')->name('admindashboard');

	Route::get('staffrole','App\Http\Controllers\AdminController@ViewStaffRoles');

	Route::post('Addstaffrole','App\Http\Controllers\AdminController@Addstaffrolefn')->name('Addstaffrole');
	Route::get('add/staffmember','App\Http\Controllers\AdminController@FormRegisterStaffMember');
	Route::post('create/staffmember','App\Http\Controllers\RigisterTaskerController@CreateStaffMember')->name('CreateStaffMember');

});

//Es routing
Route::group(['prefix' => 'es','middleware' => 'esauth'], function () {
	Route::get('dashboard','App\Http\Controllers\EsController@dashboard')->name('esdashboard');
	Route::get('citizen/complains','App\Http\Controllers\EsController@CitizenComplains');
	Route::get('forwarding/{id}','App\Http\Controllers\EsController@forwardComplains');
	Route::get('solved/complains','App\Http\Controllers\EsController@SolvedComplains');
	Route::get('unsolved/complains','App\Http\Controllers\EsController@UnsolvedComplains');
	Route::get('viewstaff','App\Http\Controllers\EsController@ViewStaff');
	Route::get('information','App\Http\Controllers\EsController@Myinformation');
	Route::get('form/document','App\Http\Controllers\EsController@formdocument');
	Route::post('create/document','App\Http\Controllers\EsController@CreateDocument')->name('createdocument');
	Route::get('view/document','App\Http\Controllers\EsController@ViewDocument');
	Route::get('manage/password','App\Http\Controllers\EsController@ManagePassword');
	Route::get('manage/profile','App\Http\Controllers\EsController@ManageProfile');
	Route::post('create/password','App\Http\Controllers\EsController@CreatePassword')->name('changepassword');
	Route::post('create/profile','App\Http\Controllers\EsController@CreateProfile')->name('changeprofile');
});

//Tasker routing
Route::group(['prefix' => 'tasker','middleware' => 'taskerauth'], function () {
	Route::get('dashboard','App\Http\Controllers\TaskerController@dashboard')->name('taskerdashboard');
	Route::get('myinformation','App\Http\Controllers\TaskerController@myinfo')->name('taskerinfo');
	Route::get('citizen/complain','App\Http\Controllers\TaskerController@CitizenComplain');
	Route::get('pending/complains','App\Http\Controllers\TaskerController@PendingComplain');
	Route::get('solved/complains','App\Http\Controllers\TaskerController@SolvedComplain');
	Route::get('form/Files','App\Http\Controllers\TaskerController@formFile');
	Route::post('create/Files','App\Http\Controllers\TaskerController@CreateFile')->name('createfile');
	Route::get('view/files','App\Http\Controllers\TaskerController@ViewDocument');
	Route::post('create/profile/picture','App\Http\Controllers\TaskerController@CreateProfile')->name('changeprofilepicture');
	Route::get('manage/profile/picture','App\Http\Controllers\TaskerController@ManageProfiles');
	Route::get('form/password','App\Http\Controllers\TaskerController@ManagePassword');

	Route::post('change/password','App\Http\Controllers\TaskerController@CreatePassword')->name('changepasswords');

});
