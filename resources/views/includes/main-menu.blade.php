<!--CONTENT-->
    <main>
        <div class="content-top">
            <div class="content-flex" style="margin-bottom: 60px; height: auto !important;">
                <div class="content-grid">
                    @foreach ($commodities as $commodity)
                        <div class="icon-menu">
                            <a class="" href="{{ url('items/'.$commodity->slug.'') }}">
                                <div class="width-menu-item">
                                    <div class="menu-item">
                                        <div class="menu-image">
                                            <img src="{{ url('storage/commodities/'.$commodity->gambar.'') }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-text">{{ $commodity->nama }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr>

            <div class="content-center">
                <div class="text-subtitle">
                    <h1>List Item</h1>
                </div>
                <p></p>
                <div class="slider-menu">
                    <div class="slider-menu-flex">
                        <div class="slider-menu-scroll">
                            <div id="owl-two" class="owl-carousel owl-theme">

                                @forelse ($items as $item)
                                <a class="space-slider" href="#">
                                    <div class="slider-menu-height">
                                        <div class="inner-slider-menu">
                                            <div class="top-inner">
                                                <div class="inner-img d-flex justify-content-center">
                                                    <img src="{{ asset('storage/items/'.$item->gambar.'') }}" alt="" style="padding: 3px;" class="border">
                                                </div>
                                            </div>
                                            <div class="center-inner">
                                                <h2>
                                                    <span class="text-base">
                                                        <span class="line-clamp">{{ $item->nama }}</span>
                                                    </span>
                                                <div class="disc-inner-amount">
                                                    <div class="price-discount">
                                                        <div class="disc-value">{{ $item->diskon ?? '0'}}%</div>
                                                    </div>
                                                    <div class="strikethrough">{{ $item->harga ?? 0 }}/kg</div>
                                                </div>
                                                <div class="price-amount">@php
                                                   $hasilAkhir = $item['harga'] - ($item['harga'] * $item['diskon'] / 100);
                                                   echo 'Rp. '.number_format($hasilAkhir, 0, ",", ".");
                                                @endphp/kg</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <div>Tidak Ada Items!</div>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>
                <div class="see-all">
                    <a href="" class="btn btn-primary">Lihat Semua</a>
                </div>
            </div>
        </div>
    </main>
