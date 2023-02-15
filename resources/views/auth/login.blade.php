@extends('layouts.frontend.app')
@section('content')
<br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5" style="background-color: rgb(187, 143, 206, .7); padding: 70px; border-radius: 30px;">
                <div class="mb-4 text-center">
                    <h3>Masuk</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control rounded-0">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Kata Sandi</label>
                        <input type="password" name="password" class="form-control rounded-0">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-right mb-3">
                        {{-- <a href="{{ route('password.request') }}">Lupa Password ?</a> --}}
                        <a href="#">Lupa Password ?</a>
                    </div>
                    <button type="submit" class="site-btn w-100 rounded-0 mb-3">Masuk</button>
                    <div class="text-center">
                        <p>Belum Punya Akun ? <a href="{{ route('register') }}">Daftar Disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
