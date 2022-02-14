@extends('layouts.app')

@section('title') Sự kiện @endsection

@section('content')
    <h1 class="text-white fw-bold text-center">SỰ KIỆN NỔI BẬT</h1>
    <div class="row row-cols-1 row-cols-md-4 g-3 w-75 m-auto">
        @foreach ($sukien as $r)
        <div class="col">
            <div class="card border-0">
                <img src="{{ url('/img/'. $r->images) }}" class="card-img-top" alt="{{$r->title}}">
                <div class="card-body">
                    <a class="card-title text-decoration-none m-0" href="/su-kien/{{$r->id}}"><h5 class="fw-bold text-black">{{$r->title}}</h5></a>
                    <p class="text-muted">{{$r->location}}</p>
                    <small>{!! date('d/m/Y', strtotime($r->fromDate)) !!} - {!! date('d/m/Y', strtotime($r->toDate)) !!}</small>
                    <h5 class="price">{{number_format($r->price, 0, '', '.')}} VNĐ</h5>
                    <a class="btn fw-bold w-75" style="background: #FF000A; color: white;" href="/su-kien/{{$r->id}}">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
