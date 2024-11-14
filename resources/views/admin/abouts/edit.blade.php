@extends('layouts.admin')

@section('content')
    <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data" novalidate class="needs-validation" onsubmit="updateEditorContent()">
        @csrf
        @method('PUT')

        <main class="nxl-container">
            <div class="nxl-content">
                <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Редактировать О нас</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Главная</a></li>
                            <li class="breadcrumb-item">О нас</li>
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
                                    <h5 class="card-title">Детали О нас</h5>
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
                                                <label for="name_uz">Название (UZ):</label>
                                                <input type="text" class="form-control" id="name_uz" name="name_uz" value="{{ old('name_uz', $about->name_uz) }}" required>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="description_uz">Описание (UZ):</label>
                                                <textarea class="form-control" id="description_uz" name="description_uz" rows="3">{{ old('description_uz', $about->description_uz) }}</textarea>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="content_uz">Содержимое (UZ):</label>
                                                <div id="editor_uz" style="height:400px;">{!! old('content_uz', $about->content_uz) !!}</div>
                                                <input type="hidden" id="text_uz" name="content_uz">
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="enContent">
                                            <div class="form-group pb-3">
                                                <label for="name_en">Название (EN):</label>
                                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $about->name_en) }}" required>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="description_en">Описание (EN):</label>
                                                <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en', $about->description_en) }}</textarea>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="content_en">Содержимое (EN):</label>
                                                <div id="editor_en" style="height:400px;">{!! old('content_en', $about->content_en) !!}</div>
                                                <input type="hidden" id="text_en" name="content_en">
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="ruContent">
                                            <div class="form-group pb-3">
                                                <label for="name_ru">Название (RU):</label>
                                                <input type="text" class="form-control" id="name_ru" name="name_ru" value="{{ old('name_ru', $about->name_ru) }}" required>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="description_ru">Описание (RU):</label>
                                                <textarea class="form-control" id="description_ru" name="description_ru" rows="3">{{ old('description_ru', $about->description_ru) }}</textarea>
                                            </div>

                                            <div class="form-group pb-3">
                                                <label for="content_ru">Содержимое (RU):</label>
                                                <div id="editor_ru" style="height:400px;">{!! old('content_ru', $about->content_ru) !!}</div>
                                                <input type="hidden" id="text_ru" name="content_ru">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card stretch">
                                <div class="card-header">
                                    <h5 class="card-title">Изображение О нас</h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="form-group pb-3">
                                        <label for="image">Изображение:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if($about->image)
                                            <div class="mt-3">
                                                <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" style="width: 100%; max-height: 300px;">
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
        var editorUz = new Quill('#editor_uz', { theme: 'snow' });
        var editorEn = new Quill('#editor_en', { theme: 'snow' });
        var editorRu = new Quill('#editor_ru', { theme: 'snow' });

        editorUz.root.innerHTML = `{!! old('content_uz', $about->content_uz) !!}`;
        editorEn.root.innerHTML = `{!! old('content_en', $about->content_en) !!}`;
        editorRu.root.innerHTML = `{!! old('content_ru', $about->content_ru) !!}`;

        function updateEditorContent() {
            document.getElementById('text_uz').value = editorUz.root.innerHTML;
            document.getElementById('text_en').value = editorEn.root.innerHTML;
            document.getElementById('text_ru').value = editorRu.root.innerHTML;
        }

        document.querySelector('form').addEventListener('submit', function(event){
            updateEditorContent();
        });
    </script>
@endsection
