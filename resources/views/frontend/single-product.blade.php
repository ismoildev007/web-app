<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name ?? 'Mahsulot' }} - Online Do'kon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .product-image {
            aspect-ratio: 1;
            background-color: #f1f5f9;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #64748b;
            max-width: 100%;
            height: auto;
        }

        .header-sticky {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
<!-- Header -->
<div class="header-sticky">
    <div class="container-fluid">
        <div class="d-flex align-items-center py-3">
            <button class="btn btn-link text-decoration-none p-0 me-3" onclick="goBack()">
                <i class="fas fa-arrow-left text-muted fs-5"></i>
            </button>
{{--            <h5 class="mb-0 fw-semibold">{{ $product->name ?? 'Mahsulot' }}</h5>--}}
            <h5 class="mb-0 fw-semibold">Suvni ichishni unutmaganingiz uchun rahmat!</h5>
        </div>
    </div>
</div>

<!-- Product Details -->
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-6">
            <div class="product-image">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 16px;">
                @else
                    <i class="fas {{ $product->icon ?? 'fa-box' }}"></i>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold text-dark mb-3 mt-3">{{ $product->name }}</h2>
{{--            <div class="d-flex align-items-center mb-3">--}}
{{--                <i class="fas fa-star text-warning me-1" style="font-size: 1rem;"></i>--}}
{{--                <span class="text-muted">{{ $product->rating ?? '4.5' }}</span>--}}
{{--            </div>--}}
{{--            <p class="text-primary fw-bold mb-3 fs-4">{{ number_format($product->price ?? 0) }} so'm</p>--}}'
            <span class="text-muted">Har kuni</span>
            <p class="text-primary fw-bold mb-3 fs-4">Nonushta 09:00 dan 10:00 gacha</p>
            <p class="text-primary fw-bold mb-3 fs-4">Tushlik 12:00 dan 13:00 gacha</p>
            <p class="text-muted mb-4">{{ $product->description ?? 'Mahsulot haqida ma\'lumot yo\'q' }}</p>
            <a href="{{ route('category.show', $product->category->slug) }}" class="text-muted small">
                <i class="fas fa-folder me-1"></i> {{ $product->category->name }}
            </a>
        </div>
    </div>

    <!-- Bottom spacing -->
    <div style="height: 80px;"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function goBack() {
        window.location.href = '{{ route("category.show", $product->category->slug) }}';
    }
</script>
</body>
</html>
