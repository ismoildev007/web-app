@extends('layouts.admin')
@section('title', 'Список новостей')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список новостей</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Новости</li>
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
                                        <h4 class="bold">Новости</h4>
                                        <div class="">
                                            <div class="dataTables_filter">
                                                <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Добавить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="newsList">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Заголовок (УЗ)</th>
                                            <th>Заголовок (РУ)</th>
                                            <th>Заголовок (АН)</th>
                                            <th>Дата</th>
                                            <th>Изображение</th>
                                            <th class="text-end">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($news as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title_uz }}</td>
                                                <td>{{ $item->title_ru }}</td>
                                                <td>{{ $item->title_en }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}" width="50">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('news.show', $item->id) }}" class="avatar-text avatar-md d-none">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <a href="{{ route('news.edit', $item->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-edit-3"></i>
                                                        </a>
                                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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
