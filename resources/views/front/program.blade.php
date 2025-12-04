{{-- 1. Menggunakan Master Layout --}}
@extends('front.layouts.main')

{{-- 2. Judul Halaman --}}
@section('title', 'Program Belajar')

{{-- 3. CSS Khusus Halaman Ini --}}
@section('extra-css')
<style>
    /* --- HEADER SECTION --- */
    .program-header {
        background-color: #f3fcf9; 
        padding: 80px 0;
        margin-bottom: 50px;
    }

    .course-card {
        border: 1px solid #eee;
        transition: all 0.3s ease;
        border-radius: 16px;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        display: block;
    }
    
    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08);
        border-color: var(--sinau-green);
    }

    .course-thumb {
        height: 200px;
        object-fit: cover;
        width: 100%;
        border-bottom: 1px solid #f0f0f0;
    }

    .mentor-img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .badge-category {
        background-color: #e6f7f3;
        color: var(--sinau-green);
        font-weight: 600;
        font-size: 0.75rem;
        padding: 6px 14px;
        border-radius: 50px;
        letter-spacing: 0.5px;
    }
    
    .search-input {
        border-radius: 50px 0 0 50px;
        border: 1px solid #ddd;
        padding-left: 25px;
    }
    .search-input:focus {
        border-color: var(--sinau-green);
        box-shadow: none;
    }
    .search-btn {
        border-radius: 0 50px 50px 0;
        background-color: var(--sinau-green);
        border-color: var(--sinau-green);
        color: white;
        padding-left: 20px;
        padding-right: 20px;
    }
    .search-btn:hover {
        background-color: #008f70;
    }
</style>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="program-header text-center">
        <div class="container mt-5 ">
            <h1 class="fw-bold display-5 mb-3">Jelajahi Program Belajar</h1>
            <p class="lead text-muted mb-4 mx-auto" style="max-width: 600px;">
                Temukan kelas yang sesuai dengan minat dan tujuan karirmu. Dari pemula hingga mahir, semua ada di sini.
            </p>
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control form-control-lg search-input" placeholder="Cari materi...">
                        <button class="btn btn-lg search-btn" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="container pb-5 mb-5 mt-5">
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
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
                </a>
            </div>

            <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
                    <img src="https://placehold.co/600x400/61dafb/000?text=React+JS" class="course-thumb" alt="React">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">React JS: Build Modern Web Apps</h5>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <small class="text-muted">Dibeli oleh 1.2k+ Siswa</small>
                            </div>
                            <h5 class="fw-bold text-success mb-0">Rp 349k</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
                    <img src="https://placehold.co/600x400/ff6b6b/fff?text=UI+UX+Design" class="course-thumb" alt="UI/UX">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Complete UI/UX Design Bootcamp</h5>
                        

                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <small class="text-muted">Dibeli oleh 2.5k+ Siswa</small>
                            </div>
                            <h5 class="fw-bold text-success mb-0">Rp 199k</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
                    <img src="https://placehold.co/600x400/02569B/fff?text=Flutter+Dev" class="course-thumb" alt="Flutter">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Flutter & Dart: The Complete Guide</h5>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <small class="text-muted">Dibeli oleh 500+ Siswa</small>
                            </div>
                            <h5 class="fw-bold text-success mb-0">Rp 249k</h5>
                        </div>
                    </div>
                </a>
            </div>

             <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
                    <img src="https://placehold.co/600x400/FFD43B/333?text=Python+Data" class="course-thumb" alt="Python">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Python for Data Science and Machine Learning</h5>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <small class="text-muted">Dibeli oleh 900+ Siswa</small>
                            </div>
                            <h5 class="fw-bold text-success mb-0">Rp 399k</h5>
                        </div>
                    </div>
                </a>
            </div>

             <div class="col">
                <a href="#" class="card h-100 course-card bg-white">
                    <img src="https://placehold.co/600x400/8e44ad/fff?text=Digital+Marketing" class="course-thumb" alt="Marketing">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Digital Marketing Masterclass 2024</h5>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <div>
                                <small class="text-muted">Dibeli oleh 300+ Siswa</small>
                            </div>
                            <h5 class="fw-bold text-success mb-0">Rp 150k</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div> 
    </section>

@endsection