<?php

use App\Http\Controllers\auth\AuthController as AuthAuthController;
use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('store_register');
Route::post('login', [AuthController::class, 'login'])->name('store_login');

Route::middleware(['auth'])->group(function () {

  // dashboard route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  // students routes
Route::get('/students', [DashboardController::class, 'fetchStudents'])->name('students-list');
Route::get('/teachers', [DashboardController::class, 'fetchTeachers'])->name('teachers-list');
Route::get('/affectation', [DashboardController::class, 'affectations'])->name('affectations');
Route::get('/students/addNewStudent', [DashboardController::class, 'createStudent'])->name('add-student');
Route::post('/students/addNewStudent', [DashboardController::class, 'storeStudent'])->name('store-student');
Route::get('/students/{id}', [DashboardController::class, 'showStudent'])->name('show-student');
Route::get('/students/edit/{id}', [DashboardController::class, 'editStudent'])->name('edit-student');
Route::put('/students/edit/{id}', [DashboardController::class, 'updateStudent'])->name('update-student');


  // Teachers Routes
Route::get('/teachers/addNewTeacher', [DashboardController::class, 'createTeacher'])->name('add-teacher');
Route::post('/teachers/addNewTeacher', [DashboardController::class, 'storeTeacher'])->name('store-teacher');
Route::get('/teachers/{id}', [DashboardController::class, 'showTeacher'])->name('show-teacher');
Route::get('/teachers/edit/{id}', [DashboardController::class, 'editTeacher'])->name('edit-teacher');
Route::put('/teachers/edit/{id}', [DashboardController::class, 'updateTeacher'])->name('update-teacher');
Route::delete('teachers/delete/{id}',[DashboardController::class, 'destroyTeacher'])->name('destroy-teacher');
Route::delete('students/delete/{id}',[DashboardController::class, 'destroyStudent'])->name('destroy-student');
Route::post('affectations/assign', [DashboardController::class, 'assignTeacher'])->name('assign-teacher');


  // modules routes
Route::get('/modules',[DashboardController::class, 'fetchModules'])->name('modules-list');
Route::get('/modules/addNewModule', [DashboardController::class, 'createModule'])->name('add-module');
Route::post('/modules/addNewModule', [DashboardController::class, 'storeModule'])->name('store-module');
Route::get('/modules/{id}', [DashboardController::class, 'showModule'])->name('show-module');






Route::get('/modules/edit/{id}', [DashboardController::class, 'editModule'])->name('edit-module');
Route::put('/modules/edit/{id}', [DashboardController::class, 'updateModule'])->name('update-module');
Route::delete('modules/delete/{id}',[DashboardController::class, 'destroyModule'])->name('destroy-module');


Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});




