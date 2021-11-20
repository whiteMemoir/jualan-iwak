<div class="slider-container">
    <div class="promo-slider-hidden">
        <div class="promo-slider-flex">
            <div id="owl-one" class="owl-carousel owl-theme">

                @forelse ($carousels as $banner)
                    <div class="promo-banner">
                        <a href="{{ $banner->link ?? 'javascript:void()' }}">
                            <div class="promo-img">
                                <img src="{{ asset('storage/carousels/'.$banner->gambar.'') }}" alt="{{ $banner->nama }}">
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="promo-banner">
                        <a href="#">
                            <div class="promo-img border">
                                <img src="https://i.ibb.co/7zXL32N/pesan-antar.jpg" alt="gambar">
                            </div>
                        </a>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
