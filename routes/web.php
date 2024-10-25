<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::middleware(['auth:users'])->group(function(){
    Route::get('/admin-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin-dashboard/employees', App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('/admin-dashboard/clients', App\Http\Controllers\Admin\ClientController::class);
    Route::resource('/admin-dashboard/projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('/admin-dashboard/teams', App\Http\Controllers\Admin\TeamController::class);
    Route::resource('/admin-dashboard/team-members', App\Http\Controllers\Admin\TeamMemberController::class);
    Route::delete('/admin-dasboard/team-members/{team_id}/{employee_id}', [App\Http\Controllers\Admin\TeamMemberController::class, 'destroy'])->name('team-members.destroy');

    // Route::resource('/admin-dashboard/project-team', App\Http\Controllers\Admin\ProjectTeamController::class);
});

//employee
Route::middleware(['auth:employees'])->group(function(){
    Route::get('/employee-dashboard', [App\Http\Controllers\employee\EmployeeController::class, 'index'])->name('employee.dashboard');
    //project
    Route::get('/employee-dashboard/project', [App\Http\Controllers\employee\EmployeeController::class, 'project'])->name('employee.project');
    Route::put('/employee-dashboard/project/{id}/update-status-ongoing', [App\Http\Controllers\employee\EmployeeController::class, 'updateStatusOngoing'])->name('project.updateStatusOngoing');
    Route::put('/employee-dashboard/project/{id}/update-status-completed', [App\Http\Controllers\employee\EmployeeController::class, 'updateStatusCompleted'])->name('project.updateStatusCompleted');
    //team
    Route::get('/employee-dashboard/team', [App\Http\Controllers\employee\EmployeeController::class, 'team'])->name('employee.teams');


    //notification
    Route::get('/notifications', [App\Http\Controllers\admin\ProjectNotificationController::class, 'index'])->name('notifications.index');
    Route::delete('/notifications/{id}', [App\Http\Controllers\admin\ProjectNotificationController::class, 'destroy'])->name('notifications.destroy');
    Route::get('/notifications/{id}', [App\Http\Controllers\admin\ProjectNotificationController::class, 'show'])->name('notifications.show');

});


//client
    Route::get('/client-dashboard', [App\Http\Controllers\client\ClientController::class, 'index'])->name('client.dashboard');
    //project
    Route::post('/client-dashboard', [App\Http\Controllers\client\ClientController::class, 'project'])->name('client.project');

