<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'ระบบติดตามน้ำหนักร่างกาย' }}</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        body { background-color: #f4f6f9; }
        .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('weights.index') }}">
                ⚖️ ระบบติดตามน้ำหนักร่างกาย
            </a>
        </div>
    </nav>

    <div class="container mb-5">

        {{-- แจ้งเตือนสำเร็จ --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- แจ้งเตือนลบสำเร็จ / อื่น ๆ --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{ $slot }}

    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{ $scripts ?? '' }}

</body>
</html>