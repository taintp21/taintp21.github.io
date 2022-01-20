@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 text-white bg-transparent mb-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ url('/img/damsenpark.png') }}" class="img-fluid0" width="181px" height="145px">
            </div>
            <div class="col-md-8" style="max-width: 240px;">
                <div class="card-body">
                   <h1 class="fw-bold">ĐẦM SEN PARK</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="formGen p-2">
            <div class="p-3 content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac mollis justo. Etiam volutpat tellus quis risus volutpat, ut posuere ex facilisis.</p>
                <p>Suspendisse iaculis libero lobortis condimentum gravida. Aenean auctor iaculis risus, lobortis molestie lectus consequat a.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                </ul>
            </div>
        </div>
        <form class="formDatVe p-3 ms-5">
            <h3 class="text-center fw-bold pb-5">VÉ CỦA BẠN</h3>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Gói">
                </div>
                <div class="col-6 mb-3">
                    <input type="text" class="form-control" placeholder="Số lượng vé">
                </div>
                <div class="col-6 mb-3">
                    <input type="text" class="form-control" placeholder="Ngày sử dụng">
                </div>
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Họ và tên">
                </div>
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" placeholder="Số điện thoại">
                </div>
                <div class="col-12 mb-3">
                    <input type="email" class="form-control" placeholder="Địa chỉ email">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn fw-bold w-50" style="background: #FF000A; color: white;">Đặt vé</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
