<div class="body-flex tentang-kami">
    <h2 class="text-align: center; font-size: 16px; font-weight: 700;">Tentang Kami</h2>
    <ul class="list-group list-group-flush">
        @forelse($tentang_kami as $key => $tentang)
            <li class="list-group-item">
                <a data-bs-toggle="collapse" href="#collapse-{{ $key }}" role="button" aria-expanded="false" aria-controls="collapse-{{ $key }}" style="text-decoration: none;">{{ $tentang->judul }}</a>
                <div class="collapse my-3" id="collapse-{{ $key }}">{{ $tentang->deskripsi }}</div>
            </li>
        @empty
        @endforelse
    </ul>



