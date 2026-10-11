<?php

namespace App\Http\Controllers;

use App\Models\ApprovalRequest;
use Illuminate\Http\Request;

class ApprovalRequestController extends Controller
{
    // 1. หน้าแสดงคำร้องขอของ พนักงาน/ลูกน้อง
    public function employeeIndex()
    {
        $userId = session('user_id', 1);
        $requests = ApprovalRequest::where('user_id', $userId)->latest()->get();
        return view('approval_requests.employee', compact('requests'));
    }

    // 2. หน้าแสดงคำร้องขอทั้งหมดสำหรับ หัวหน้า/ผู้บริหาร
    public function managerIndex()
    {
        $requests = ApprovalRequest::with('user')->latest()->get();
        return view('approval_requests.manager', compact('requests'));
    }

    // 3. หน้าฟอร์มสร้างคำร้องขอ
    public function create()
    {
        return view('approval_requests.create');
    }

    // 4. บันทึกคำร้องขอจากลูกน้อง
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        ApprovalRequest::create([
            'user_id' => session('user_id', 1),
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('employee.index')->with('success', 'ส่งคำร้องขออนุมัติเรียบร้อยแล้ว!');
    }

    // 5. การ Approve / Reject จากหัวหน้า
    public function update(Request $request, string $id)
    {
        $approvalRequest = ApprovalRequest::findOrFail($id);

        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $approvalRequest->update([
            'status' => $request->status,
        ]);

        $statusText = $request->status === 'approved' ? 'ได้รับการอนุมัติเรียบร้อยแล้ว' : 'ถูกปฏิเสธคำร้องขอ';

        return redirect()->route('manager.index')
            ->with('success', "แจ้งเตือน: คำร้องเรื่อง \"{$approvalRequest->title}\" {$statusText}");
    }
}