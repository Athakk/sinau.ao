{{-- 1. Menggunakan Master Layout --}}
@extends('front.layouts.main')

{{-- 2. Judul Halaman --}}
@section('title', 'Detail Program')

{{-- 3. CSS Khusus Halaman Ini --}}
@section('extra-css')
<style>
    .sticky-sidebar {
        position: sticky;
        top: 100px;
        z-index: 10;
    }

    .buy-card {
        border-radius: 16px;
        border: 1px solid #eee;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        background: white;
        overflow: hidden;
    }

    .buy-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .price-tag {
        color: var(--sinau-green);
        font-weight: 800;
        font-size: 2rem;
    }

    .original-price {
        text-decoration: line-through;
        color: #999;
        font-size: 1rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        color: #555;
    }
    .detail-icon {
        width: 40px;
        height: 40px;
        background: #f3fcf9;
        color: var(--sinau-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 1.2rem;
    }

    @media (max-width: 991px) {
        .sticky-sidebar {
            position: static;
            margin-bottom: 40px;
        }
        .program-layout {
            display: flex;
            flex-direction: column-reverse;
        }
    }
</style>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="py-5">
        <div class="container py-lg-4">
            
            <div class="row g-5">
                
                <div class="col-lg-7">                   

                    <h1 class="fw-bold display-5 mb-3 text-dark">Mastering Laravel 11: From Zero to Hero</h1>               

                    <div class="mb-5">
                        <h4 class="fw-bold mb-3">Deskripsi Kelas</h4>
                        <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            Pelajari framework PHP terpopuler di dunia dari dasar hingga mahir. Dalam kelas ini, kita akan membangun aplikasi nyata berupa Toko Online lengkap dengan fitur pembayaran, manajemen produk, dan dashboard admin.
                        </p>
                        <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                            Cocok untuk pemula yang baru belajar PHP maupun developer berpengalaman yang ingin upgrade skill ke Laravel versi terbaru. Materi disusun secara sistematis agar mudah dipahami.
                        </p>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="sticky-sidebar">
                        <div class="buy-card">
                            <img src="https://placehold.co/600x400/333/fff?text=Laravel+Hero" alt="Thumbnail Kelas">
                            
                            <div class="p-4">
                                <div class="mb-3">
                                    <div class="price-tag">Rp 299.000</div>
                                </div>

                                <form action="#">
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="submit" class="btn btn-lg btn-success fw-bold py-3" style="background-color: var(--sinau-green); border: none;">
                                            Beli Kelas Ini Sekarang
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </section>

@endsection