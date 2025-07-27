@extends('layouts.auth')

@section('form_auth')
    <div class="w-full md:w-1/2 p-8 flex flex-col">
        <div class="mt-1 flex flex-col gap-2 items-center text-center mb-5 px-14">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Register</h2>
            <p class="text-sm text-gray-600 dark:text-gray-300">Please fill in all fields to create your account</p>
        </div>

        <form method="POST" action="{{ route('register.authenticate') }}" class="space-y-5 px-12">
            @csrf
            <!-- Full Name -->
            <div class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md">
                <i class="uil uil-user text-gray-600 dark:text-gray-300"></i>
                <input type="text" name="name" placeholder="Full Name" required autocomplete="name"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>

            <!-- Username -->
            <div class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md">
                <i class="uil uil-user-circle text-gray-600 dark:text-gray-300"></i>
                <input type="text" name="username" placeholder="Username" required autocomplete="username"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>

            <!-- Email -->
            <div class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md">
                <i class="uil uil-envelope text-gray-600 dark:text-gray-300"></i>
                <input type="email" name="email" placeholder="Email Address" required autocomplete="email"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>

            <!-- Password -->
            <div class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md">
                <i class="uil uil-padlock text-gray-600 dark:text-gray-300"></i>
                <input type="password" name="password" placeholder="Password" required autocomplete="new-password"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>

            <!-- Confirm Password -->
            <div class="flex items-center gap-2 border border-gray-300 dark:border-gray-500 px-4 py-2 rounded-md">
                <i class="uil uil-lock-access text-gray-600 dark:text-gray-300"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    autocomplete="new-password"
                    class="w-full bg-transparent outline-none text-gray-800 dark:text-white placeholder-gray-500">
            </div>

            <!-- Error Handling -->
            @if ($errors->any())
                <div class="text-sm text-red-600 font-medium">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Submit -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#6359e9] text-white rounded-md font-semibold uppercase hover:bg-white hover:text-[#6359e9] hover:outline-2 hover:outline-[#6359e9] transition duration-300">
                Register
            </button>
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
