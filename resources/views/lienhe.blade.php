@extends('layouts.app')

@section('content')
    <h1 class="text-white fw-bold text-center mb-5">LIÊN HỆ</h1>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="formGen p-2">
                <div class="p-3 content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac mollis justo. Etiam volutpat tellus quis risus volutpat, ut posuere ex facilisis.</p>
                    <form class="formLienHe">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Tên">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Số điện thoại">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Địa chỉ">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea cols="30" rows="10" class="form-control" placeholder="Lời nhắn" style="resize: none;"></textarea>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn fw-bold w-50" style="background: #FF000A; color: white;">Gửi liên hệ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="info ms-5">
                <div class="row">
                    <div class="card box">
                        <div class="row box-with-dashed">
                            <div class="col-md-3">
                                <img src="{{ url('/img/map-marker.png') }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold">Địa chỉ:</h4>
                                    <p class="card-text">86/33 Âu Cơ, Phường 9, Quận Tân Bình, TP. Hồ Chí Minh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card box">
                        <div class="row box-with-dashed">
                            <div class="col-md-3">
                                <img src="{{ url('/img/email.png') }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold">Email:</h4>
                                    <p class="card-text">investigate@your-site.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 box">
                        <div class="row box-with-dashed">
                            <div class="col-md-3">
                                <img src="{{ url('/img/redphone.png') }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h4 class="card-title fw-bold">Điện thoại:</h4>
                                    <p class="card-text">+84 145 689 798</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
