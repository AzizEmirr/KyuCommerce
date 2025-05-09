@extends('frontend.main_master')

@php
    $seo = App\Models\Seo::find(1);
@endphp

@section('title')
    @if(isset($searchTerm))
        Arama Sonuçları: "{{ $searchTerm }}" | {{ $seo->site_adi }}
    @else
        Turlar | {{$seo->site_adi}}
    @endif
@endsection

@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection
@section('keywords'){{$seo->keywords}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')
    <!-- game section start  -->
    <section style="margin-top: 50px" class="game-section pb-120">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between mb-lg-15 mb-md-8 mb-sm-6 mb-4">
                <div class="col-6">
                    <h2 class="display-four tcn-1 cursor-scale growUp title-anim">
                        @if(isset($searchTerm))
                            Arama Sonuçları: "{{ $searchTerm }}"
                        @else
                            Turlar
                        @endif
                    </h2>
                </div>
            </div>
            <div class="row gy-lg-10 gy-6">
                @forelse($bloglar as $blog)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="game-card-wrapper mx-auto">
                            <div class="game-card mb-5 p-2">
                                <div class="game-card-border"></div>
                                <div class="game-card-border-overlay"></div>
                                <div class="game-img" style="height: 438px;" >
                                    <img src="{{ !empty($blog->resim) ? url($blog->resim) : url('uploads/blog/resim-yok.jpg') }}"
                                        alt="game" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="game-link d-center">
                                    <a href="{{ url('blog/' . $blog->id . '/' . $blog->url) }}" class="btn2">
                                        <i class="ti ti-arrow-right fs-2xl"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('blog/' . $blog->id . '/' . $blog->url) }}">
                                <h4 class="game-title mb-0 tcn-1 cursor-scale growDown2 title-anim">{{$blog->baslik}}</h4>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Arama sonucunuza göre bir Ürünbulunamadı.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- game section end  -->
@endsection
