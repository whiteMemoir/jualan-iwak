@extends('layouts.default')
@section('carousel')
@include('includes.banner')
@endsection
@section('content')
<main class="for-card">
    <div class="container d-flex justify-content-center mt-4">
        <div class="row px-5">

            @forelse ($items as $item)
            <div class="col-5 mb-3 mx-2 d-flex justify-content-center align-items-center">
                <div class="inner-slider-menu">
                    <div class="top-inner">
                        <div class="inner-img">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="center-inner">
                        <h2>
                            <span class="text-base">
                                <span class="line-clamp">{{ $item->nama }}</span>
                            </span>
                        </h2>
                        <div class="disc-inner-amount">
                            <div class="price-discount">
                                <div class="disc-value">{{ $item->diskon }}%</div>
                            </div>
                            <div class="strikethrough">{{ $item->harga }}/kg</div>
                        </div>
                        <div class="price-amount">@php
                            $hasilAkhir = $item['harga'] - ($item['harga'] * $item['diskon'] / 100);
                            echo 'Rp'.number_format($hasilAkhir, 0, ",", ".");
                         @endphp/kg</div>
                    </div>
                </div>
            </div>               
            @empty
            <div>Tidak Ada Items!</div>
            @endforelse
            <div class="see-all">{{ $items->links() }}</div>        
        </div>
    </div>
</main>
@section('footer')
    @include('includes.footer')
@endsection
@endsection
@section('owl')
@include('includes.owl-script')
@endsection
