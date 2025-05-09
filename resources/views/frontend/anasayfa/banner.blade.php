@php
    $banner = App\Models\Banner::where('durum', 1)->orderBy('sirano')->first();
	$referanslar = App\Models\Referanslar::limit(3)->get();
@endphp
@if($banner)
<section class="slider__area slider__bg" data-background="{{$banner->arkaplan}}">
	<div class="slider-activee">
		<div class="single-slider">
			<div class="container custom-container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<div class="slider__content">
							<h6 class="sub-title wow fadeInUp" data-wow-delay=".2s">{{$banner->ust_baslik}}</h6>
							<h2 class="title wow fadeInUp" data-wow-delay=".5s">{{$banner->baslik}}</h2>
							<p class="wow fadeInUp" data-wow-delay=".8s">{{$banner->aciklama}}</p>
							<div class="slider__btn wow fadeInUp" data-wow-delay="1.2s">
								<a href="{{$banner->button_url}}" class="tg-btn-1">
									<span>{{$banner->button_text}}</span>
									<svg preserveAspectRatio="none" viewBox="0 0 197 60" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path class="cls-1" fill-rule="evenodd" clip-rule="evenodd"
											d="M30.976 0.755987L0.75499 30.977L29.717 58.677H165.717L195.938 30.977L165.717 0.755987H30.976Z" stroke="white"
											stroke-width="1.5"></path>
										<path class="cls-2" fill-rule="evenodd" clip-rule="evenodd"
											d="M166.712 2.01899L196.933 30.98L166.712 58.68L188.118 29.719L166.712 2.01899Z" fill="white"></path>
										<path class="cls-2" fill-rule="evenodd" clip-rule="evenodd"
											d="M30.235 2.01899L0.0139923 30.977L30.235 58.677L8.82899 29.719L30.235 2.01899Z" fill="white"></path>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-5 col-lg-6">
						<div class="slider__img text-center">
							<img src="{{$banner->resim}}" data-magnetic alt="img">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slider__shapes">
		<img src="{{asset ('frontend')}}/img/slider/slider_shape01.png" alt="shape">
		<img src="{{asset ('frontend')}}/img/slider/slider_shape02.png" alt="shape">
		<img src="{{asset ('frontend')}}/img/slider/slider_shape03.png" alt="shape">
		<img src="{{asset ('frontend')}}/img/slider/slider_shape04.png" alt="shape">
	</div>
	<div class="slider__brand-wrap">
		<div class="container custom-container">
			<ul class="slider__brand-list list-wrap">
				@foreach ($referanslar as $referans)
				<li><a href="#"><img src="{{ asset($referans->resim) }}" alt="brand"></a></li>
				@endforeach
			</ul>
		</div>
	</div>
</section>
@endif
