@extends('layouts.default')
@section('carousel')
@include('includes.banner')
@endsection
@section('content')
<main class="for-card" style="height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5" style="margin-left: 25px;">
                <label for="select-jenis" class="mb-1">Pilih Jenis</label>
                <select class="form-select" aria-label="Default select example" id="select-jenis" onchange="selectJenis(this.value)">
                    <option selected value="" disabled>-- Pilh Jenis --</option>
                    @foreach ($commodities as $commodity)
                        <option value="{{ $commodity->slug }}" {{ ($slug != '' && $slug == $commodity->slug) ? 'selected' : ''  }}>{{ $commodity->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row d-flex justify-content-center pb-md-5 content-utama">

            @forelse ($items as $item)
                <div class="col-4 mb-3 mx-2">
                    <div class="inner-slider-menu">
                        <div class="top-inner">
                            <div class="inner-img">
                                <img data-src="{{ asset('storage/items/'.$item->gambar.'') }}" style="padding: 3px;" class="border img-fluid lazy">
                            </div>
                        </div>
                        <div class="center-inner">
                            <h2>
                                <span class="text-base">
                                    <span class="line-clamp" style="font-weight: bold;">{{ $item->nama }}</span>
                                </span>
                            <div class="disc-inner-amount">
                                @if($item->diskon == 0)
                                    <span class="text-base badge bg-danger" style="font-size: 10px">Tidak ada diskon</span>
                                @else
                                    <div class="price-discount">
                                        <div class="disc-value">{{ $item->diskon ?? '0'}}%</div>
                                    </div>
                                    <div class="strikethrough">{{ $item->harga ?? 0 }}/kg</div>
                                @endif
                            </div>
                            <div class="price-amount">@php
                               $hasilAkhir = $item['harga'] - ($item['harga'] * $item['diskon'] / 100);
                               echo 'Rp. '.number_format($hasilAkhir, 0, ",", ".");
                            @endphp/kg</div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center card bg-default my-5">Belum ada item untuk jenis ini</p>
            @endforelse

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
@section('scripts')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script type="text/Javascript">
    function selectJenis(value = ''){
        $.ajax({
            url: `{{ url('/') }}/api/items/${value}`,
            type: "GET",
            dataType: "json",
            beforeSend: function(){
                $('.content-utama').html('<p class="text-center bg-default my-5">Loading...</p>');
            },
            success: function(data){
                let html = '<p class="text-center bg-default my-5">Belum ada item untuk jenis ini</p>';
                if(data.length > 0) {
                    html = ''
                    $.each(data, function(key, value){
                        html += `<div class="col-4 mb-3 mx-2">
                            <div class="inner-slider-menu">
                                <div class="top-inner">
                                    <div class="inner-img">
                                        <img data-src="../storage/items/${value.gambar}" alt="" style="padding: 3px;" class="border img-fluid lazy">
                                    </div>
                                </div>
                                <div class="center-inner">
                                    <h2>
                                        <span class="text-flex">
                                            <span class="text-desc">${value.nama}</span>
                                        </span>
                                    </h2>
                                    <div class="disc-inner-amount">
                                        <div class="price-discount">
                                            <div class="disc-value">${value.diskon}</div>
                                        </div>
                                        <div class="strikethrough">Rp. ${priceDiskon(value.harga, value.diskon)}</div>
                                    </div>
                                    <div class="price-amount">Rp. ${formatRupiah(value.harga)}</div>
                                </div>
                            </div>
                        </div>`;
                    });

                    $(function() {
                        $('.lazy').Lazy();
                    });
                }

                $('.content-utama').html(html);
            }
        })
    }

    function formatRupiah(nilai) {
        let	reverse = nilai.toString().split('').reverse().join(''),
        ribuan 	= reverse.match(/\d{1,3}/g);
        ribuan	= ribuan.join('.').split('').reverse().join('');

        return ribuan;
    }

    function priceDiskon(price, diskon) {
        let diskonPrice = (parseInt(price) * parseInt(diskon)) / 100;
        let priceDiskon = price - diskonPrice;

        return formatRupiah(priceDiskon);
    }


    $(function() {
        $('.lazy').Lazy();
    });
</script>
@endsection
