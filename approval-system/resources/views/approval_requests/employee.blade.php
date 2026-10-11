<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าพนักงาน - ระบบจัดการคำร้องขออนุมัติ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">👨‍💻 หน้าพนักงาน (ส่งและติดตามคำร้องขอ)</h2>
                <p class="text-sm text-gray-600">ผู้ใช้งานปัจจุบัน: <span class="font-semibold text-blue-600">{{ session('user_name', 'พนักงาน') }}</span></p>
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

        <div class="mb-6">
            <a href="{{ route('approval-requests.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                + สร้างคำร้องขอใหม่
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border-b py-3 px-4">ID</th>
                        <th class="border-b py-3 px-4">หัวข้อ</th>
                        <th class="border-b py-3 px-4">ประเภท</th>
                        <th class="border-b py-3 px-4">รายละเอียด</th>
                        <th class="border-b py-3 px-4">สถานะการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                    <tr class="hover:bg-gray-50">
                        <td class="border-b py-3 px-4">{{ $request->id }}</td>
                        <td class="border-b py-3 px-4 font-medium">{{ $request->title }}</td>
                        <td class="border-b py-3 px-4">{{ $request->type }}</td>
                        <td class="border-b py-3 px-4 text-gray-600 text-sm">{{ $request->description ?? '-' }}</td>
                        <td class="border-b py-3 px-4">
                            @if($request->status === 'approved')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800">✅ อนุมัติแล้ว</span>
                            @elseif($request->status === 'rejected')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">❌ ถูกปฏิเสธ</span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">⏳ รอดำเนินการ</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="border-b py-6 text-center text-gray-500">
                            คุณยังไม่มีรายการคำร้องขออนุมัติ
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>