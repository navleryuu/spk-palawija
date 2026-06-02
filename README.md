# 🌬️ Sistem Informasi Prediksi Kecepatan Angin Berbasis Web

Sistem informasi berbasis web yang digunakan untuk melakukan prediksi kecepatan angin menggunakan metode Prophet. Sistem ini membantu pengguna dalam memantau data historis dan hasil prediksi kecepatan angin secara visual melalui dashboard interaktif.

## 📌 Latar Belakang

Prediksi kecepatan angin merupakan salah satu informasi penting dalam berbagai sektor, seperti transportasi, pelayaran, penerbangan, dan mitigasi cuaca. Sistem ini dikembangkan untuk mempermudah proses analisis dan prediksi data kecepatan angin menggunakan metode Prophet.

## 🎯 Tujuan

- Menampilkan data historis kecepatan angin.
- Melakukan prediksi kecepatan angin menggunakan metode Prophet.
- Menyajikan hasil prediksi dalam bentuk grafik dan tabel.
- Membantu pengguna dalam memantau tren kecepatan angin.

## 🛠️ Teknologi yang Digunakan

### Backend
- Laravel 11
- PHP 8.x
- MySQL

### Forecasting
- Python
- Prophet
- Pandas
- NumPy

### Frontend
- Bootstrap 5
- Chart.js

## ✨ Fitur Sistem

- Dashboard Monitoring
- Manajemen Data Kecepatan Angin
- Import Data CSV
- Prediksi Kecepatan Angin
- Visualisasi Grafik Aktual dan Prediksi
- Riwayat Prediksi
- Manajemen Pengguna

## 📊 Metode Forecasting

Metode yang digunakan adalah **Prophet**, yang mampu menangani:

- Trend
- Seasonality
- Missing Value
- Data Time Series

## 🖥️ Tampilan Sistem

### Dashboard

![Dashboard](images/dashboard.png)

### Data Historis

![Data Historis](images/data-historis.png)

### Hasil Prediksi

![Prediksi](images/prediksi.png)

## 🚀 Instalasi

### Clone Repository

```bash
git clone https://github.com/username/nama-repository.git
```

### Masuk ke Folder Project

```bash
cd nama-repository
```

### Install Dependency Laravel

```bash
composer install
```

### Konfigurasi Environment

```bash
cp .env.example .env
```

### Generate Key

```bash
php artisan key:generate
```

### Migrasi Database

```bash
php artisan migrate
```

### Jalankan Server

```bash
php artisan serve
```

## 📈 Contoh Output Prediksi

| Tanggal | Kecepatan Angin |
|----------|----------|
| 01-01-2026 | 3.25 m/s |
| 02-01-2026 | 3.42 m/s |
| 03-01-2026 | 3.38 m/s |

## 👨‍🎓 Penulis

**Elvan Dito Siregar**

Program Studi Sistem Informasi  
Universitas Islam Negeri Sumatera Utara

## 📄 Lisensi

Project ini dibuat untuk kebutuhan penelitian akademik dan pembelajaran.
