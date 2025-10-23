<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Palawija</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-50 text-gray-800 font-sans">

    <!-- Container Utama -->
    <div class="min-h-screen flex flex-col justify-between">

        <!-- Header (Logo kiri atas) -->
       <header class="flex items-center gap-3 px-10 lg:px-28 pt-8">
            <img src="{{ asset('images/logo-dinas.png') }}" alt="Logo Dinas Pertanian" class="w-10 h-10">
            <h1 class="text-green-800 text-lg font-semibold leading-tight">
                UPTD Benih Induk Palawija Tanjung Selamat
            </h1>
        </header>

        <!-- Konten Tengah -->
        <main class="flex flex-col lg:flex-row items-center justify-between px-10 lg:px-28 flex-1">
            
            <!-- Kiri: Teks dan Tombol -->
            <div class="max-w-xl text-center lg:text-left space-y-6">
                <h2 class="text-5xl font-extrabold text-green-900">SPK PALAWIJA</h2>
                <p class="text-lg text-gray-600">
                    Optimasi Seleksi Benih dengan Metode 
                    <span class="font-semibold">MOORA & ORESTE</span>
                </p>

                <div class="flex justify-center lg:justify-start gap-4">
                    <a href="{{ route('login', ['role' => 'admin']) }}" 
                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded-full shadow">
                    Login Admin
                    </a>

                    <a href="{{ route('login', ['role' => 'kepala_dinas']) }}" 
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-full shadow">
                    Login Kepala Dinas
                    </a>
                </div>
            </div>

            <!-- Kanan: Gambar Ilustrasi -->
            <div class="mt-12 lg:mt-0">
                <img src="{{ asset('images/logo-orang.png') }}" alt="Petani Ilustrasi" class="w-[700px] mx-auto drop-shadow-xl">

            </div>
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 py-6">
            © 2025 Melva Aliyah Royani Siahaan | Universitas Islam Negeri Sumatera Utara
        </footer>

    </div>

</body>
</html>
