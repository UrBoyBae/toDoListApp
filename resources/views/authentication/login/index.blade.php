@extends('layouts.auth')

@section('form_auth')
    <div class="w-full md:w-1/2 p-8 flex flex-col">
        <div class="text-right text-sm font-semibold text-gray-700 dark:text-gray-300 mb-10">
            Habitra App
        </div>

        <div class="flex flex-col gap-2 items-center text-center mb-8 px-14">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Log In</h2>
            <p class="text-sm text-gray-600 dark:text-gray-300">Don't forget to enter the appropriate username and password
            </p>
        </div>

        <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-5 px-12">
            @csrf
            <div id="wrap-username"
                class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md transition-all">
                <i id="user-icon" class="uil uil-user text-gray-600 dark:text-gray-300 transition-colors"></i>
                <input type="text" name="username" id="username" placeholder="Username" required autocomplete="off"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>
            <div id="wrap-password"
                class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md transition-all">
                <i id="pass-icon" class="uil uil-padlock text-gray-600 dark:text-gray-300 transition-colors"></i>
                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>
            @if (session('loginError'))
                <p class="text-sm text-red-600 font-medium">*{{ session('loginError') }}</p>
            @endif
            <div class="flex items-center flex-col gap-5">
                <button type="submit"
                    class="w-full mt-10 py-2 px-4 bg-[#6359e9] text-white rounded-md font-semibold uppercase hover:bg-white hover:text-[#6359e9] hover:outline-2 hover:outline-[#6359e9] transition duration-300">
                    Log In
                </button>
                <p class="text-xs">
                    Anda tidak memiliki akun ? <a href="{{ route('register.index') }}" class="text-xs font-bold underline text-[#6359e9]">Sign up</a>
                </p>
            </div>
        </form>

        <p class="text-xs text-gray-500 mt-8 text-center">&copy; 2023 Habitra App. All Rights Reserved</p>
    </div>

    <script>
        // Ganti gambar backdrop sesuai tema
        const backdrop = document.getElementById('backdrop');
        const getTheme = localStorage.getItem('theme');

        if (getTheme === 'dark') {
            document.documentElement.classList.add('dark');
            backdrop.src = "{{ asset('assets/image/backdrop.jpg') }}";
        } else {
            document.documentElement.classList.remove('dark');
            backdrop.src = "{{ asset('assets/image/backdrop-light.jpg') }}";
        }

        // Border dan icon berubah saat input
        const inputName = document.getElementById("username");
        const inputPass = document.getElementById("password");

        const wrapName = document.getElementById("wrap-username");
        const wrapPass = document.getElementById("wrap-password");

        const iconName = document.getElementById("user-icon");
        const iconPass = document.getElementById("pass-icon");

        inputName.addEventListener("input", () => {
            wrapName.classList.replace("border-gray-300", "border-[#6359E9]");
            iconName.classList.replace("text-gray-600", "text-[#6359E9]");
        });

        inputPass.addEventListener("input", () => {
            wrapPass.classList.replace("border-gray-300", "border-[#6359E9]");
            iconPass.classList.replace("text-gray-600", "text-[#6359E9]");
        });
    </script>
@endsection
