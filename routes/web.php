<?php

use App\Models\User;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $number_of_friends = count(User::friends(auth()->user()->id));
    $number_of_posts = count(auth()->user()->posts);
    return view('dashboard', compact('number_of_friends', 'number_of_posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('pages', PageController::class);

    Route::get('/conversations/{conversation_id?}', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/create-open-conversation/{participant_one}/{participant_two}', [ConversationController::class, 'createOpenConversation'])->name('conversations.createOpenConversation');
});

require __DIR__.'/auth.php';
