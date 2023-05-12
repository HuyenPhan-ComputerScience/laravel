<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AvatarController;

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
    //$users = DB::select('select * from users ');
    // $user = DB::insert('insert into users(name,email,password) values(?,?,?)', [
    //     'sara',
    //     'sara@gmail.com',
    //     'password',
    // ]);
    // $users = DB::select('select * from users');
    // $user = DB::update("update users set email='eab@gmail.com' where id=3");
    // dd($users);
    // $users = DB::table('users')->where("id", 1)->get();
    // $user = DB::table('users')->insert([
    //     'name' => 'Nguyen',
    //     'email' => 'nguyen@gmail.com',
    //     'password' => 'password'
    // ]);
    // $user = DB::table('users')->where("id", 1)->update([
    //     "email" => "abs@gmail.com"
    // ]);
    // $user = DB::table('users')->where("id", 1)->delete();
    // $users = User::all();
    // $user = DB::insert(
    //     'insert into users(name,email,password) values(?,?,?)',
    //     ['Huyen', 'huyen@gmail.com', 'password']
    // );
    // $user = DB::table("users")->insert(['name' => 'Nguyen', 'email' => "nguyen@gmail.com", "password" => "password"]);
    // $user = User::create(['name' => 'Hung', 'email' => "hung@gmail.com", "password" => "password"]);
    // $user = DB::table('users')->where('name', 'sara')->delete();
    // $user = DB::table('users')->where("id", 2)->delete();
    // $users = User::all();
    // dd($users);



    // dd($users);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //route for avatar
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';