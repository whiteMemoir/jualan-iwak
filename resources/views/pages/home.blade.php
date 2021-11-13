@extends('layouts.default')
@section('carousel')
    @include('includes.banner')
@endsection
@section('content')
    @include('includes.main-menu')
@endsection
@section('payment-method')
@include('includes.method-payment')
{{--
    kenapa ku pindahin sini? karena kita tidak punya uang kwakwakak.
    karena tentang hanya muncul di home aja
--}}
<div class="body-flex tentang-kami">
    <h2>Tentang Kami</h2>
    <ul class="list-group list-group-flush">
        @forelse($tentang as $t)
        <li class="list-group-item">
            <a data-bs-toggle="collapse" href="#collapse-{{ $loop->index }}" role="button" aria-expanded="false" aria-controls="collapse-{{ $loop->index }}" style="text-decoration: none;">{{ $t->judul }}</a>
            <div class="collapse my-3" id="collapse-{{ $loop->index }}">{{ $t->deskripsi }}</div>
        </li>
        @empty
            <div>Items Tidak Tersedia!</div>
        @endforelse
    </ul>
</div>
@endsection
@section('footer')
    @include('includes.footer')
@endsection
@section('owl')
    @include('includes.owl-script')
@endsection


