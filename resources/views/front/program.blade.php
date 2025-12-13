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
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        </div>
    </section>

    <section class="container pb-5 mb-5 mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($subjects as $subject)
                <div class="col">
                    <a href="{{ route('subjectPreview', $subject->id) }}" class="card h-100 course-card bg-white">
                        <img src="https://placehold.co/600x400/{{ $subject->background_color }}/fff?text={{ urlencode($subject->judul) }}"
                            class="course-thumb" alt="{{ $subject->judul }}">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">{{ $subject->judul }}</h5>

                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <small class="text-muted">
                                        Dibeli oleh {{ number_format($subject->users->count(), 0, ',', '.') }}+ Siswa
                                    </small>
                                </div>
                                <h5 class="fw-bold text-success mb-0">
                                    Rp {{ number_format($subject->harga, 0, ',', '.') }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col"></div>
                <div class="col">
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#dee2e6"
                                class="bi bi-journal-x" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>
                        </div>

                        <h4 class="fw-bold text-muted">Belum Ada Program Tersedia</h4>
                        <p class="text-muted">Saat ini belum ada kelas yang diterbitkan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
                <div class="col"></div>
            @endforelse
        </div>
    </section>

@endsection
