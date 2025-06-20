@extends('layouts.admin')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kategoriya yaratish</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Bosh sahifa</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategoriyalar</a></li>
                            <li class="breadcrumb-item">Yaratish</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Yaratish</button>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Kategoriya ma'lumotlari</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane fade show active" id="uzContent">
                                            <div class="form-group pb-3">
                                                <label for="name">Nomi</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="day">Kun</label>
                                                <select class="form-control" id="day" name="day">
                                                    <option value="">Tanlanmagan</option>
                                                    <option value="1" {{ old('day') == '1' ? 'selected' : '' }}>Dushanba</option>
                                                    <option value="2" {{ old('day') == '2' ? 'selected' : '' }}>Seshanba</option>
                                                    <option value="3" {{ old('day') == '3' ? 'selected' : '' }}>Chorshanba</option>
                                                    <option value="4" {{ old('day') == '4' ? 'selected' : '' }}>Payshanba</option>
                                                    <option value="5" {{ old('day') == '5' ? 'selected' : '' }}>Juma</option>
                                                    <option value="6" {{ old('day') == '6' ? 'selected' : '' }}>Shanba</option>
                                                    <option value="7" {{ old('day') == '7' ? 'selected' : '' }}>Yakshanba</option>
                                                </select>
                                                @error('day')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Изображение продукта</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
@endsection
