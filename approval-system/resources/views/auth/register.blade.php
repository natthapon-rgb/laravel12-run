<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ / สมัครใช้งาน</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">เข้าสู่ระบบ / สมัครสมาชิก</h2>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">ชื่อ-นามสกุล</label>
                <input type="text" name="name" required placeholder="เช่น สมชาย ใจดี" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">อีเมล</label>
                <input type="email" name="email" required placeholder="example@email.com" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">เลือกบทบาทผู้ใช้งาน</label>
                <select name="role" required class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="employee">👨‍💻 พนักงาน / ลูกน้อง (ยื่นคำร้องขอ)</option>
                    <option value="manager">🧑‍💼 หัวหน้า / ผู้บริหาร (อนุมัติ / ปฏิเสธ)</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                เข้าสู่ระบบ / เริ่มใช้งาน
            </button>
        </form>
    </div>
</body>
</html>