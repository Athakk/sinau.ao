@extends('front.layouts.main')

@section('title', 'Detail Program')

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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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

        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endsection

{{-- 4. Konten Utama --}}
@section('content')

    <section class="py-5">
        <div class="container py-lg-4">

            <div class="row g-5">

                <div class="col-lg-7">

                    <h1 class="fw-bold display-5 mb-3 text-dark">{{ $subject->judul }}</h1>

                    <div class="mb-5">
                        <h4 class="fw-bold mb-3">Deskripsi Kelas</h4>
                        {!! $subject->deskripsi !!}
                    </div>

                    <div class="mb-5">
                        <h4 class="fw-bold mb-4">Materi yang Akan Dipelajari</h4>

                        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
                            <div class="list-group list-group-flush">
                                @forelse($subject->materials as $index => $material)
                                    <a href="{{ route('material', $material->id) }}"
                                        class="{{ empty($userSubject) ? 'disabled' : '' }}" style="text-decoration: none">

                                        <div class="list-group-item p-3 d-flex align-items-center border-bottom-0"
                                            style="background: {{ $index % 2 == 0 ? '#fff' : '#f9f9f9' }};">

                                            <div class="detail-icon flex-shrink-0"
                                                style="width: 32px; height: 32px; font-size: 0.9rem; margin-right: 15px;">
                                                {{ $index + 1 }}
                                            </div>

                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 fw-semibold text-dark">
                                                    {{ $material->judul }}
                                                </h6>
                                            </div>

                                            @if (empty($userSubject))
                                                <div class="text-muted ms-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="text-success ms-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-play-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-4 text-center text-muted">
                                        <em>Belum ada materi yang diunggah untuk kelas ini.</em>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-5">
                    <div class="sticky-sidebar">
                        <div class="buy-card">
                            <img src="https://placehold.co/600x400/333/fff?text={{ urlencode($subject->judul) }}"
                                alt="Thumbnail Kelas">
                            @if (empty($userSubject))
                                <div class="p-4 ">
                                    <div class="mb-3">
                                        <div class="price-tag">Rp {{ number_format($subject->harga, 0, ',', '.') }}</div>
                                    </div>

                                    <form action="#">
                                        <div class="d-grid gap-2 mb-3">
                                            <button type="submit" id="pay-button"
                                                class="btn btn-lg btn-success fw-bold py-3"
                                                style="background-color: var(--sinau-green); border: none;">
                                                Beli Kelas Ini Sekarang
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('checkout.success', $transaction->id) }}";
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            })
        });
    </script>

@endsection
