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
                                                <label for="icon">Ikonka (Font Awesome klassi)</label>
                                                <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}" placeholder="Masalan: fa-mobile-alt">
                                                @error('icon')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="day">Kun</label>
                                                <select class="form-control" id="day" name="day">
                                                    <option value="">Tanlanmagan</option>
                                                    <option value="monday" {{ old('day') == 'monday' ? 'selected' : '' }}>Dushanba</option>
                                                    <option value="tuesday" {{ old('day') == 'tuesday' ? 'selected' : '' }}>Seshanba</option>
                                                    <option value="wednesday" {{ old('day') == 'wednesday' ? 'selected' : '' }}>Chorshanba</option>
                                                    <option value="thursday" {{ old('day') == 'thursday' ? 'selected' : '' }}>Payshanba</option>
                                                    <option value="friday" {{ old('day') == 'friday' ? 'selected' : '' }}>Juma</option>
                                                    <option value="saturday" {{ old('day') == 'saturday' ? 'selected' : '' }}>Shanba</option>
                                                    <option value="sunday" {{ old('day') == 'sunday' ? 'selected' : '' }}>Yakshanba</option>
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
                    </div>
                </div>
            </div>
        </main>
    </form>
@endsection
