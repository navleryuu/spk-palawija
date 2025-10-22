# 🌾 SPK Palawija – Sistem Pendukung Keputusan Seleksi Benih Palawija

**SPK Palawija** adalah sistem berbasis web untuk membantu Dinas Pertanian dalam **menentukan benih palawija terbaik** (jagung, kedelai, kacang tanah, kacang hijau) menggunakan kombinasi **metode MOORA dan ORESTE**.  
Dibangun dengan **Laravel 12**, sistem ini mengoptimalkan proses seleksi agar lebih **objektif, cepat, dan akurat**.

---

## 🚀 Fitur Utama
- Input data alternatif benih dan nilai kriteria
- Pembobotan kriteria dengan metode **MOORA**
- Perangkingan akhir menggunakan metode **ORESTE**
- Tampilan rekomendasi benih terbaik
- Sistem berbasis web, mudah digunakan, dan open source

---

## 🧩 Teknologi yang Digunakan
- **Laravel 12**
- **PHP 8+**
- **MySQL 8+**
- **HTML / CSS / Blade**
- **XAMPP / Apache**
- **Composer**

---

## ⚙️ Instalasi & Setup
```bash
1. Clone repositori
git clone https://github.com/navleryuu/spk-palawija.git
cd spk-palawija

# Install dependensi
composer install

# Duplikat file konfigurasi
cp .env.example .env

# Generate key aplikasi
php artisan key:generate

# Atur koneksi database di file .env lalu jalankan migrasi
php artisan migrate

 Jalankan server lokal
php artisan serve
Lalu buka di browser:
👉 http://localhost:8000

🧠 Konsep Algoritma

MOORA (Multi-Objective Optimization Ratio Analysis)
Normalisasi matriks → Pembobotan → Hitung nilai preferensi (Si)

ORESTE (Organization, Ranking and Synthesis of Relational Data)
Mengurutkan hasil MOORA → menghitung rata-rata ranking → menentukan perangkingan final
