<?php

use App\Http\Controllers\AllCountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\NoticeController;

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

//Route::get('/we',[ContactInfoController::class,'index'])->name('main');
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->name('dashboard');

// Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
// Route::post('/login-store', [LoginController::class, 'store'])->name('store');

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.submit');

Route::get('/teacher/login', [LoginController::class, 'showTeacherLoginForm'])->name('teacher.login');
Route::post('/teacher/login', [LoginController::class, 'teacherLogin'])->name('teacher.login.submit');

Route::get('/student/login', [LoginController::class, 'showStudentLoginForm'])->name('student.login');
Route::post('/student/login', [LoginController::class, 'studentLogin'])->name('student.login.submit');




Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/log',function(){
//     return view('log');
// })->name('login');

// Route::get('/enquiry',function(){
//     return view('enquiry');
// })->name('enquiry');
// Route::get('/about',function(){
//     return view('about');
// })->name('about');

// Route::get('/contact',function(){
//     return view('contact');
// })->name('contact');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::get('/contact-forms', [ContactFormController::class, 'index'])->name('contact.index');
Route::get('/contact-create', [ContactFormController::class, 'create'])->name('contact');

// Route::get('/team',function(){
//     return view('team');
// })->name('team');

Route::get('/enquiry', [EnquiryController::class, 'create'])->name('enquiry.create');
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');
Route::get('/enquiry.index', [EnquiryController::class, 'index'])->name('enquiry.index'); 
Route::get('/team',[TeachersController::class,'team'])->name('team');
Route::get('/course',[ClassController::class,'course'])->name('course');


Route::get('/',[FrontController::class,'course'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');

//Route::get('/t',[FrontController::class,'team'])->name('home');

//class
// use App\Http\Controllers\ClassController;


//LlogOut
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//student

Route::group(['middleware' => 'student'], function () {
    Route::get('/students.idcard/{id}',[StudentController::class,'idcard'])->name('students.idcard');

    Route::get('/students/front/{id}', [StudentController::class, 'showForm'])->name('students.front');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

});

//Teachers

Route::group(['middleware' => 'teacher'], function () {
Route::get('/teachers.form/{id}',[TeachersController::class,'showForm'])->name('teachers.form');
    

});
//Subject


//Issue Classes
use App\Http\Controllers\ClassIssueController;



Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');


//Pages Edit
Route::get('/contact-info/edit', [ContactInfoController::class, 'edit'])->name('contact_info.edit');
Route::put('/contact-info/{id}', [ContactInfoController::class, 'update'])->name('contact_info.update');

//Sliders
Route::get('sliders.create',[SlideController::class,'create'])->name('sliders.create');
Route::get('sliders.index',[SlideController::class,'index'])->name('sliders.index');
Route::post('sliders.store',[SlideController::class,'store'])->name('sliders.store');
Route::get('sliders.edit/{id}',[SlideController::class,'edit'])->name('sliders.edit');
Route::delete('sliders.destroy/{id}',[SlideController::class,'destroy'])->name('sliders.destroy');
Route::put('sliders.update/{id}',[SlideController::class,'update'])->name('sliders.update');


Route::group(['middleware' => 'user'], function () {

    Route::get('/dashboard',[AllCountController::class,'index'])->name('dashboard');
    Route::get('/school',function(){
        return view('students.create');

    })->name('school');
    
    Route::get('/students.create',[StudentController::class,'create'])->name('students.create');
    Route::get('/students.index',[StudentController::class,'index'])->name('students.index');
    Route::post('/students.store',[StudentController::class,'store'])->name('students.store');
    Route::get('/students.edit/{id}',[StudentController::class,'edit'])->name('students.edit');
    
    Route::get('/students.show/{id}',[StudentController::class,'show'])->name('students.show');
    
    
    
    Route::get('/students.idcard/{id}',[StudentController::class,'idcard'])->name('students.idcard');
    
    Route::put('/students.update/{id}',[StudentController::class,'update'])->name('students.update');
    Route::post('/students.destroy/{id}',[StudentController::class,'destroy'])->name('students.destroy');
    Route::resource('students', StudentController::class); 
    Route::get('students/export', [StudentController::class, 'export'])->name('students.export');

    //teacher
    
Route::get('/teachers.create',[TeachersController::class,'create'])->name('teachers.create');
Route::get('/teachers.index',[TeachersController::class,'index'])->name('teachers.index');
Route::post('/teachers.store',[TeachersController::class,'store'])->name('teachers.store');
Route::get('/teachers.edit/{id}',[TeachersController::class,'edit'])->name('teachers.edit');
Route::get('/teachers.show/{id}',[TeachersController::class,'show'])->name('teachers.show');



Route::get('/teachers.delete/{id}',[TeachersController::class,'delete'])->name('teachers.delete');
Route::put('/teachers.update/{id}',[TeachersController::class,'update'])->name('teachers.update');

//class

Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');

// Add the following route if you have a class list page
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');

Route::get('/classes/{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{id}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy');

//issueClass
Route::get('class_issues', [ClassIssueController::class, 'index'])->name('class_issues.index');
Route::get('class_issues/create', [ClassIssueController::class, 'create'])->name('class_issues.create');
Route::post('class_issues', [ClassIssueController::class, 'store'])->name('class_issues.store');
Route::get('api/classes/{class}/subjects', [ClassIssueController::class, 'fetchSubjects']);

//Route::get('class_issues/download-pdf', [ClassIssueController::class, 'downloadPDF'])->name('class_issues.downloadPDF');
//Route::get('/generate-pdf', [ClassIssueController::class, 'generatePDF'])->name('generate-pdf');
Route::post('/generate-pdf', [ClassIssueController::class, 'generatePDF'])->name('generate-pdf');

Route::get('/class_issues/downloadPDF', [ClassIssueController::class, 'downloadPDF'])->name('class_issues.downloadPDF');

Route::get('/class_issues/{id}/edit', [ClassIssueController::class, 'edit'])->name('class_issues.edit');
Route::put('/class_issues/{id}', [ClassIssueController::class, 'update'])->name('class_issues.update');

 
Route::get('/api/classes/{classId}/subjects', [ClassController::class, 'getSubjects']);
Route::get('/api/classes/{classId}/students', [ClassController::class, 'getStudents']);

//Subject

Route::get('/subjects.index', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects.store', [SubjectController::class, 'store'])->name('subjects.store');

Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

//comments
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');

Route::get('/comments/{comment}/status/{status}', [CommentController::class, 'changeStatus'])->name('comments.changeStatus');
 //notice


Route::get('/notices/create', [NoticeController::class, 'create'])->name('notices.create');
Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::get('/notices/changeStatus/{notice}/{status}', [NoticeController::class, 'changeStatus'])->name('notices.changeStatus');

Route::get('/notices/{id}/edit', [NoticeController::class, 'edit'])->name('notices.edit');
Route::put('/notices/{id}', [NoticeController::class, 'update'])->name('notices.update');
Route::delete('/notices/{id}', [NoticeController::class, 'destroy'])->name('notices.destroy');
});