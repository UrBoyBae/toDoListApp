@extends('layouts.app')

@section('app')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-5xl bg-white shadow-xl rounded-lg flex overflow-hidden h-[550px]">
            <!-- Gambar Login -->
            <div class="w-1/2 relative hidden md:block">
                <img id="backdrop" src="{{ asset('assets/image/backdrop-light.jpg') }}" alt="Login Image"
                    class="object-cover w-full h-full rounded-l-lg">
                <div class="absolute inset-0 backdrop-blur-sm bg-[rgba(29,29,65,0.1)] rounded-l-lg"></div>
            </div>

            <!-- Form -->
            @yield('form_auth')
        </div>
    </div>
@endsection
