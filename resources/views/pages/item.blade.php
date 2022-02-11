@extends('layouts.default')

@section('carousel')
    @include('includes.banner')
@endsection

@section('css')
    <style>
        .wrap-items  {
            flex: 1 !important;
        }
    </style>
@endsection

@section('content')
<main class="for-card" style="height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 mx-md-2 mt-5">
                <label for="select-jenis" class="mb-1">Pilih Jenis</label>
                <select class="form-select" aria-label="Default select example" id="select-jenis" onchange="selectJenis(this.value)" style="width: 100%">
                    <option selected value="" disabled>-- Pilh Jenis --</option>
                    @foreach ($commodities as $commodity)
                        <option value="{{ $commodity->slug }}" {{ ($slug != '' && $slug == $commodity->slug) ? 'selected' : ''  }}>{{ $commodity->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row content-utama">

            @forelse ($items as $item)
                @php
                    $price = 'Rp. '.number_format($item->harga, 0, ",", "."). '/kg';

                    $data_json = json_encode($item);
                @endphp
                <div class="col-4 mx-2 mb-2 wrap-items item-click" data-bs-toggle="modal" data-bs-target="#modalItem"
                data-json="{{ $data_json }}">
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
                            </h2>
                            <div class="disc-inner-amount">
                                {{-- @if($item->diskon == 0)
                                    <span class="text-base badge bg-danger" style="font-size: 10px">Tidak ada diskon</span>
                                @else
                                    <div class="price-discount">
                                        <div class="disc-value">{{ $item->diskon ?? '0'}}%</div>
                                    </div>
                                    <div class="strikethrough">{{ $item->harga ?? 0 }}/kg</div>
                                @endif --}}
                                <div class="strikethrough">{{ $item->diskon ?? 0 }}/{{ $item->satuan ?? 'Kg' }}</div>
                            </div>
                            <div class="price-amount">{{ $price }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center card bg-default my-5">Belum ada item untuk jenis ini</p>
            @endforelse

        </div>

        @if(count($items) > 3)
        <div class="row py-4">
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-sm">Lihat Lainnya</button>
            </div>
        </div>
        @endif
    </div>

    @include('includes.modals.modal-item')
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

@include('includes.js.js-cart')

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
                        data_json = `${JSON.stringify(value)}`;
                        html += `<div class="col-4 mb-3 mx-2 item-click" data-bs-toggle="modal" data-bs-target="#modalItem" data-json='${data_json}'>
                            <div class="inner-slider-menu">
                                <div class="top-inner">
                                    <div class="inner-img">
                                        <img data-src="${BASE_URL}/storage/items/${value.gambar}" style="padding: 3px;" class="border img-fluid lazy">
                                    </div>
                                </div>
                                <div class="center-inner">
                                    <h2>
                                        <span class="text-base">
                                            <span class="line-clamp" style="font-weight: bold;">${value.nama ?? '-'}</span>
                                        </span>
                                    </h2>
                                    <div class="disc-inner-amount">
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

                modalItem()
            }
        })
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
