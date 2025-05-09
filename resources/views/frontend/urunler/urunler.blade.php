@extends('frontend.main_master')

@php
    $urunler = App\Models\Urunler::where('durum', 1)->orderBy('sirano')->get();
    $seo = App\Models\Seo::find(1);
@endphp


@section('title')Ürünler | {{$seo->site_adi}}@endsection
@section('author'){{$seo->author}}@endsection
@section('description'){{$seo->description}}@endsection
@section('keywords'){{$seo->keywords}}@endsection
@section('url'){{url('/')}}@endsection
@section('resim'){{ url('/')}}/{{$seo->resim}}@endsection

@section('main')



@endsection
