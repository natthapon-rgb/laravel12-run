<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">บันทึกน้ำหนักของฉัน</h1>
        
        <a href="{{ route('weights.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ เพิ่มข้อมูลน้ำหนัก</a>

        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">วันที่บันทึก</th>
                    <th class="border border-gray-300 p-2">น้ำหนัก (กก.)</th>
                    <th class="border border-gray-300 p-2">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($weights as $weight)
                    <tr>
                        <td class="border border-gray-300 p-2 text-center">{{ $weight->recorded_at }}</td>
                        <td class="border border-gray-300 p-2 text-center">{{ $weight->weight }}</td>
                        <td class="border border-gray-300 p-2 text-center">
                            <a href="{{ route('weights.edit', $weight->id) }}" class="text-yellow-600 mr-2">แก้ไข</a>
                            <form action="{{ route('weights.destroy', $weight->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('ต้องการลบใช่หรือไม่?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border border-gray-300 p-4 text-center text-gray-500">ยังไม่มีข้อมูลน้ำหนัก</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>