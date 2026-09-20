<x-layouts.weight title="รายการน้ำหนัก">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">📋 รายการบันทึกน้ำหนัก</h3>
        <a href="{{ route('weights.create') }}" class="btn btn-primary">
            + เพิ่มข้อมูลน้ำหนัก
        </a>
    </div>

    {{-- กราฟแสดงแนวโน้มน้ำหนัก --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">📈 กราฟแนวโน้มน้ำหนัก</h5>
            @if($weights->count() > 0)
                <div id="weight_chart" style="width: 100%; height: 350px;"></div>
            @else
                <p class="text-muted mb-0">ยังไม่มีข้อมูลสำหรับแสดงกราฟ</p>
            @endif
        </div>
    </div>

    {{-- ตารางข้อมูล --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>วันที่บันทึก</th>
                            <th>น้ำหนัก (กก.)</th>
                            <th>บันทึกเพิ่มเติม</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($weights as $index => $w)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $w->recorded_date->format('d/m/Y') }}</td>
                                <td><span class="badge bg-info text-dark">{{ $w->weight_kg }} กก.</span></td>
                                <td>{{ $w->note ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('weights.edit', $w->id) }}"
                                       class="btn btn-sm btn-warning">แก้ไข</a>

                                    <form action="{{ route('weights.destroy', $w->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('ยืนยันการลบข้อมูลนี้หรือไม่?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    ยังไม่มีข้อมูลน้ำหนัก
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        @if($weights->count() > 0)
        <script>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'วันที่');
                data.addColumn('number', 'น้ำหนัก (กก.)');

                data.addRows(@json($chartData));

                var options = {
                    title: 'แนวโน้มน้ำหนักตามช่วงเวลา',
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    colors: ['#0d6efd'],
                    pointSize: 6,
                    hAxis: { title: 'วันที่' },
                    vAxis: { title: 'น้ำหนัก (กก.)' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('weight_chart'));
                chart.draw(data, options);
            }

            // ทำให้กราฟ responsive เมื่อปรับขนาดหน้าจอ
            window.addEventListener('resize', drawChart);
        </script>
        @endif
    </x-slot>

</x-layouts.weight>