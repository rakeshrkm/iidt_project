<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CollegeController;
use App\Http\Controllers\admin\StudentRegisterController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\CaptchaController;


// home page

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\FrondEndCourseController;
use App\Http\Controllers\frontend\ContactUsController;
use App\Http\Controllers\frontend\StudentLoginController;
use App\Http\Controllers\frontend\StudentDashboardController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// front code saveRegister

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/course', [FrondEndCourseController::class, 'index'])->name('courses');
Route::get('/course-detail/{course}', [HomeController::class, 'courseDetails'])->name('courseDetails');
Route::get('/contact', [ContactUsController::class, 'index'])->name('countactLoadPage');
Route::post('/contact', [ContactUsController::class, 'save'])->name('savecontactus');
Route::get('/student-register', [StudentRegisterController::class, 'studentRegistration'])->name('student.registration');
Route::post('/student-submit', [StudentRegisterController::class, 'saveRegister'])->name('student.submit');
Route::get('/verify-email/{email}', [StudentRegisterController::class, 'verifyEmail'])->name('student.verifyemail');

Route::get('/student-login', [StudentLoginController::class, 'LoginPageLoad'])->name('LoginPageLoad');
Route::post('/student-login', [StudentLoginController::class, 'authenticateStudent'])->name('authentication');

Route::get('fees-refund-policy', [HomeController::class, 'feesRefundPlicy'])->name('refund_policy');




// Student middleware


Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard', [StudentDashboardController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student-logout', [StudentLoginController::class, 'logout'])->name('student.logout');
    Route::get('/change-password', [StudentLoginController::class, 'changePassword'])->name('student.changepassword');
    Route::post('/change-password', [StudentLoginController::class, 'saveChangePassword'])->name('student.savechangepassword');
    Route::get('profile', [StudentLoginController::class, 'profile'])->name('student.profile');
    Route::post('/payment-create',[PaymentController::class,'store'])->name('payments.store');
});




// backend code




Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'guest'], function(){
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate-user');
        Route::get('captcha-reload', [CaptchaController::class, 'reloadCaptcha'])->name('reload-captcha');
    
       
    });

Route::group(['middleware' => 'admin',  'middleware' => 'auth'], function(){
    Route::get('/mark-as-read', [PaymentController::class,'markAsRead'])->name('mark-as-read');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create-credentials/{id}', [StudentRegisterController::class, 'createCredentials'])->name('createCredentials');
    Route::post('/save-credentials', [StudentRegisterController::class, 'saveCredentials'])->name('saveCredentials'); 
    
    Route::controller(CourseController::class)->prefix('courses')->group(function () {
        Route::get('/', 'index')->name('courses.index');
        Route::get('/create','create')->name('courses.create');
        Route::post('/submit', 'save')->name('courses.save');
        Route::get('/edit/{course}', 'edit')->name('courses.edit');
        Route::put('/{course}','update')->name('courses.update');
        Route::get('destory/{course}', 'destroy')->name('courses.destroy');

        // course points

        Route::get('learning-points', 'learningPoints')->name('courses.learningPoints');
        Route::post('learning-points', 'saveLearningPoints')->name('courses.savelearningpoints');
        Route::get('learning-lists', 'learningPointsLists')->name('courses.learningpointslists');

        // course topics

        Route::get('topics', 'courseTopics')->name('courses.topics');
        Route::post('topics-save', 'saveTopics')->name('courses.savetopics');
        Route::get('topics-lists', 'TopicsLists')->name('courses.topicslists');

    });
    
    Route::controller(StudentRegisterController::class)->prefix('registers')->group(function () {
        Route::get('/', 'index')->name('registers.index');
        Route::get('/create','create')->name('registers.create');
        Route::post('/submit', 'save')->name('registers.save');
        Route::get('/edit/{studentRegister}', 'edit')->name('registers.edit');
        Route::put('/update/{studentRegister}','update')->name('registers.update');
        Route::get('/show/{studentRegister}','show')->name('registers.show');
        Route::get('/create-credentials/{studentRegister}','createCredentialsByAdmin')->name('registers.credentials');
        Route::post('/save-credentials','saveCredentialsByAdmin')->name('registers.savecreadentials');
        Route::get('destory/{studentRegister}', 'destroy')->name('registers.destroy');
    });
    
    Route::controller(CollegeController::class)->prefix('college')->group(function () {
        Route::get('/', 'index')->name('college.index');
        Route::get('/create','create')->name('college.create');
        Route::post('/submit', 'save')->name('college.save');
        Route::get('/edit/{college}', 'edit')->name('college.edit');
        Route::put('/update/{college}','update')->name('college.update');
        Route::get('/show/{college}','show')->name('college.show');
        Route::get('destory/{college}', 'destroy')->name('college.destroy');
    });

    // payments
    Route::controller(PaymentController::class)->prefix('payments')->group(function () {
        Route::get('/index','index')->name('payments.index');
        Route::get('/create/{id}','create')->name('payments.create');
        // Route::post('/store','store')->name('payments.store');
        Route::put('/update-payments','updatePayments')->name('payments.updatePayments');
        Route::get('/verify-payments/{coursePayment}','verifyPayments')->name('payments.verify');
    });

    //offer

    Route::controller(OfferController::class)->prefix('offers')->group(function(){
        Route::get('/', 'index')->name('offers.index');
        Route::get('create', 'create')->name('offers.create');
        Route::post('save', 'save')->name('offers.save');
        Route::get('edit/{offer}', 'edit')->name('offers.edit');
        Route::put('update/{offer}', 'update')->name('offers.update');
        Route::post('/apply-coupon-code', 'applyCouponCode')->name('offer.ApplyCouponCode');
        Route::get('destory/{offer}', 'destroy')->name('offers.destroy');
    });

    //permissions

    Route::controller(PermissionController::class)->prefix('permissions')->group(function () {
        Route::get('/create','index')->name('permissions.create');
        Route::post('/store', 'store')->name('permissions.store');
        Route::get('/getpermission', 'fetchPermission')->name('permissions.fetch');
    });


    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
});












