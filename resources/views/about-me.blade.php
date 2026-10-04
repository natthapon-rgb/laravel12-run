<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 680px;">
        <!-- 1. ข้อมูลส่วนบุคคล (3 คะแนน) -->
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body text-center p-4">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="rounded-circle mb-3 border border-3 border-primary" style="width: 150px; height: 150px; object-fit: cover;">
                <h3 class="fw-bold mb-1">[นายณัฐพล พรมอุ่น]</h3>
                <p class="text-secondary fs-5 mb-0">รหัสนักศึกษา: [68222420001]</p>
            </div>
        </div>

        <!-- 2. ลิงก์งานที่เคยทำ (12 คะแนน) -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold">รายการผลงานที่เคยทำ</h5>
            </div>
            <div class="list-group list-group-flush">
                <!-- EP02 Hero -->
                <a href="{{ url('/gallery') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong>EP02 Hero</strong>
                        <div class="text-muted small">/gallery</div>
                    </div>
                    <span class="btn btn-outline-primary btn-sm">ดูงาน</span>
                </a>

                <!-- EP03 Active Bootstrap -->
                <a href="{{ url('/active/index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong>EP03 Active Bootstrap</strong>
                        <div class="text-muted small">/active/index</div>
                    </div>
                    <span class="btn btn-outline-primary btn-sm">ดูงาน</span>
                </a>

                <!-- EP07 Weight -->
                <a href="{{ url('/weights') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong>EP07 Weight</strong>
                        <div class="text-muted small">/weights (ติด Auth)</div>
                    </div>
                    <span class="btn btn-outline-warning btn-sm">ดูงาน</span>
                </a>

                <!-- EP08 Auth -->
                <a href="{{ url('/login') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    <div>
                        <strong>EP08 Auth</strong>
                        <div class="text-muted small">ปุ่ม Login</div>
                    </div>
                    <span class="btn btn-danger btn-sm">Login</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>