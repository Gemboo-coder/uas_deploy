@extends('layout.layout')

@section('konten')
<style>
    .login-container {
        min-height: 70vh;
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
    }
    .login-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .login-header {
        background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }
    .login-body {
        padding: 40px;
        background: white;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #dee2e6;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25 margin-bottom: rgba(13, 110, 253, 0.1);
    }
    .btn-login {
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: 0.3s;
    }
    .btn-login:hover {
        transform: translateY(-2px);
    }
</style>

<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="login-card">
                    <div class="login-header">
                        <h4 class="fw-bold mb-0">NusaTrip Admin</h4>
                        <small class="opacity-75">Silakan login untuk mengelola destinasi</small>
                    </div>
                    <div class="login-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="admin@example.com" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label small fw-bold text-muted text-uppercase">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 btn-login">
                                    MASUK SEKARANG
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="text-decoration-none small text-muted">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Website
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4 text-muted small">&copy; 2026 NusaTrip Administrator</p>
            </div>
        </div>
    </div>
</div>
@endsection