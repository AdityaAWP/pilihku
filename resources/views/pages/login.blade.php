@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@include('components.header')
<div class="login-container">
    <div class="login-image">
        <!-- Gambar di sebelah kiri -->
    </div>
    <div class="login-form">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>
@endsection
