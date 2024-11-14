@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Просмотр кандидата</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                        <li class="breadcrumb-item">Кандидаты</li>
                        <li class="breadcrumb-item active">Просмотр</li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card stretch">
                            <div class="card-header">
                                <h5 class="card-title">Детали кандидата</h5>
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
                                    @foreach (['uz' => 'O\'zbekcha', 'en' => 'English', 'ru' => 'Русский'] as $lang => $label)
                                        <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="{{ $lang }}Content">
                                            <div class="form-group pb-3">
                                                <label for="content_{{ $lang }}">Содержимое ({{ strtoupper($lang) }}):</label>
                                                <div id="editor_{{ $lang }}" style="height:400px;">
                                                    {!! nl2br(e($candidant->{'content_' . $lang})) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card stretch">
                            <div class="card-header">
                                <h5 class="card-title">Дополнительные данные кандидата</h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group pb-3">
                                    <label for="status">Статус:</label>
                                    <p>{{ ucfirst($candidant->status) }}</p>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="name">Имя кандидата :</label>
                                    <p>{{ $candidant->name }}</p>
                                </div>

                                <div class="form-group pb-3">
                                    <label for="email">Email :</label>
                                    <p>{{ $candidant->email }}</p>
                                </div>

                                <div class="form-group pb-3">
                                    <label for="phone">Телефон:</label>
                                    <p>{{ $candidant->phone }}</p>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="vacancy_id">Вакансия:</label>
                                    <p>{{ $candidant->vacancy->name_ru }}</p>
                                </div>

                                <div class="form-group pb-3">
                                    <label for="resume_file">Резюме:</label>
                                    @if($candidant->resume_file)
                                        <div>
                                            <a href="{{ Storage::url($candidant->resume_file) }}" target="_blank">Посмотреть резюме</a>
                                        </div>
                                    @else
                                        <p>Резюме не загружено</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

