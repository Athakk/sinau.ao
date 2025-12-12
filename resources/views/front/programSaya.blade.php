{{-- 1. Menggunakan Master Layout --}}
@extends('front.layouts.main')

{{-- 2. Judul Halaman --}}
@section('title', 'Program Saya')

{{-- 3. CSS Khusus Halaman Ini (Diadaptasi dari halaman Program) --}}
@section('extra-css')
    <style>
        /* --- HEADER SECTION --- */
        .program-header {
            background-color: #f3fcf9;
            /* Hijau muda lembut */
            padding: 80px 0;
            margin-bottom: 50px;
        }

        .course-card {
            border: 1px solid #eee;
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            text-decoration: none;
            /* Agar link tidak ada garis bawah */
            color: inherit;
            display: block;
            height: 100%;
            /* Memastikan kartu mengisi tinggi kolom */
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

        .progress {
            height: 8px;
            border-radius: 10px;
            background-color: #e9ecef;
        }

        .progress-bar {
            background-color: var(--sinau-green);
            border-radius: 10px;
        }
    </style>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="container pb-5 mb-5">

        <br>
        <br>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-5">
            @foreach ($mySubject as $item)
                <div class="col">
                    <a href="{{ route('subjectPreview', $item->subject->id) }}" class="card h-100 course-card bg-white">
                        <img src="https://placehold.co/600x400/61dafb/000?text={{ urlencode($item->subject->judul) }}"
                            class="course-thumb" alt="{{ $item->subject->judul }}">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="flex-grow-1">
                                <h5 class="card-title fw-bold mb-3">{{ $item->subject->judul }}</h5>
                            </div>

                            {{-- <div class="border-top pt-3 mt-auto">
                                <div class="d-flex justify-content-between align-items-center small mb-2">
                                    <span class="text-muted fw-bold">Progress Belajar</span>
                                    <span class="fw-bold text-success">5%</span>
                                </div>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="5"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

@endsection
