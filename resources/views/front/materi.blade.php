{{-- 1. Menggunakan Master Layout --}}
@extends('front.layouts.main')

{{-- 2. Judul Halaman --}}
@section('title', 'Nonton Materi: Mastering Laravel')

{{-- 3. CSS Khusus Halaman Ini --}}
@section('extra-css')
<style>
    /* --- PLAYLIST SIDEBAR --- */
    .playlist-card {
        border: 1px solid #eee;
        border-radius: 12px;
        overflow: hidden;
        background: white;
    }

    .playlist-header {
        background-color: #f8f9fa;
        padding: 15px 20px;
        font-weight: bold;
        border-bottom: 1px solid #eee;
    }

    .playlist-scroll {
        max-height: 500px;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .playlist-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .playlist-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .playlist-scroll::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }

    .list-group-item {
        border-left: none;
        border-right: none;
        padding: 15px 20px;
        transition: 0.2s;
        cursor: pointer;    
        display: flex;
        align-items: center; 
    }

    .list-group-item.active {
        background-color: var(--sinau-green);
        border-color: var(--sinau-green);
        color: white;
        font-weight: 600;
    }

    .list-group-item:not(.active):hover {
        background-color: #f3fcf9;
        color: var(--sinau-green);
    }

    .playlist-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .video-title-area {
        padding: 20px 0;
        margin-bottom: 20px;
    }
    
    .ratio-16x9 {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    @media (max-width: 991px) {
        .playlist-scroll {
            max-height: 300px;
        }
        .order-md-last {
            order: 2 !important; 
        }
        .order-md-first {
            order: 1 !important;
        }
    }
</style>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="container py-4 py-lg-5">

        <div class="row g-4">
            
            <div class="col-lg-8 order-2 order-lg-1">
                
                <div class="ratio ratio-16x9 bg-dark">
                    <iframe src="https://www.youtube.com/embed/MFh0Fd7BsjE?rel=0" 
                            title="YouTube video player" 
                            allowfullscreen>
                    </iframe>
                </div>

                <div class="video-title-area">
                    <h2 class="fw-bold mb-3">1. Pengenalan dan Instalasi Laravel</h2>
                    <div class="d-flex align-items-center text-muted mb-4 pb-3 border-bottom">
                        <span><i class="bi bi-clock me-2"></i>15 Menit</span>
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3">Deskripsi Materi</h4>
                        <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            Di video pertama ini, kita akan membahas apa itu Laravel, kenapa kita harus menggunakannya, dan bagaimana cara melakukan instalasi awal di komputer lokal menggunakan Composer.
                        </p>
                        <p class="text-secondary mb-0" style="line-height: 1.8; text-align: justify;">
                            Pastikan Anda sudah menginstall PHP dan Composer sebelum memulai materi ini agar bisa mengikuti praktek secara langsung.
                        </p>
                    </div>
                    </div>
            </div>


            <div class="col-lg-4 order-1 order-lg-2 mb-4 mb-lg-0">
                
                <div class="playlist-card shadow-sm sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="playlist-header d-flex justify-content-between align-items-center">
                        <h>Daftar Materi</h3> 
                        <span class="badge bg-success rounded-pill">999 Video</span>
                    </div>
                    
                    <div class="playlist-scroll">
                        <div class="list-group list-group-flush">
                            
                            <div class="list-group-item bg-light">
                                <a href="#" class="playlist-link">
                                    <i class="bi bi-play-circle fs-4 me-3 text-secondary"></i>
                                    <div>
                                        <div class="fw-semibold text-dark">0. Persiapan Tools</div>
                                        <small class="text-muted">10 Menit</small>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group-item active">
                                <div class="d-flex align-items-center w-100">
                                    <i class="bi bi-play-circle-fill fs-4 me-3"></i>
                                    <div>
                                        <div class="fw-semibold">1. Pengenalan dan Instalasi</div>
                                        <small class="text-white-50">15 Menit • Sedang diputar</small>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item">
                                <a href="#" class="playlist-link">
                                    <i class="bi bi-play-circle fs-4 me-3 text-secondary"></i>
                                    <div>
                                        <div class="fw-semibold text-dark">2. Struktur Folder Laravel</div>
                                        <small class="text-muted">10 Menit</small>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group-item">
                                <a href="#" class="playlist-link">
                                    <i class="bi bi-play-circle fs-4 me-3 text-secondary"></i>
                                    <div>
                                        <div class="fw-semibold text-dark">3. Routing Dasar</div>
                                        <small class="text-muted">18 Menit</small>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="list-group-item">
                                <a href="#" class="playlist-link">
                                    <i class="bi bi-play-circle fs-4 me-3 text-secondary"></i>
                                    <div>
                                        <div class="fw-semibold text-dark">4. Controller & View</div>
                                        <small class="text-muted">22 Menit</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>

@endsection