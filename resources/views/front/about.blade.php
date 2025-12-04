@extends('front.layouts.main')

@section('title', 'Tentang Kami')

@section('extra-css')
<style>
    
    #hero-about {
        background-image: url('{{ asset("frontuser/gambar/about-hero.svg") }}');
        background-size: cover;
        background-position: center;
        position: relative; 
        color: white; 
    }


    .hero-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        /* background-color: rgba(193, 176, 176, 0.6);  */
        z-index: 1;
    }

    #hero-about .container {
        position: relative;
        z-index: 2;
    }

    .text-highlight { color: var(--sinau-green); font-weight: bold; }
    .feature-box {
        padding: 2rem; border-radius: 12px; background: #f8f9fa; height: 100%;
        transition: 0.3s; border: 1px solid transparent;
    }
    .feature-box:hover {
        background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border-color: #eee; transform: translateY(-5px);
    }
    .feature-icon { font-size: 2.5rem; color: var(--sinau-green); margin-bottom: 1rem; }
</style>
@endsection

@section('content')

    <section id="hero-about" class="py-5 text-center">
        <div class="hero-overlay"></div>
        
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <h1 class="fw-bold display-4 mb-3">Tentang Sinau.ao</h1>
                    <p class="lead mb-0">
                        Mengenal lebih dekat siapa kami dan misi kami dalam mencetak talenta digital masa depan.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Berawal dari Mimpi Sederhana</h2>
                    <p class="mb-4 text-secondary" style="line-height: 1.8;">
                        Sinau.ao lahir dari keresahan kami melihat kesenjangan keterampilan digital. Kami percaya pendidikan teknologi harus inklusif dan mudah diakses.
                    </p>
                     <p class="text-secondary" style="line-height: 1.8;">
                        Kami tidak hanya mencetak programmer, kami membentuk <span class="text-highlight">pemecah masalah</span>.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontuser/gambar/abouut.svg') }}"
                         alt="Ilustrasi Berawal dari Mimpi" class="img-fluid rounded-4">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 container my-5">
         <div class="row gy-4">
            </div>
    </section>

@endsection