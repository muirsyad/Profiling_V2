<?php

use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\questionsController;

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


//login and register routes
Route::get('/', [userController::class, 'index'])->name('login');
Route::post('/auth', [userController::class, 'auth'])->name('auth');
Route::get('/logout', [userController::class, 'logout'])->name('logout');
Route::get('/register', [userController::class, 'create'])->name('register');
//register by client
Route::get('/register/{name}', [userController::class, 'createcode'])->name('link');
Route::post('/Cadmin', [userController::class, 'Rstore'])->name('adminR');
Route::post('/_UserStore', [userController::class, 'R_User'])->name('U_Store');
Route::get('/register-accesor/{name}', [userController::class, 'createcode_acc'])->name('link-acc');
Route::get('/registerC', [userController::class, 'create2'])->name('register2');












//ajax test
route::get('/fetch-comments', [questionsController::class, 'fetchcomments'])->name('comm')->middleware('auth');


Route::post('/Cuser', [userController::class, 'Ustore'])->name('userR')->middleware('auth');

//email test
Route::get('/sendmail/{name}', [userController::class, 'sendMail'])->name('mail')->middleware('auth');
Route::post('/sentmail/{code}', [userController::class, 'sentMail'])->name('smail')->middleware('auth');

//lastest cvs send mail
Route::get('/sentmail-csv/{code}', [userController::class, 'sentMail_csv'])->name('smail_csv')->middleware('auth');
Route::get('/reminder/{code}', [userController::class, 'RemianderMail'])->name('remainder')->middleware('auth');
//random string
route::get('/code', function () {

    $random = Str::random(4);
    return view('random', [

        'random' => $random,
    ]);
});

//admin routes
Route::middleware(['auth', 'is_admin'])->group(function () {

    //admin routes
    Route::get('/admin/index', [adminController::class, 'index'])->name('ad_index');
    Route::post('/admin/clients/create/store', [adminController::class, 'store'])->name('Cstore');
    Route::get('/admin/clients/view', [adminController::class, 'view'])->name('Cview');
    Route::get('/admin/clients/details/{clients}', [adminController::class, 'details'])->name('Cdetails');
    Route::post('/admin/clients/details/upload', [adminController::class, 'uploadPax'])->name('upload');
    Route::get('/admin/clients/delete/{clients}', [adminController::class, 'Cdelete'])->name('Cdelete');
    Route::post('/admin/clients/change/{clients}', [adminController::class, 'change'])->name('Cupdate');
    Route::post('/admin/clients/logo/{clients}', [adminController::class, 'storeImage'])->name('image.store');
    Route::get('/admin/questions', [adminController::class, 'vquest'])->name('vquest');
    Route::get('/admin/department', [adminController::class, 'department'])->name('depart');
    Route::post('/admin/department/add', [adminController::class, 'department_add'])->name('depart_add');
    Route::post('/admin/department/update', [adminController::class, 'department_update'])->name('depart_update');
    Route::get('/admin/department/delete{departments}', [adminController::class, 'department_delete'])->name('depart_delete');
    Route::get('/admin/profile', [adminController::class, 'profile'])->name('profile');
    Route::get('/admin/profile/update', [adminController::class, 'profilemodify'])->name('profilemodify');
    route::get('/admin/templates', [adminController::class, 'templates'])->name('template');
    route::get('/admin/templates/individual', [adminController::class, 'indTemplate'])->name('indTemp');
    route::get('/admin/templates/individual2', [adminController::class, 'indTemplate2'])->name('indTemp2');
    route::get('/admin/templates/individual4', [adminController::class, 'indTemplate4'])->name('indTemp2');
    route::get('/admin/templates/keywords', [adminController::class, 'Template_key'])->name('key');
    route::get('/admin/templates/motivation', [adminController::class, 'Template_motivate'])->name('motivate');
    route::get('/admin/templates/performance', [adminController::class, 'Template_performance'])->name('performance');
    route::get('/admin/templates/strength', [adminController::class, 'Template_strength'])->name('strength');
    Route::post('/admin/templates/individual/update', [adminController::class, 'uptemplate'])->name('tempstore');
    Route::post('/admin/templates/keywords/update', [adminController::class, 'Update_keywords'])->name('keywordsstore');
    Route::post('/admin/templates/motivation/update', [adminController::class, 'Update_motivation'])->name('motivatestore');
    Route::post('/admin/templates/performance/update', [adminController::class, 'Update_performance'])->name('performancestore');
    Route::post('/admin/templates/strength/update', [adminController::class, 'Update_strength'])->name('strengthstore');





    // Route::get('/admin/clients', [adminController::class, 'Chome'])->name('cHome');
    // Route::get('/admin/clients/create', [adminController::class, 'create'])->name('Ccreate');   
    // Route::get('/admin/clients/details/{clients}/invite', [adminController::class, 'invite'])->name('invite');
    // Route::get('/admin/clients/update/{clients}', [adminController::class, 'update'])->name('Cupdate');
    // route::get('/admin/templates/individual', [adminController::class, 'indTemplate'])->name('indTemp');
    // route::get('/admin/templates/group', [adminController::class, 'grpTemplate'])->name('grpTemp');
});


//accesor route
Route::middleware(['auth', 'is_accesor'])->group(function () {
    route::get('/AC-index', [adminController::class, 'ac_index'])->name('acindex');
    route::get('/remarks/{users}', [adminController::class, 'remarks'])->name('remarks');
    route::post('/remarks/update', [adminController::class, 'updateRemarks1'])->name('Remup1');
    route::post('/remarks2/update', [adminController::class, 'updateRemarks2'])->name('Remup2');
    route::post('/remarks3/update', [adminController::class, 'updateRemarks3'])->name('Remup3');

    route::post('/remarks/insert', [adminController::class, 'updateRemarks1'])->name('Remup1');
    route::post('/remarks2/update', [adminController::class, 'updateRemarks2'])->name('Remup2');
    route::post('/remarks3/update', [adminController::class, 'updateRemarks3'])->name('Remup3');
   
});


// clients route
Route::middleware(['auth'])->group(function () {
    //cliet routes

    Route::get('/home', [questionsController::class, 'index'])->name('Qhome');
    Route::get('/quiz', [questionsController::class, 'quiz'])->name('quiz');
    Route::get('/Squiz', [questionsController::class, 'Squiz'])->name('Squiz');
    Route::get('/quizzz', [questionsController::class, 'quiz2'])->name('qz');
    Route::post('/storeQuiz', [questionsController::class, 'storQ'])->name('StoreQuiz');
    Route::get('/results', [questionsController::class, 'results'])->name('results');
    Route::get('/results2', [questionsController::class, 'results2'])->name('results2');
    route::get('/dd', [questionsController::class, 'pdf'])->name('pdf');



    //ver 2 pdf
    route::get('/pdf2', [questionsController::class, 'inv2'])->name('inv2')->middleware('auth');
    route::get('/pdf/version3', [questionsController::class, 'inv3'])->name('inv3')->middleware('auth');
    route::get('/pdf/version3/{id}', [questionsController::class, 'report_inv'])->name('report_inv')->middleware('auth');


    
});



//tetsing dump 

//test pdf
//indivifual report
Route::get('tpdf', [questionsController::class, 'tpdf'])->name('dlpdf')->middleware('auth');

//group report
Route::get('gpdf/{clients}', [questionsController::class, 'Gpdf'])->name('Greport')->middleware('auth');

Route::get('vtpdf', [questionsController::class, 'vtpdf'])->middleware('auth');

//tailwind style new 
Route::get('tl', [userController::class, 't_login'])->name('t_login');





//ori route
// //admin routes
// Route::get('/admin/index', [adminController::class, 'index'])->name('ad_index')->middleware('auth');
// Route::get('/admin/clients', [adminController::class, 'Chome'])->name('cHome')->middleware('auth');
// Route::get('/admin/clients/create', [adminController::class, 'create'])->name('Ccreate')->middleware('auth');
// Route::post('/admin/clients/create/store', [adminController::class, 'store'])->name('Cstore')->middleware('auth');
// Route::get('/admin/clients/view', [adminController::class, 'view'])->name('Cview')->middleware('auth');
// Route::get('/admin/clients/details/{clients}', [adminController::class, 'details'])->name('Cdetails')->middleware('auth');
// Route::get('/admin/clients/details/{clients}/invite', [adminController::class, 'invite'])->name('invite')->middleware('auth');
// Route::post('/admin/clients/details/upload', [adminController::class, 'uploadPax'])->name('upload')->middleware('auth');
// Route::get('/admin/clients/delete/{clients}', [adminController::class, 'Cdelete'])->name('Cdelete')->middleware('auth');
// Route::get('/admin/clients/update/{clients}', [adminController::class, 'update'])->name('Cupdate')->middleware('auth');
// Route::post('/admin/clients/change/{clients}', [adminController::class, 'change'])->name('Cupdate')->middleware('auth');
// Route::get('/admin/questions', [adminController::class, 'vquest'])->name('vquest')->middleware('auth');
// Route::get('/admin/profile', [adminController::class, 'profile'])->name('profile')->middleware('auth');
// Route::get('/admin/profile/update', [adminController::class, 'profilemodify'])->name('profilemodify')->middleware('auth');
// route::get('/admin/templates', [adminController::class, 'templates'])->name('template');
// route::get('/admin/templates/individual', [adminController::class, 'indTemplate'])->name('indTemp');
// route::get('/admin/templates/individual2', [adminController::class, 'indTemplate2'])->name('indTemp2');
// route::get('/admin/templates/keywords', [adminController::class, 'Template_key'])->name('key');
// route::get('/admin/templates/motivation', [adminController::class, 'Template_motivate'])->name('motivate');
// route::get('/admin/templates/performance', [adminController::class, 'Template_performance'])->name('performance');
// route::get('/admin/templates/strength', [adminController::class, 'Template_strength'])->name('strength');



// Route::post('/admin/templates/individual/update', [adminController::class, 'uptemplate'])->name('tempstore')->middleware('auth');
// Route::post('/admin/templates/keywords/update', [adminController::class, 'Update_keywords'])->name('keywordsstore')->middleware('auth');
// Route::post('/admin/templates/motivation/update', [adminController::class, 'Update_motivation'])->name('motivatestore')->middleware('auth');
// Route::post('/admin/templates/performance/update', [adminController::class, 'Update_performance'])->name('performancestore')->middleware('auth');
// Route::post('/admin/templates/strength/update', [adminController::class, 'Update_strength'])->name('strengthstore')->middleware('auth');

// //version 2
// route::get('/admin/templates/individual3', [adminController::class, 'indTemplate3'])->name('indTemp3');
// Route::post('/admin/templates/individual/update2', [adminController::class, 'uptemplate'])->name('tempstore')->middleware('auth');