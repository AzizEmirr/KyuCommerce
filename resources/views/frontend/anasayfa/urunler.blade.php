@php
    $urunler = App\Models\Urunler::where('durum', 1)->orderBy('sirano')->get();
@endphp

@if ($urunler->isNotEmpty())
<section class="project-area project-bg section-pt-120 section-pb-140">
	<div class="container custom-container">
		<div class="project__wrapper">
			<div class="section__title text-start">
				<h3 class="title">PROJECTS {{$seo->title}}</h3>
				<span class="sub-title tg__animate-text">Tüm Ürünlerimiz</span>
			</div>
			<div class="swiper-container project-active">
				<div class="swiper-wrapper">
					@foreach ($urunler as $urun)
					<div class="swiper-slide">
						<div class="project__item">
							<a href="{{ url('urun/' . $urun->id . '/' . $urun->url) }}"><img
									src="{{ !empty($urun->resim) ? url($urun->resim) : url('uploads/urunler/537x540.png') }} "alt="img"
                                        style="width: 230px; height: 400px; object-fit: cover;"></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="slider-button-prev">
				<i class="flaticon-right-arrow"></i>
				<i class="flaticon-right-arrow"></i>
			</div>
		</div>
	</div>
	<!-- scrollbar -->
	<div class="swiper-scrollbar"></div>
</section>
@endif