@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Welcome Admin {{ auth()->user()->full_name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
