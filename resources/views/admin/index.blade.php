@extends('admin.admin_master')

@php
use Carbon\Carbon;

// SEO bilgisi
$seo = App\Models\Seo::find(2);

// Tarih bilgileri
$today = Carbon::today();
$lastWeek = $today->copy()->subWeek();
$thisMonthStart = $today->copy()->startOfMonth();
$lastMonthStart = $thisMonthStart->copy()->subMonth();
$lastMonthEnd = $thisMonthStart->copy()->subSecond();

// Veritabanı sorguları
$dailyVisits = DB::table('visitors')->whereDate('visited_at', $today)->count();
$weeklyVisits = DB::table('visitors')->whereBetween('visited_at', [$lastWeek, $today])->count();
$totalVisits = DB::table('visitors')->count();

$monthlyVisits = DB::table('visitors')->whereBetween('visited_at', [$thisMonthStart, $today])->count();
$lastMonthVisits = DB::table('visitors')->whereBetween('visited_at', [$lastMonthStart, $lastMonthEnd])->count();

$previousWeekVisits = DB::table('visitors')
    ->whereBetween('visited_at', [$lastWeek->copy()->subWeek(), $lastWeek])
    ->count();

// Değişim oranlarını hesaplama
$weeklyChange = $previousWeekVisits > 0 
    ? (($weeklyVisits - $previousWeekVisits) / $previousWeekVisits) * 100 
    : 0;

$monthlyChange = $lastMonthVisits > 0 
    ? (($monthlyVisits - $lastMonthVisits) / $lastMonthVisits) * 100 
    : 0;
@endphp

@section('title'){{$seo->site_adi}} | {{$seo->title}}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection

@section('admin')
{{-- Modal Bakım Mesajı --}}
<div class="modal fade" id="maintenanceModal" tabindex="-1" aria-labelledby="maintenanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="maintenanceModalLabel">Panel Bakımdadır</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Panel şu anda bakımdadır. Kısa süre içinde yeniden erişime açılacaktır. Anlayışınız için teşekkür ederiz.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

{{-- Ziyaretçi İstatistikleri Kartları --}}
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Günlük Ziyaretler</p>
                            <h3 class="mt-2 mb-0 fw-bold">{{ $dailyVisits }}</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                <i class="fas fa-clock h1 align-self-center mb-0 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3">
                <span class="{{ $weeklyChange >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($weeklyChange, 2) }}%
                </span> Geçen Haftaya Göre Değişim
            </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Haftalık Ziyaretler</p>
                            <h3 class="mt-2 mb-0 fw-bold">{{ $weeklyVisits }}</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                <i class="fas fa-calendar h1 align-self-center mb-0 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3">
                <span class="{{ $weeklyChange >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($weeklyChange, 2) }}%
                </span> Geçen Haftaya Göre Değişim
            </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Aylık Ziyaretler</p>
                            <h3 class="mt-2 mb-0 fw-bold">{{ $monthlyVisits ?? 0 }}</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                <i class="fas fa-chart-line h1 align-self-center mb-0 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3">
                <span class="{{ $monthlyChange >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($monthlyChange, 2) }}%
                </span> Geçen Aya Göre Değişim
            </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center border-dashed-bottom pb-3">
                        <div class="col-9">
                            <p class="text-dark mb-0 fw-semibold fs-14">Tüm Zamanlar Ziyaretleri</p>
                            <h3 class="mt-2 mb-0 fw-bold">{{ $totalVisits }}</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <div class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                <i class="fas fa-globe h1 align-self-center mb-0 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 text-truncate text-muted mt-3">
                        Tüm zamanların toplam ziyareti
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Ziyaretçi Genel Görünümü</h4>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a href="#" class="btn btn-light dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icofont-calendar fs-5 me-1"></i>
                                    Bu Yıl<i class="las la-angle-down ms-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Bu Yıl</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="audience_overviews" class="apex-charts"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ApexCharts Script --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Ziyaretçi Sayısı',
                data: [{{$dailyVisits}}, {{$weeklyVisits}}, {{$totalVisits}}]
            }],
            xaxis: {
                categories: ['Bugün', 'Geçen Hafta', 'Tüm Zamanlar'],
                title: {
                    text: 'Zaman Dilimi'
                }
            },
            yaxis: {
                title: {
                    text: 'Ziyaretçi Sayısı'
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return val + " ziyaretçi";
                    }
                }
            },
            fill: {
                opacity: 1
            },
            colors: ['#FF5733'], 
            grid: {
                borderColor: '#f1f1f1'
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#audience_overviews"), options);
        chart.render();
    });
</script>


@endsection
