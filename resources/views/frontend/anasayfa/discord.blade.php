@php
    $anasayfa = App\Models\Anasayfa::find(1);
@endphp

<section class="video__area video-bg tg-jarallax" data-background="{{asset ($anasayfa->dcarkaplanresim)}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-11">
                <div class="video__content text-center">
                    <a href="{{$anasayfa->dcaciklama}}" class="popup-video"><i class="flaticon-play"></i></a>
                    <h2 class="title">{!!$anasayfa->dcbaslik!!}</h2>
                    <p>{{$anasayfa->dcaciklama}}</p>
                    <a href="https://discord.com/" target="_blank" class="video__btn tg-btn-1">
                        <span>{{$anasayfa->dcbuton}}</span>
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
    </div>
</section>