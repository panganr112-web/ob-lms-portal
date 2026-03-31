<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ReportController;

// I-redirect ang root URL sa login page
Route::get('/', function () { 
    return redirect('/login'); 
});

// Authentication Routes
Route::get('/login', [AssessmentController::class, 'showLogin'])->name('login');
Route::post('/login', [AssessmentController::class, 'login'])->name('login.post');
Route::post('/logout', [AssessmentController::class, 'logout'])->name('logout');

// Mga routes na nangangailangan ng login (Auth Middleware)
Route::middleware(['auth'])->group(function () {
    
    // Main Dashboard
    Route::get('/dashboard', [AssessmentController::class, 'dashboard'])->name('dashboard');

    // Student Management
    Route::get('/students', [AssessmentController::class, 'manageStudents'])->name('students.index');
    Route::post('/students/store', [AssessmentController::class, 'storeStudent'])->name('students.store');
    Route::delete('/students/delete/{id}', [AssessmentController::class, 'deleteStudent'])->name('students.delete');

    // Subject Management
    Route::get('/subjects', [AssessmentController::class, 'manageSubjects'])->name('subjects.index');
    Route::post('/subjects/store', [AssessmentController::class, 'storeSubject'])->name('subjects.store');
    Route::put('/subjects/update/{id}', [AssessmentController::class, 'updateSubject'])->name('subjects.update');
    Route::delete('/subjects/delete/{id}', [AssessmentController::class, 'deleteSubject'])->name('subjects.delete');

    // Assessment & PO Mapping
    Route::get('/assessment', [AssessmentController::class, 'manageAssessments'])->name('assessments.create');
    Route::post('/assessments/store', [AssessmentController::class, 'store'])->name('assessments.store');
    
    // Reports Management
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');

});