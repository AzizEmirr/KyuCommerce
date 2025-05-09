@php
    $referanslar = App\Models\Referanslar::all();
@endphp

<section class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand__title text-center">
                    <h2 class="title">Bize güveniyorlar</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row brand-active">
        @foreach ($referanslar as $referans)
            <div class="col">
                <div class="brand__item">
                    <a href="#" class="brand__link"><img src="{{ asset($referans->resim) }}" alt="brand"></a>
                </div>
            </div>
        @endforeach
    </div>
</section>
