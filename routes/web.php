<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use App\Http\Controllers\Demo;
use App\Http\Controllers\SignCon;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\CardsController;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\AuthController;

//Delete Routes
Route::get('/deleteCARD/{id}',[IconController::class,'deletecard']);
Route::get('/deleteICON/{id}',[IconController::class,'deleteicon']);
Route::get('/deleteFOOTER/{id}',[IconController::class,'deletefooter']);
Route::get('/deleteNEWS/{id}',[IconController::class,'deletenews']);
Route::get('/deleteEXPLORE/{id}',[IconController::class,'deleteexplore']);
Route::get('/deletesign/{id}',[SignCon::class,'delete']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/icon', [IconController::class, 'store'])->name('icon.store');
Route::get('/showicon',[IconController::class,'showicons'])->middleware('auth');

Route::get('/edit/{id}', [SignCon::class, 'edit'])->name('users.edit');
Route::put('/update/{id}', [SignCon::class, 'update'])->name('users.update');

//Icon Routes
// Route::get('/iconedit/{id}', [IconController::class, 'iconedit'])->name('icon.edit');
// Route::put('/iconupdate/{id}', [IconController::class, 'iconupdate'])->name('icon.update');
Route::get('/showicon', [IconController::class, 'showicons'])->name('icon.index')->middleware('auth');
Route::post('/icon', [IconController::class, 'store'])->name('icon.store');
Route::get('/icon/{id}/edit', [IconController::class, 'edit'])->name('icon.edit');
Route::put('/icon/{id}', [IconController::class, 'update'])->name('icon.update');

// Route::get('/cardedit/{id}',[IconController::class,'cardedit'])->name('card.edit');
// Route::put('/cardupdate/{id}',[IconController::class,'cardupdate'])->name('card.update');
//Card Routes
// Update these card routes:
Route::get('/card', [IconController::class, 'showcard'])->name('card.index');
// Route::post('/card', [CardsController::class, 'store'])->name('card.store'); // Changed from /data to /card
Route::get('/card/{id}/edit', [IconController::class, 'editCard'])->name('card.edit');
Route::put('/card/{id}', [IconController::class, 'updateCard'])->name('card.update');


//Footer Routes
// Route::get('/footeredit/{id}', [IconController::class, 'footeredit'])->name('footer.edit');
// Route::put('/footerupdate/{id}', [IconController::class, 'footerupdate'])->name('footer.update');
Route::get('/footer', [IconController::class, 'showfooter'])->name('footer.index')->middleware('auth');
Route::post('/footerchanges', [FooterController::class, 'store'])->name('footer.store');
Route::get('/footer/{id}/edit', [IconController::class, 'editFooter'])->name('footer.edit');
Route::put('/footer/{id}', [IconController::class, 'updateFooter'])->name('footer.update');


// Route::get('/newsedit/{id}', [IconController::class, 'newsedit'])->name('news.edit');
// Route::put('/newsupdate/{id}', [IconController::class, 'newsupdate'])->name('news.update');
//News Update
Route::get('/news', [IconController::class, 'shownews'])->name('news.index')->middleware('auth');
Route::post('/submitnews', [CardsController::class, 'storenews'])->name('news.store');
Route::get('/news/{id}/edit', [IconController::class, 'editNews'])->name('news.edit');
Route::put('/news/{id}', [IconController::class, 'updateNews'])->name('news.update');

// Route::get('/exploreedit/{id}', [IconController::class, 'exploreedit'])->name('explore.edit');
// Route::put('/exploreupdate/{id}', [IconController::class, 'exploreupdate'])->name('explore.update');
//Explore Routes
Route::get('/explore', [IconController::class, 'showexplore'])->name('explore.index')->middleware('auth');
Route::post('/exploresetup', [ExploreController::class, 'store'])->name('explore.store');
Route::get('/explore/{id}/edit', [IconController::class, 'editExplore'])->name('explore.edit');
Route::put('/explore/{id}', [IconController::class, 'updateExplore'])->name('explore.update');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

*/

/*Route::get('/login', function () {
    return view('loginpage'); // your custom view
})->name('login'); // important for form's action

Route::post('/login', [LoginController::class, 'login']);
*/
Route::get('/', function () {
    return view('welcome');
});

Route::post('/active',[IconController::class,'status']);

Route::get('/insert',[AppController::class,'index']);
Route::post('/insert',[AppController::class,'store']);
Route::get('/view',[AppController::class,'view']);
Route::get('/delete/{id}',[AppController::class,'delete']);
//Route::get('/edit/{id}', [AppController::class, 'edit'])->name('user.edit'); 
//Route::put('/update/{id}', [AppController::class, 'update'])->name('user.update');

//Project Route Starts From Here
Route::post('/data',[CardsController::class,'store'])->name('card.store');
Route::get('/webpage',[CardsController::class,'view']);
//Route::view('/card','card')->middleware('auth');

// Route::view('/explore','explore')->middleware('auth');


Route::get('/website',[FooterController::class,'view']);

Route::get('/signform',[SignCon::class,'showsignup']);
Route::post('/insertdata',[SignCon::class,'insert']);
//Route::get('/login',[LoginController::class,'login']); 

Route::get('/dashboard',[SignCon::class,'show'])->middleware('auth');

Route::post('/loggedin',[SignCon::class,'loggedin']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Route::get('/login',[SignCon::class,'showloginform']);


//Route::get('/logout', [SignCon::class, 'logout'])->name('logout');
Route::get('/project',[Demo::class,'view']);
/*
Route::get('get-all-session',function(){
    $session=session()->all();
    var_dump($session);
});

Route::get('destroy',function(Request $request){
    $request->session()->forget(['Mobile_No','Age']);
    return redirect('get-all-session');

});
Route::get('set-session',function(Request $request){
    $request->session()->put('User_name','Suraj Singh');
    $request->session()->put('Age',68);
    $request->session()->put('Mobile_No',68);
    return redirect('get-all-session');
});*/
Route::get('/',function(){
    return view('welcome');
});

