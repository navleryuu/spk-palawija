<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SPK Palawija</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-50 font-sans text-gray-800">

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-3xl overflow-hidden w-full max-w-6xl">

            {{-- Kiri: Deskripsi Sistem --}}
            <div class="bg-green-200 flex flex-col justify-center items-center md:w-1/2 p-14 text-center">
                <h2 class="text-4xl font-extrabold text-green-900 mb-4 leading-tight">
                    SISTEM PENDUKUNG KEPUTUSAN
                </h2>
                <p class="text-2xl text-green-800 font-semibold">
                    Seleksi Benih Palawija
                </p>
                <img src="{{ asset('images/logo-orang.png') }}" alt="Ilustrasi Petani" 
                     class="mt-10 w-64 md:w-80 drop-shadow-lg">
            </div>

            {{-- Kanan: Form Login --}}
            <div class="md:w-1/2 p-14 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-green-800 text-center mb-10 tracking-wide">
                    LOGIN {{ strtoupper(str_replace('_', ' ', $role)) }}
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-6 text-center text-lg">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role }}">

                    {{-- Input NIP --}}
                    <div>
                        <label for="nip" class="block text-lg font-semibold text-gray-700 mb-2">NIP</label>
                        <input type="text" name="nip" id="nip" placeholder="Masukkan NIP"
                            class="mt-1 block w-full text-lg border-gray-300 rounded-xl shadow-sm focus:border-green-600 focus:ring-green-500 px-4 py-3">
                    </div>

                    {{-- Input Password + Icon Mata --}}
                    <div>
                        <label for="password" class="block text-lg font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Masukkan Password"
                                class="mt-1 block w-full text-lg border-gray-300 rounded-xl shadow-sm focus:border-green-600 focus:ring-green-500 px-4 py-3 pr-12">
                            
                            {{-- Tombol Mata --}}
                            <button type="button" id="togglePassword" 
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-green-600">
                                {{-- SVG icon mata --}}
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.364 4.5 12 4.5c4.636 0 8.577 3.01 9.964 7.183.07.207.07.432 0 .639C20.577 16.49 16.636 19.5 12 19.5c-4.636 0-8.577-3.01-9.964-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="text-center pt-6">
                        <button type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white text-lg font-semibold px-10 py-3 rounded-full shadow-md transition-all duration-200">
                            Masuk Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script toggle password --}}
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const isHidden = password.getAttribute('type') === 'password';
            password.setAttribute('type', isHidden ? 'text' : 'password');

            // Ganti ikon mata (open/close)
            eyeIcon.innerHTML = isHidden
                ? `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.95 12c1.563 3.942 5.294 6.75 10.05 6.75 1.872 0 3.63-.46 5.17-1.276M9.53 9.53A3 3 0 0114.47 14.47M9.53 9.53L3 3m6.53 6.53l4.94 4.94m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.364 4.5 12 4.5c4.636 0 8.577 3.01 9.964 7.183.07.207.07.432 0 .639C20.577 16.49 16.636 19.5 12 19.5c-4.636 0-8.577-3.01-9.964-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;
        });
    </script>
</body>
</html>
