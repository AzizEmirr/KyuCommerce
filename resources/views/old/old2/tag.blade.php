@extends('frontend.main_master')

@php
$seo = App\Models\Seo::find(1);
@endphp

@section('title'){{$seo->site_adi}} | {{ $kategoriAdi->kategori_adi }}@endsection
@section('author'){{$seo->author}}@endsection
@section('description')Teknoloji, yazılım ve bilişim hakkında en güncel ve faydalı içerikleri bulabileceğiniz bloguma hoş geldiniz.@endsection
@section('keywords')teknoloji, yazılım, blog, yaşam, kodlama.@endsection
@section('url'){{url('blog/kategori/' . $kategoriAdi->id . '/' . $kategoriAdi->url)}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')

<!-- Blog One -->
<div class="blog-area">
    <h2>{{ $etiket }} ile İlgili Bloglar</h2>

    @foreach ($icerikHepsi as $icerik)
        <div class="blog-item">
            <h3>{{ $icerik->baslik }}</h3>
            <p>{{ $icerik->ozet }}</p>
            <a href="{{ url('blog/' . $icerik->slug) }}">Devamını Oku</a>
        </div>
    @endforeach

    {{ $icerikHepsi->links() }} <!-- Sayfalama linkleri -->
</div>

<!-- Tags Widget -->
<div class="sidebar-widget style-two popular-tags">
    <div class="widget-content">
        <div class="sidebar-title">
            <h4>Bazı Popüler Taglar</h4>
        </div>
        <div class="content">
            @foreach ($etiketler as $etiket => $count)
                <a href="{{ url('blog/tag/' . $etiket) }}">{{ $etiket }} ({{ $count }})</a>
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog One -->
    
@endsection
