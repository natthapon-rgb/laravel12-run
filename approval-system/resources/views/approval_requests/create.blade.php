<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างคำร้องขอใหม่</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">สร้างคำร้องขออนุมัติใหม่</h2>

        <form action="{{ route('approval-requests.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">หัวข้อคำร้องขอ</label>
                <input type="text" name="title" required class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">ประเภทคำร้อง</label>
                <select name="type" required class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="ขอลาหยุด">ขอลาหยุด</option>
                    <option value="ขอดำเนินการเอกสาร">ขอดำเนินการเอกสาร</option>
                    <option value="ขอเบิกงบประมาณ">ขอเบิกงบประมาณ</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">รายละเอียดเพิ่มเติม</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold">
                    บันทึกคำร้องขอ
                </button>
               <a href="{{ route('employee.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 font-semibold">
    ยกเลิก
</a>
            </div>
        </form>
    </div>
</body>
</html>