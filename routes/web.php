<?php

use App\Department;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

    return view('auth.login');
});
Route::middleware('auth')->group(function()
{



Route::get('home', function () {

    $boolean = false;
    return view('home',['boolean' => $boolean]);
});
Route::view('/progress', 'progress');
Route::group(['middleware' => ['role:admin']], function () {
Route::view('/designation', 'designation');
Route::view('/department', 'department');
Route::view('/salary', 'salary_grade');
Route::view('/rolesAndPermission', 'rolesAndPermission',['roles' => Role::all()]);
Route::post('role','adminController@newRole');
Route::post('designation', 'adminController@createDesignation');
Route::post('department', 'adminController@createDepartment');
Route::post('salary', 'adminController@newsalaryGrade');
});

Route::group(['middleware' => ['role:accountingOfficer|bursar']], function () {

Route::get('/accept/{id}/{icode}','AccountingOfficerController@accept');
Route::get('/accept/{icode}','BursarController@accept');
Route::get('/decline/{icode}','BursarController@decline');
Route::get('/decline/{id}/{icode}','AccountingOfficerController@decline');
Route::get('/acceptretirement/{rcode}','AccountingOfficerController@retirementAccept');
Route::get('/declineretirement/{rcode}','AccountingOfficerController@retirementDecline');
});

Route::resource('imprest','ImprestController');
Route::resource('retirement', 'RetirementController');
Route::get('/uirrm','ImprestController@history');
}
);

Auth::routes();



