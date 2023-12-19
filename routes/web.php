<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FingerDevicesControlller;
use App\Http\Controllers\LeaveApplicationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('attended/{user_id}', '\App\Http\Controllers\AttendanceController@attended' )->name('attended');
Route::get('attended-before/{user_id}', '\App\Http\Controllers\AttendanceController@attendedBefore' )->name('attendedBefore');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Auth::routes();


    Route::resource('/employees', '\App\Http\Controllers\EmployeeController');
    Route::resource('/employees', '\App\Http\Controllers\EmployeeController');
    Route::resource('/leave-types','\App\Http\Controllers\LeaveTypeController');
    Route::get('/attendance', '\App\Http\Controllers\AttendanceController@index')->name('attendance');
    Route::get('/showAttendance/{emp_id}','\App\Http\Controllers\AttendanceController@showAttendance')->name('showattendance');
    Route::get('/showAttendance/{id}', ['\App\Http\Controllers\AttendanceController@updateStatus'])->name('attendance.updateStatus');
    // Laravel 7.x and below
    Route::get('/leave-applications/create', LeaveApplicationController::class . '@create')->name('leave-applications.create');

    // Route for handling the submission of leave application form
    Route::post('/leave-applications/store', LeaveApplicationController::class . '@store')->name('leave-applications.store');
    
    // Route for displaying leave applications for a specific employee
    Route::get('/leave-applications/{emp_id}', LeaveApplicationController::class . '@indexForEmployee')->name('leave-applications.index');


    
     Route::get('/employeeList', '\App\Http\Controllers\AttendanceController@showEmployeeList')->name('employee-list');

  
    Route::get('/latetime', '\App\Http\Controllers\AttendanceController@indexLatetime')->name('indexLatetime');
    Route::get('/leave', '\App\Http\Controllers\LeaveController@index')->name('leave');
    Route::get('/overtime', '\App\Http\Controllers\LeaveController@indexOvertime')->name('indexOvertime');

    Route::get('/admin', '\App\Http\Controllers\AdminController@index')->name('admin');

    Route::resource('/schedule', '\App\Http\Controllers\ScheduleController');

    Route::get('/check', '\App\Http\Controllers\CheckController@index')->name('check');
    Route::get('/sheet-report', '\App\Http\Controllers\CheckController@sheetReport')->name('sheet-report');

    Route::post('check-store','\App\Http\Controllers\CheckController@CheckStore')->name('check_store');
    Route::get('/individual-attendance/{emp_id}', '\App\Http\Controllers\CheckController@individualAttendance')->name('individualAttendance');

  
    
   
    



Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');



    

});

// Route::get('/attendance/assign', function () {
//     return view('attendance_leave_login');
// })->name('attendance.login');

// Route::post('/attendance/assign', '\App\Http\Controllers\AttendanceController@assign')->name('attendance.assign');


// Route::get('/leave/assign', function () {
//     return view('attendance_leave_login');
// })->name('leave.login');

// Route::post('/leave/assign', '\App\Http\Controllers\LeaveController@assign')->name('leave.assign');


// Route::get('{any}', 'App\http\controllers\VeltrixController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
