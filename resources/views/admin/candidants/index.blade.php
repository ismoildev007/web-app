@extends('layouts.admin')
@section('title', 'Список кандидатов')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Список кандидатов</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admins.dashboard') }}">Главная</a></li>
                        <li class="breadcrumb-item">Кандидаты</li>
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
                                        <h4 class="bold">Кандидаты</h4>
                                        <div class="">
                                            <div class="dataTables_filter">
                                                <a href="{{ route('candidants.create') }}" class="btn btn-sm btn-primary">Добавить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="candidantList">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Вакансия</th>
                                            <th>Имя</th>
                                            <th>Email</th>
                                            <th>Телефон</th>
                                            <th>Статус</th>
                                            <th class="text-end">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($candidants as $candidant)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $candidant->vacancy->title_en ?? 'Не указана' }}</td>
                                                <td>{{ $candidant->name }}</td>
                                                <td>{{ $candidant->email }}</td>
                                                <td>{{ $candidant->phone }}</td>
                                                <td>{{ $candidant->status }}</td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('candidants.show', $candidant->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <a href="{{ route('candidants.edit', $candidant->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather feather-edit-3"></i>
                                                        </a>
                                                        <form action="{{ route('candidants.destroy', $candidant->id) }}" method="POST" style="display: inline-block;">
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
