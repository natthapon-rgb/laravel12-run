<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Tracker - บันทึกน้ำหนัก</title>
    <!-- ใช้ Tailwind CSS เพื่อความสวยงาม -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- โหลด Chart.js สำหรับวาดกราฟ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📊 ระบบบันทึกและติดตามน้ำหนัก</h1>
            <a href="{{ route('weights.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                + เพิ่มข้อมูลน้ำหนัก
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- ส่วนแสดงกราฟ -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">กราฟแสดงแนวโน้มน้ำหนัก</h2>
            <canvas id="weightChart" height="100"></canvas>
        </div>

        <!-- ส่วนแสดงตารางข้อมูล -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">ประวัติการบันทึกน้ำหนัก</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ลำดับ</th>
                            <th class="py-3 px-6 text-left">วันที่บันทึก</th>
                            <th class="py-3 px-6 text-left">น้ำหนัก (กก.)</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse($weights as $index => $weight)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($weight->recorded_date)->format('d/m/Y') }}</td>
                                <td class="py-3 px-6 text-left font-semibold text-blue-600">{{ $weight->weight_kg }} กก.</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 text-center text-gray-400">ยังไม่มีข้อมูลการบันทึกน้ำหนัก</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script สำหรับเรนเดอร์กราฟ -->
    <script>
        const rawData = @json($chartData);
        
        // แยกข้อมูลวันที่และน้ำหนักสำหรับ Chart.js
        const labels = rawData.map(item => item[0]);
        const dataValues = rawData.map(item => item[1]);

        const ctx = document.getElementById('weightChart').getContext('2d');
        const weightChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'น้ำหนัก (กิโลกรัม)',
                    data: dataValues,
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 2,
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</body>
</html>