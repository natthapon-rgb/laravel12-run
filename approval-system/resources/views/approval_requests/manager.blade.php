<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหัวหน้า/ผู้บริหาร - ระบบจัดการคำร้องขออนุมัติ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">🧑‍💼 หน้าหัวหน้า / ผู้บริหาร (พิจารณาอนุมัติคำร้อง)</h2>
                <p class="text-sm text-gray-600">ผู้ใช้งานปัจจุบัน: <span class="font-semibold text-purple-600">{{ session('user_name', 'หัวหน้า') }}</span></p>
            </div>
            <a href="{{ route('register') }}" class="text-xs bg-gray-200 text-gray-700 px-3 py-2 rounded hover:bg-gray-300 font-semibold">
                🔄 สลับบัญชี / สลับบทบาท
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-r shadow-sm">
                <p class="font-bold">🔔 การแจ้งเตือนระบบ</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border-b py-3 px-4">ID</th>
                        <th class="border-b py-3 px-4">ผู้ยื่นคำร้อง</th>
                        <th class="border-b py-3 px-4">หัวข้อ</th>
                        <th class="border-b py-3 px-4">ประเภท</th>
                        <th class="border-b py-3 px-4">รายละเอียด</th>
                        <th class="border-b py-3 px-4">สถานะปัจจุบัน</th>
                        <th class="border-b py-3 px-4 text-center">พิจารณาคำร้อง</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                    <tr class="hover:bg-gray-50">
                        <td class="border-b py-3 px-4">{{ $request->id }}</td>
                        <td class="border-b py-3 px-4 font-semibold text-blue-600">{{ $request->user->name ?? 'พนักงาน' }}</td>
                        <td class="border-b py-3 px-4 font-medium">{{ $request->title }}</td>
                        <td class="border-b py-3 px-4">{{ $request->type }}</td>
                        <td class="border-b py-3 px-4 text-gray-600 text-sm">{{ $request->description ?? '-' }}</td>
                        <td class="border-b py-3 px-4">
                            @if($request->status === 'approved')
                                <span class="px-2 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800">อนุมัติแล้ว</span>
                            @elseif($request->status === 'rejected')
                                <span class="px-2 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">ปฏิเสธแล้ว</span>
                            @else
                                <span class="px-2 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">รอดำเนินการ</span>
                            @endif
                        </td>
                        <td class="border-b py-3 px-4 text-center">
                            @if($request->status === 'pending')
                                <div class="flex items-center justify-center space-x-2">
                                    <form action="{{ route('approval-requests.update', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="px-3 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700 font-semibold shadow">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('approval-requests.update', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 font-semibold shadow">
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
                        <td colspan="7" class="border-b py-6 text-center text-gray-500">
                            ไม่มีคำร้องขอรอการพิจารณาในระบบ
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>