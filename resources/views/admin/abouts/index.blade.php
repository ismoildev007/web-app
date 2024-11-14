@extends('layouts.admin')
@section('title', 'Список о нас')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список о нас</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">О нас</li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="px-2 py-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="bold">О нас</h4>
                                        <div class="">
                                            <div class="dataTables_filter">
                                                <a href="{{ route('abouts.create') }}" class="btn btn-sm btn-primary">Добавить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="aboutList">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Название (УЗ)</th>
                                            <th>Название (РУ)</th>
                                            <th>Название (АН)</th>
                                            <th>Описание (УЗ)</th>
                                            <th>Описание (РУ)</th>
                                            <th>Описание (АН)</th>
                                            <th>Изображение</th>
                                            <th class="text-end">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($abouts as $about)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $about->name_uz }}</td>
                                                <td>{{ $about->name_ru }}</td>
                                                <td>{{ $about->name_en }}</td>
                                                <td>{{ Str::limit($about->description_uz, 50) }}</td>
                                                <td>{{ Str::limit($about->description_ru, 50) }}</td>
                                                <td>{{ Str::limit($about->description_en, 50) }}</td>
                                                <td>
                                                    @if ($about->image)
                                                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->name_en }}" width="50">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('abouts.show', $about->id) }}" class="avatar-text avatar-md d-none">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <a href="{{ route('abouts.edit', $about->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-edit-3"></i>
                                                        </a>
                                                        <form action="{{ route('abouts.destroy', $about->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="avatar-text avatar-md" onclick="return confirm('Are you sure?')">
                                                                <i class="feather feather-trash-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
