<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name ?? 'Kategoriya' }} - Online Do'kon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .product-card {
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .product-card:active {
            transform: scale(0.95);
        }

        .product-image {
            aspect-ratio: 1;
            background-color: #f1f5f9;
            border-radius: 16px 16px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #64748b;
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
{{--            <h5 class="mb-0 fw-semibold">{{ $category->name ?? 'Kategoriya' }}</h5>--}}
            <h5 class="mb-0 fw-semibold">Suvni ichishni unutmaganingiz uchun rahmat!</h5>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="container-fluid p-4">
    <div class="row g-3" id="productsContainer">
        @foreach ($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('single.product', $product->id) }}" class="text-decoration-none">
                    <div class="product-card bg-white rounded-4 overflow-hidden cursor-pointer">
                        <div class="product-image">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <i class="fas {{ $product->icon ?? 'fa-box' }}"></i>
                            @endif
                        </div>
                        <div class="p-3">
                            <h6 class="fw-semibold text-dark mb-2 small">{{ $product->name }}</h6>
{{--                            <div class="d-flex align-items-center mb-2">--}}
{{--                                <i class="fas fa-star text-warning me-1" style="font-size: 0.8rem;"></i>--}}
{{--                                <span class="text-muted small">{{ $product->rating ?? '4.5' }}</span>--}}
{{--                            </div>--}}
{{--                            <p class="text-primary fw-bold mb-0">{{ number_format($product->price ?? 0) }} so'm</p>--}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Bottom spacing -->
    <div style="height: 80px;"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function goBack() {
        window.location.href = '{{ route("categories") }}';
    }
</script>
</body>
</html>
