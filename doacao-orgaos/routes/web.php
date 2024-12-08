<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Página inicial redireciona para a tela de login
Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Rota para exibir o formulário de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Rota para processar o login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Redirecionar se o login for bem-sucedido
        return redirect()->intended('dashboard');
    }

    // Redirecionar de volta com erro
    return back()->withErrors([
        'email' => 'Credenciais inválidas.',
    ]);
});


use App\Models\User;
use Illuminate\Support\Facades\Hash;


Route::post('/register', function (Request $request) {
    // Valida os dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:admin,doador,receptor', // Validando que a role é válida
    ]);

    // Cria o usuário com a role selecionada
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role, // Usando a role selecionada no formulário
    ]);

    // Autentica o usuário
    //auth()->login($user);

    // redireciiona
    //return redirect('/dashboard');
});

use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');


use App\Http\Controllers\HospitalController;

// Rota para o dashboard do admin (visualização geral)
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Rota para salvar os hospitais
Route::post('/hospitals', [HospitalController::class, 'store'])->name('hospitals.store');

use App\Http\Controllers\OrgaoController;
//Route::resource('orgaos', OrgaoController::class);

Route::get('/orgaos', [OrgaoController::class, 'index'])->name('orgaos.index'); // Listagem
Route::post('/orgaos', [OrgaoController::class, 'store'])->name('orgaos.store'); // Cadastro

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');




