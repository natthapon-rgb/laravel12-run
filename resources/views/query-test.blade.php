<!DOCTYPE html>
<html lang="en">
<head>
    ...
</head>
<body>
    <div class="container my-5">
        ...
    </div>
   
    <style>
        /* เพิ่มปุ่มลอย */
        .floating-btn {
            position: fixed; bottom: 50px; right: 50px; z-index: 9999; /* ให้ปุ่มลอยอยู่เหนือทุกวัตถุ */ background-color: #007bff; line-height: 1; color: white; font-size: 50px; font-weight: 900; border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align : center;
        }
        .floating-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- ปุ่ม + ที่ลอยอยู่ -->
    <a href="{{ route('product.form') }}"> <div class="floating-btn py-auto pb-2"> + </div> </a>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
