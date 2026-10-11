<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovalRequestController;
use App\Http\Controllers\AuthController;

// หน้าแรก ให้วิ่งไปที่หน้าสมัครสมาชิก/สลับบทบาท
Route::get('/', function () {
    return redirect()->route('register');
});

// เส้นทางสำหรับ สมัครสมาชิก / สลับบทบาท
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// เส้นทางสำหรับ ลูกน้อง/พนักงาน
Route::get('/employee', [ApprovalRequestController::class, 'employeeIndex'])->name('employee.index');
Route::get('/employee/create', [ApprovalRequestController::class, 'create'])->name('approval-requests.create');
Route::post('/employee/store', [ApprovalRequestController::class, 'store'])->name('approval-requests.store');

// เส้นทางสำหรับ หัวหน้า/ผู้บริหาร
Route::get('/manager', [ApprovalRequestController::class, 'managerIndex'])->name('manager.index');
Route::put('/manager/update/{id}', [ApprovalRequestController::class, 'update'])->name('approval-requests.update');