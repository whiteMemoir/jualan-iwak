<!--CONTENT-->
    <main>
        <div class="content-top">
            <div class="content-flex">
                <div class="content-grid">
                    <div class="icon-menu">
                        <a class="" href="#">
                            <div class="width-menu-item">
                                <div class="menu-item">
                                    <div class="menu-image"></div>
                                </div>
                            </div>
                            <div class="menu-text">Udang</div>
                        </a>
                    </div>
                    <div class="icon-menu">
                        <a class="" href="#">
                            <div class="width-menu-item">
                                <div class="menu-item">
                                    <div class="menu-image"></div>
                                </div>
                            </div>
                            <div class="menu-text">Ikan</div>
                        </a>
                    </div>
                    <div class="icon-menu">
                        <a class="" href="#">
                            <div class="width-menu-item">
                                <div class="menu-item">
                                    <div class="menu-image"></div>
                                </div>
                            </div>
                            <div class="menu-text">Lobster</div>
                        </a>
                    </div>
                    <div class="icon-menu">
                        <a class="" href="#">
                            <div class="width-menu-item">
                                <div class="menu-item">
                                    <div class="menu-image"></div>
                                </div>
                            </div>
                            <div class="menu-text">Hewan Buatan</div>
                        </a>
                    </div>
                    <div class="icon-menu">
                        <a class="" href="#">
                            <div class="width-menu-item">
                                <div class="menu-item">
                                    <div class="menu-image"></div>
                                </div>
                            </div>
                            <div class="menu-text">Daging</div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="content-center">
                <div class="text-subtitle">
                    <h1>Jenis Ikan</h1>
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
                                                    <div class=""><img src="https://i.ibb.co/zHwByY8/g1git status851.png"></div>
                                                </div>
                                            </div>
                                            <div class="center-inner">
                                                <h2>
                                                    <span class="text-base">
                                                        <span class="line-clamp">{{ $item->nama }}</span>
                                                    </span>                                                    
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
                                </a>
                                @empty
                                <div>Tidak Ada Items!</div>
                                @endforelse
                                
                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="see-all">
                    <div class="position-relative">{{ $items->links() }}</div><br>                    
                </div>
                <div class="see-all"><a href="{{ url('items')}}" class="btn btn-primary">Lihat Semua</a></div>
            </div>
        </div>
    </main>