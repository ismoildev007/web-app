@extends('layouts.auth')

@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Login</h2>
                        <form id="auth-form" action="{{ route('authenticate') }}" method="post" class="w-100 mt-4 pt-2">
                            @csrf
                            <input type="text" hidden="hidden" name="role" value="0">
                            <div class="mb-4">
                                <input id="email-field" type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div id="password-field" class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>

                            <div class="mt-4 mb-3">
                                <button type="submit" class="btn btn-lg btn-primary w-100" onclick="checkEmail()">Login </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
