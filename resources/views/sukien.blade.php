@extends('layouts.app')

@section('content')
<h1 class="text-white fw-bold text-center">SỰ KIỆN NỔI BẬT</h1>
            <div class="row row-cols-1 row-cols-md-4 g-3 w-75 m-auto">
                <div class="col">
                    <div class="card border-0">
                        <img src="{{ url('/img/sukien.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold m-0">Sự kiện 1</h5>
                            <p class="text-muted">Đầm sen Park</p>
                            <small>30/05/2021 - 01/06/2021</small>
                            <h5 class="price">25.000 VNĐ</h5>
                            <button class="btn fw-bold w-75" style="background: #FF000A; color: white;">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <img src="{{ url('/img/sukien.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold m-0">Sự kiện 2</h5>
                            <p class="text-muted">Đầm sen Park</p>
                            <small>30/05/2021 - 01/06/2021</small>
                            <h5 class="price">25.000 VNĐ</h5>
                            <button class="btn fw-bold w-75" style="background: #FF000A; color: white;">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <img src="{{ url('/img/sukien.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold m-0">Sự kiện 3</h5>
                            <p class="text-muted">Đầm sen Park</p>
                            <small>30/05/2021 - 01/06/2021</small>
                            <h5 class="price">25.000 VNĐ</h5>
                            <button class="btn fw-bold w-75" style="background: #FF000A; color: white;">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0">
                        <img src="{{ url('/img/sukien.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold m-0">Sự kiện 4</h5>
                            <p class="text-muted">Đầm sen Park</p>
                            <small>30/05/2021 - 01/06/2021</small>
                            <h5 class="price">25.000 VNĐ</h5>
                            <button class="btn fw-bold w-75" style="background: #FF000A; color: white;">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
