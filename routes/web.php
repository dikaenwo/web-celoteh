<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\InstructorCourseController;
use App\Http\Controllers\InstructorSettingsController;
use App\Http\Controllers\JadwalUjiTampilController;
use App\Http\Controllers\LacakKemajuanController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewAIController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\UjiTampilController;
use App\Http\Controllers\UserProfileSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);
Route::resource('login', LoginController::class)->only(['index', 'store']);

Route::resource('register', RegisterController::class)->only(['index', 'store']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::resource('uji-tampil/buat-uji-tampil', UjiTampilController::class)->middleware('check.subscription');
Route::resource('uji-tampil/jadwal-uji-tampil', JadwalUjiTampilController::class);
Route::get('uji-tampil/{ujitampil:id}', [UjiTampilController::class, 'ujiTampilDetail'])->name('ujiTampilDetail');
Route::post('tambah-point', [UjiTampilController::class, 'addPoint'])->name('tambah-point');

Route::resource('course/daftar-course', CourseController::class);
Route::get('course-detail/{course:id}', [CourseDetailController::class, 'index']);
Route::get('/lesson/{pelajaran:slug}', [LessonController::class, 'index']);

Route::get('/dashboard', [ProfileController::class, 'dashboardView']);
Route::resource('dashboard/profile', ProfileController::class);
Route::get('/dashboard/list-course', [ProfileController::class, 'listUserCourse']);
Route::get('/dashboard/history-pembelian', [ProfileController::class, 'historyPembelian']);
Route::resource('/dashboard/settings', UserProfileSettings::class)->middleware('auth');
Route::put('/dashboard/settings', [UserProfileSettings::class, 'update'])->name('profile.update')->middleware('auth');

Route::group(['middleware' => 'isAdmin'], function() {
    Route::resource('/instructor/dashboard', InstructorController::class);
    Route::get('/instructor/profile', [InstructorController::class, 'profileView']);
    Route::get('/instructor/reviews', [InstructorController::class, 'reviewsView']);
    Route::get('/instructor/course', [InstructorController::class, 'courseView']);
    Route::post('/instructor/course', [InstructorController::class, 'kurikulum'])->name('instructor-course-kurikulum');
    Route::post('/instructor/lesson', [InstructorController::class, 'inputLesson'])->name('instructor-course-lesson');
    Route::resource('/instructor/settings', InstructorSettingsController::class);
    Route::resource('/instructor/buat-course', InstructorCourseController::class);
    Route::get('/instructor/validasi-uji-tampil', [UjiTampilController::class, 'validasi_view']);
    Route::post('/uji-tampil/{id}/validate', [UjiTampilController::class, 'validateUji'])->name('ujiTampil.validateUji');
    Route::get('/instructor/buat-mentoring', [MentoringController::class, 'viewBuatMentoring']);
});


Route::resource('/review-ai', ReviewAIController::class)->middleware('auth');
Route::resource('/lacak-kemajuan', LacakKemajuanController::class);
Route::get('/kemajuan-detail/{id}', [LacakKemajuanController::class, 'lacakKemajuanDetail']);

Route::post('/api/reduce-points', [UserProfileSettings::class, 'reducePoints'])->middleware('auth');

Route::post('/join-event', [UserProfileSettings::class, 'joinEvent'])->name('join-event');
Route::post('/save-session', [LacakKemajuanController::class, 'store']);

Route::get('/thanks-basic', [subscribeController::class, 'basic']);
Route::get('/thanks-pro', [subscribeController::class, 'pro']);
Route::get('/thanksyou-pro', [SubscribeController::class, 'thanksPro']);
Route::get('/thanksyou-basic', [SubscribeController::class, 'thanksBasic']);

Route::resource('/mentoring', MentoringController::class);
Route::post('/mentoring/daftar/{id}', [MentoringController::class, 'daftarMentoring'])->middleware('auth')->name('mentoring.daftar');

