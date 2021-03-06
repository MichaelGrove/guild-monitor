<?php

use App\Http\Controllers\HistoryItemController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StashController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Signin credentials are incorrect']
        ]);
    }

    return $user->createToken($user->id)->plainTextToken;
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('members', MemberController::class)
        ->only(['index', 'show']);

    Route::resource('stash', StashController::class)
        ->only(['index', 'show']);
});
