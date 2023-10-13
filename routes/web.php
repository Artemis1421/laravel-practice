<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    // SQL
    // SELECT
    // $users = DB::select(
    //     'SELECT * 
    //     FROM `users`'
    // );

    // CREATE
    // $insert = DB::insert(
    //     'INSERT INTO `users` 
    //     (name, email, password)
    //     VALUES (:name, :email, :password)',
    //     [
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@example.com',
    //         'password' => 'johndoepassword'
    //     ]
    // );

    // UPDATE
    // $update = DB::update(
    //     'UPDATE `users`
    //     SET name = :name
    //     WHERE id = :id',
    //     [
    //         'name' => 'Patrick Update',
    //         'id' => 1
    //     ]
    // );

    // DELETE
    // $delete = DB::delete(
    //     'DELETE FROM `users` 
    //     WHERE id = :id',
    //     [
    //         'id' => 4
    //     ]
    // );

    // Query Builder
    // Select
    // $users = DB::table('users')
    //     ->first();
    // $users = DB::table('users')
    //     ->where('id', 1)
    //     ->pluck('name');

    // Create
    // $insert = DB::table('users')
    //     ->insert([
    //         'name' => 'John Doe',
    //         'email' => 'john.doe@gmail.com',
    //         'password' => 'passwordjohndoe'
    //     ]);

    // Update
    // $update = DB::table('users')
    //     ->where('id', 5)
    //     ->update([
    //         'name' => 'John Update',
    //         'email' => 'john.update@gmail.com'
    //     ]);

    // Delete
    // $delete = DB::table('users')
    //     ->where('id', 5)
    //     ->delete();

    // Eloquent

    // dd($users);

    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
