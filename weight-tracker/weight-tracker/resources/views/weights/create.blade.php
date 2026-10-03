<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลน้ำหนัก</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">เพิ่มข้อมูลน้ำหนัก</h1>

        <form action="{{ route('weights.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">น้ำหนัก (กก.):</label>
                <input type="number" step="0.1" name="weight" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">วันที่บันทึก:</label>
                <input type="date" name="recorded_at" class="w-full border border-gray-300 p-2 rounded" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('weights.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">ย้อนกลับ</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">บันทึก</button>
            </div>
        </form>
    </div>
</body>
</html>