<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Do'kon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: transparent;
        }

        .category-card {
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .category-card:active {
            transform: scale(0.95);
        }

        .category-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .bg-blue-custom { background-color: #3b82f6; }
        .bg-pink-custom { background-color: #ec4899; }
        .bg-green-custom { background-color: #10b981; }
        .bg-purple-custom { background-color: #8b5cf6; }
        .bg-orange-custom { background-color: #f59e0b; }
        .bg-red-custom { background-color: #ef4444; }
    </style>
</head>
<body>
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-6 fw-bold text-dark mb-2">Chef Diet - sog'lom oziq-ovqat yetkazib berish!</h1>
        <p class="text-muted">( O'z kategoriyangizni tanlang! )</p>
    </div>

    <!-- Categories Grid -->
    <div class="row g-3 justify-content-center">
{{--        <div class="col-6 col-md-4 col-lg-3">--}}
{{--            <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer" onclick="goToCategory('elektronika')">--}}
{{--                <div class="category-icon bg-blue-custom">--}}
{{--                    <i class="fas fa-mobile-alt text-white fs-5"></i>--}}
{{--                </div>--}}
{{--                <h6 class="fw-semibold text-dark mb-0">Elektronika</h6>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-md-4 col-lg-3">--}}
{{--            <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer" onclick="goToCategory('kiyim')">--}}
{{--                <div class="category-icon bg-pink-custom">--}}
{{--                    <i class="fas fa-tshirt text-white fs-5"></i>--}}
{{--                </div>--}}
{{--                <h6 class="fw-semibold text-dark mb-0">Kiyim</h6>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-md-4 col-lg-3">--}}
{{--            <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer" onclick="goToCategory('uy-rozgor')">--}}
{{--                <div class="category-icon bg-green-custom">--}}
{{--                    <i class="fas fa-home text-white fs-5"></i>--}}
{{--                </div>--}}
{{--                <h6 class="fw-semibold text-dark mb-0">Uy-ro'zg'or</h6>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-md-4 col-lg-3">--}}
{{--            <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer" onclick="goToCategory('oyinlar')">--}}
{{--                <div class="category-icon bg-purple-custom">--}}
{{--                    <i class="fas fa-gamepad text-white fs-5"></i>--}}
{{--                </div>--}}
{{--                <h6 class="fw-semibold text-dark mb-0">O'yinlar</h6>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-6 col-md-4 col-lg-3">--}}
{{--            <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer" onclick="goToCategory('kitoblar')">--}}
{{--                <div class="category-icon bg-orange-custom">--}}
{{--                    <i class="fas fa-book text-white fs-5"></i>--}}
{{--                </div>--}}
{{--                <h6 class="fw-semibold text-dark mb-0">Kitoblar</h6>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- resources/views/categories.blade.php -->
        @foreach ($categories as $category)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('category.show', $category->slug) }}" class="text-decoration-none">
                    <div class="category-card bg-white rounded-4 p-4 text-center cursor-pointer">
                        <div class="category-icon mb-2">
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px; object-fit: contain; border-radius: 10px">
                            @else
                                <span class="text-muted">Rasm yo‘q</span>
                            @endif
                        </div>
                        <h6 class="fw-semibold text-dark mb-0">{{ $category->name }}</h6>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Bottom spacing for Telegram -->
    <div style="height: 80px;"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function goToCategory(categorySlug) {
        window.location.href = `category.html?category=${categorySlug}`;
    }
</script>
</body>
</html>
