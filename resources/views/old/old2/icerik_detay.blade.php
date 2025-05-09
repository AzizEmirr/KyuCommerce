@extends('frontend.main_master')

@php
$seo = App\Models\Seo::find(1);
$ayarlar = App\Models\Ayarlar::find(1);
@endphp

@section('title'){{$seo->site_adi}} | {{ $icerik->baslik }}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$icerik->aciklama}}@endsection
@section('keywords'){{$icerik->anahtar}} @endsection
@section('url'){{ url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$icerik->resim}}@endsection

@section('main')

	<!-- Page Title --> 
    <section class="page-title" style="background-image:url({{asset ('frontend')}}/assets/images/background/page-title.jpg)">
        <div class="auto-container">
			<h2>{{ $icerik->baslik }}</h2>
			<ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Anasayfa</a></li>
				<li><a href="{{ url('blog/kategori/' . $icerik['kategoriler']['id'] . '/' . $icerik['kategoriler']['url']) }}">{{ $icerik['kategoriler']['kategori_adi'] }}</a></li>
                <li>{{ $icerik->baslik }}</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="blog-detail">
						<div class="blog-detail_outer">
							<div class="blog-detail_image">
                                <img src="{{ !empty($blogposts->resim) ? url($blogposts->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt="" style="width: 850px; height: 450px; object-fit: cover;" />
							</div>
							<div class="blog-detail_content">
								<div class="d-flex align-items-center flex-wrap">
									<!-- Post Meta -->
									<ul class="blog-detail_meta">
										<li><span class="icon fa-solid fa-clock fa-fw"></span>{{ $icerik->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</li>
									</ul>
								</div>
								<h3 class="blog-detail_heading">{{ $icerik->baslik }}</h3>
								<p>{!! $icerik->metin !!}</p>
								<!-- Post Share Options-->
								<div class="post-share-options">
									<div class="post-share-inner d-flex justify-content-between align-items-center flex-wrap">
										<div class="tags">
                                            <span>Taglar:</span>
                                            @foreach ($etikettag as $taglar)
                                            <a href="#{{ url('tag/' . $taglar) }}">{{ $taglar }}</a> 
                                            @endforeach
                                        </div>
                                        
										<div class="social-box">
										<span>Bizi Takip Edin</span>

                                        @if ($ayarlar->facebook)
                                            <a href="{{ $ayarlar->facebook }}" target="blank"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if ($ayarlar->twitter)
                                            <a href="{{ $ayarlar->twitter }}" target="blank"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if ($ayarlar->instagram)
                                            <a href="{{ $ayarlar->instagram }}" target="blank"><i class="fab fa-instagram"></i></a>
                                        @endif
                                        @if ($ayarlar->whatsapp)
                                            <a href="{{ $ayarlar->whatsapp }}" target="blank"><i class="fab fa-whatsapp"></i></a>
                                        @endif
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget search-box">
                        <form method="GET" action="{{ route('frontend.blog.search') }}">
                            <div class="form-group">
                                <input type="search" name="q" value="" placeholder="Search Resources" required>
                                <button type="submit"><span class="icon fa fa-search"></span></button>
                            </div>
                        </form>
                    </div>


                    <!-- Popular Category Widget -->
                    <div class="sidebar-widget style-two category-widget">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Tüm Kategoriler</h4>
                            </div>
                            <div class="content">
                                <ul class="category-list">
                                    @foreach ($kategoriler as $kategori)
                                    <li><a href="{{ url('blog/kategori/' . $kategori->id . '/' . $kategori->url) }}">{{ $kategori->kategori_adi }} <span>{{ $kategori->icerik_sayisi }}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Post Widget -->
                    <div class="sidebar-widget style-two post-widget">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Son Gönderiler</h4>
                            </div>
                            <div class="content">
                                @foreach ($icerikHepsi as $icerikler)
                                <!-- Post -->
                                <div class="post">
                                    <div class="thumb"><a href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}"><img src="{{ !empty($icerikler->resim) ? url($icerikler->resim) : url('uploads/bloglar/resim-yok.jpg') }}" alt=""></a></div>
                                    <div class="post-date"> {{ $icerikler->created_at->tz('Europe/Istanbul')->format('d.m.Y - H:i') }}</div>
                                    <h6><a href="{{ url('blog/' . $icerikler->id . '/' . $icerikler->url) }}"> {{ $icerikler->baslik }}</a></h6>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget style-two popular-tags">
                        <div class="widget-content">
                            <!-- Sidebar Title -->
                            <div class="sidebar-title">
                                <h4>Bazı Popüler Taglar</h4>
                            </div>
                            <div class="content">
                                @foreach ($etiketler as $etiket => $count)
                                <a href="#{{ ('tag/' . $etiket) }}">{{ $etiket }} ({{ $count }})</a>
                                @endforeach
                            </div>
                        </div>
                    </div>


					</aside>
				</div>

			</div>
		</div>
	</div>

@endsection
