<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:employee,manager',
        ]);

        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => bcrypt('password'),
            ]
        );

        // บันทึกข้อมูลผู้ใช้และบทบาทลงใน Session
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $request->role,
        ]);

        if ($request->role === 'manager') {
            return redirect()->route('manager.index')->with('success', 'เข้าสู่ระบบในฐานะ "หัวหน้า/ผู้บริหาร" เรียบร้อยแล้ว');
        }

        return redirect()->route('employee.index')->with('success', 'เข้าสู่ระบบในฐานะ "พนักงาน/ลูกน้อง" เรียบร้อยแล้ว');
    }
}