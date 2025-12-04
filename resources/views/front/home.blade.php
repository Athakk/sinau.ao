@extends('front.layouts.main')
@section('title', 'Beranda')
@section('extra-css')
<style>
    .hero-section {
        background-color: #f3fcf9; /* Hijau sangat muda */
        min-height: 85vh; 
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-blob {
        position: absolute;
        width: 500px;
        height: 500px;
        background: rgba(0, 153, 120, 0.1);
        border-radius: 50%;
        filter: blur(80px);
        z-index: 0;
    }
    .blob-1 { top: -100px; right: -100px; }
    .blob-2 { bottom: -100px; left: -100px; }

    .hero-content { position: relative; z-index: 1; }

    .stat-card {
        border-left: 4px solid rgba(255,255,255,0.3);
        padding-left: 20px;
    }

    /* --- COURSE CARD --- */
    .course-card {
        border: 1px solid #eee;
        transition: all 0.3s ease;
        border-radius: 16px;
        overflow: hidden;
    }
    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: var(--sinau-green);
    }
    .course-thumb {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .mentor-img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff;
    }
    .badge-category {
        background-color: #e6f7f3;
        color: var(--sinau-green);
        font-weight: 600;
        font-size: 0.8rem;
        padding: 5px 12px;
        border-radius: 20px;
    }

    /* --- TOMBOL --- */
    .btn-cta {
        background-color: var(--sinau-green);
        color: white;
        padding: 12px 32px;
        border-radius: 50px;
        font-weight: 600;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(0, 153, 120, 0.3);
    }
    .btn-cta:hover {
        background-color: #008f70;
        color: white;
        transform: translateY(-2px);
    }
    .btn-outline-cta {
        border: 2px solid var(--sinau-green);
        color: var(--sinau-green);
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-outline-cta:hover {
        background-color: var(--sinau-green);
        color: white;
    }

</style>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="hero-section">
        <div class="hero-blob blob-1"></div>
        <div class="hero-blob blob-2"></div>

        <div class="container hero-content mt-5">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h1 class="display-4 fw-bold mb-4 text-dark" style="line-height: 1.2;">
                        Bangun Karir Impianmu Bersama <span style="color: var(--sinau-green);">Sinau.ao</span>
                    </h1>
                    <p class="lead text-secondary mb-5">
                        Tingkatkan skill digital dengan kurikulum industri terkini. Belajar coding, desain, dan bisnis langsung dari para ahli.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{-- route('register') --}}" class="btn btn-cta">Mulai Belajar</a>
                        <a href="{{ route('subject') }}" class="btn btn-outline-cta">Lihat Program</a>
                    </div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2 text-center">
                    <img src="{{ asset('frontuser/gambar/hero-illustration.svg') }}" 
                         alt="Sinao.ao" class="img-fluid position-relative z-2">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapa Sinau.ao?</h2>
                <p class="text-muted">Metode belajar yang dirancang agar kamu siap kerja.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 rounded-4 h-100" style="background-color: #f8f9fa;">
                        <div class="mb-3 d-inline-block p-3 rounded-circle bg-white text-success shadow-sm">
                            <i class="bi bi-laptop fs-3"></i>
                        </div>
                        <h4 class="fw-bold mt-2">Belajar Fleksibel</h4>
                        <p class="text-muted">Akses materi selamanya, kapan saja dan di mana saja sesuai kecepatan belajarmu sendiri.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 h-100" style="background-color: #f8f9fa;">
                        <div class="mb-3 d-inline-block p-3 rounded-circle bg-white text-success shadow-sm">
                            <i class="bi bi-award fs-3"></i>
                        </div>
                        <h4 class="fw-bold mt-2">Sertifikat Resmi</h4>
                        <p class="text-muted">Dapatkan sertifikat kompetensi yang valid dan bisa digunakan untuk melamar kerja.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 h-100" style="background-color: #f8f9fa;">
                        <div class="mb-3 d-inline-block p-3 rounded-circle bg-white text-success shadow-sm">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                        <h4 class="fw-bold mt-2">Mentor Praktisi</h4>
                        <p class="text-muted">Dibimbing langsung oleh para ahli yang bekerja di perusahaan top teknologi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="program" class="py-5" style="background-color: #f9f9f9;">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h2 class="fw-bold">Program Populer</h2>
                    <p class="text-muted mb-0">Kelas pilihan yang paling banyak diminati bulan ini.</p>
                </div>
                <a href="{{ route('subject') }}" class="btn btn-outline-success rounded-pill d-none d-md-block">Lihat Semua</a>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                
                <div class="col">
                    <div class="card h-100 course-card bg-white">
                        <img src="https://placehold.co/600x400/333/fff?text=Laravel+Mastery" class="course-thumb" alt="Laravel">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">Mastering Laravel 11: From Zero to Hero</h5>

                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <small class="text-muted">Dibeli oleh 850+ Siswa</small>
                                </div>
                                <h5 class="fw-bold text-success mb-0">Rp 299k</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 course-card bg-white">
                        <img src="https://placehold.co/600x400/61dafb/000?text=React+JS" class="course-thumb" alt="React">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">React JS: Build Modern Web Apps</h5>

                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <small class="text-muted">Dibeli oleh 850+ Siswa</small>
                                </div>
                                <h5 class="fw-bold text-success mb-0">Rp 349k</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 course-card bg-white">
                        <img src="https://placehold.co/600x400/ff6b6b/fff?text=UI+UX+Design" class="course-thumb" alt="UI/UX">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">Complete UI/UX Design Bootcamp</h5>

                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <small class="text-muted">Dibeli oleh 850+ Siswa</small>
                                </div>
                                <h5 class="fw-bold text-success mb-0">Rp 199k</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section class="py-5" style="background: var(--sinau-green);">
        <div class="container py-5 text-center text-white">
            <h2 class="display-6 fw-bold mb-3">Siap Menjadi Talenta Digital?</h2>
            <p class="lead mb-4 text-white-50">Bergabung dengan ribuan siswa lainnya dan mulai belajar hari ini.</p>
            <a href="/registrasi" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-success shadow">
                Daftar Akun Gratis
            </a>
        </div>
    </section>

@endsection