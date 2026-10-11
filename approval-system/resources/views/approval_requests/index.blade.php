<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการคำร้องขออนุมัติ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">ระบบจัดการคำร้องขออนุมัติ</h2>
        
        <!-- กล่องแจ้งเตือนผู้ใช้เมื่อคำร้องขอได้รับการอนุมัติ/ปฏิเสธ -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r shadow-sm">
                <p class="font-bold">🔔 การแจ้งเตือนระบบ</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- ปุ่มสร้างคำร้องใหม่ -->
        <div class="mb-6">
            <a href="{{ route('approval-requests.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                + สร้างคำร้องใหม่
            </a>
        </div>

        <!-- ตารางแสดงข้อมูล -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border-b py-3 px-4">ID</th>
                        <th class="border-b py-3 px-4">หัวข้อ</th>
                        <th class="border-b py-3 px-4">ประเภท</th>
                        <th class="border-b py-3 px-4">ผู้สร้าง</th>
                        <th class="border-b py-3 px-4">สถานะ</th>
                        <th class="border-b py-3 px-4 text-center">จัดการ (ผู้บริหาร)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                    <tr class="hover:bg-gray-50">
                        <td class="border-b py-3 px-4">{{ $request->id }}</td>
                        <td class="border-b py-3 px-4">{{ $request->title }}</td>
                        <td class="border-b py-3 px-4">{{ $request->type }}</td>
                        <td class="border-b py-3 px-4">{{ $request->user->name ?? 'คุณระบบ' }}</td>
                        <td class="border-b py-3 px-4">
                            @if($request->status === 'approved')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">อนุมัติแล้ว</span>
                            @elseif($request->status === 'rejected')
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">ปฏิเสธแล้ว</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">รอดำเนินการ</span>
                            @endif
                        </td>
                        <td class="border-b py-3 px-4 text-center">
                            @if($request->status === 'pending')
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- ปุ่ม Approve -->
                                    <form action="{{ route('approval-requests.update', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="px-3 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700 font-semibold">
                                            Approve
                                        </button>
                                    </form>

                                    <!-- ปุ่ม Reject -->
                                    <form action="{{ route('approval-requests.update', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 font-semibold">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-xs text-gray-400 italic">ดำเนินการแล้ว</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="border-b py-4 text-center text-gray-500">
                            ยังไม่มีข้อมูลคำร้องขอในระบบ
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>