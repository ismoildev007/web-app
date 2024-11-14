@extends('layouts.admin')

@section('content')
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" novalidate class="needs-validation">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать Контакт</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                            <li class="breadcrumb-item">Контакты</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
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
                                    <h5 class="card-title">Контактная информация</h5>
                                </div>
                                <div class="card-body p-4">
                                    <ul class="nav-tab-items-wrapper nav nav-justified invoice-overview-tab-item">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#uzContent">O'zbekcha</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#enContent">English</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#ruContent">Русский</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pt-3">
                                        <div class="tab-pane fade show active" id="uzContent">
                                            <div class="form-group pb-3">
                                                <label for="address_uz">Адрес (UZ):</label>
                                                <textarea class="form-control" id="address_uz" name="address_uz" rows="2">{{ old('address_uz', $contact->address_uz) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="enContent">
                                            <div class="form-group pb-3">
                                                <label for="address_en">Адрес (EN):</label>
                                                <textarea class="form-control" id="address_en" name="address_en" rows="2">{{ old('address_en', $contact->address_en) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="ruContent">
                                            <div class="form-group pb-3">
                                                <label for="address_ru">Адрес (RU):</label>
                                                <textarea class="form-control" id="address_ru" name="address_ru" rows="2">{{ old('address_ru', $contact->address_ru) }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="phone1">Телефон 1:</label>
                                        <input type="text" class="form-control" id="phone1" name="phone1" value="{{ old('phone1', $contact->phone1) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="phone2">Телефон 2:</label>
                                        <input type="text" class="form-control" id="phone2" name="phone2" value="{{ old('phone2', $contact->phone2) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Социальные сети</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $contact->facebook) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="instagram">Instagram:</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $contact->instagram) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="telegram">Telegram:</label>
                                        <input type="text" class="form-control" id="telegram" name="telegram" value="{{ old('telegram', $contact->telegram) }}">
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="youtube">YouTube:</label>
                                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $contact->youtube) }}">
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
