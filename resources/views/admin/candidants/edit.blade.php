@extends('layouts.admin')

@section('content')
    <form action="{{ route('candidants.update', $candidant->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать кандидата</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                            <li class="breadcrumb-item">Кандидаты</li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        </ul>
                    </div>
                    <div class="page-header-right ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary">Сохранить изменения</button>
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
                                                    <div id="editor_{{ $lang }}" style="height:400px;">{!! old('content_' . $lang, $candidant->{'content_' . $lang}) !!}</div>
                                                    <input type="hidden" id="text_{{ $lang }}" name="content_{{ $lang }}">
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
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="pending" {{ old('status', $candidant->status) == 'pending' ? 'selected' : '' }}>Ожидает</option>
                                            <option value="approved" {{ old('status', $candidant->status) == 'approved' ? 'selected' : '' }}>Одобрено</option>
                                            <option value="rejected" {{ old('status', $candidant->status) == 'rejected' ? 'selected' : '' }}>Отклонено</option>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="name">Имя кандидата :</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $candidant->name) }}" required>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="email">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $candidant->email) }}" required>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="phone">Телефон:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $candidant->phone) }}" required>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label for="vacancy_id">Вакансия:</label>
                                        <select class="form-control" id="vacancy_id" name="vacancy_id" required>
                                            @foreach ($vacancies as $vacancy)
                                                <option value="{{ $vacancy->id }}" {{ old('vacancy_id', $candidant->vacancy_id) == $vacancy->id ? 'selected' : '' }}>{{ $vacancy->name_ru }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group pb-3">
                                        <label for="resume_file">Резюме:</label>
                                        <input type="file" class="form-control" id="resume_file" name="resume_file">
                                        @if($candidant->resume_file)
                                            <div class="mt-2">
                                                <strong>Текущее резюме:</strong> <a href="{{ Storage::url($candidant->resume_file) }}" target="_blank">Посмотреть</a>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script>
        var editors = {
            'uz': new Quill('#editor_uz', { theme: 'snow' }),
            'en': new Quill('#editor_en', { theme: 'snow' }),
            'ru': new Quill('#editor_ru', { theme: 'snow' })
        };

        function updateEditorContent() {
            for (const [lang, editor] of Object.entries(editors)) {
                document.getElementById('text_' + lang).value = editor.root.innerHTML;
            }
        }

        document.querySelector('form').addEventListener('submit', function(event){
            updateEditorContent();
        });
    </script>
@endsection
