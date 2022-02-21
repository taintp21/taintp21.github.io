@extends('layouts.app')

@section('title') Trang chủ @endsection

@section('content')
<div class="container">
    <div class="card border-0 text-white bg-transparent mb-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ url('/img/damsenpark.png') }}" class="img-fluid0" width="181px" height="145px">
            </div>
            <div class="col-md-8" style="max-width: 240px;">
                <div class="card-body">
                   <h1 class="fw-bold iCiel">ĐẦM SEN PARK</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="formGeneral p-2">
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
        <form class="formDatVe ms-5" method="GET" action="/form-thanhtoan">
            @csrf
            <h3 class="title iCiel">VÉ CỦA BẠN</h3>
            <div class="row p-3">
                <div class="col-10 mb-3">
                    <input type="text" class="form-control" name="goi" placeholder="Gói" value="Gói gia đình" required>
                </div>
                <div class="col-5 mb-3">
                    <input type="number" class="form-control" name="soluong" placeholder="Số lượng vé" required>
                </div>
                <div class="col-7 mb-3">
                    <input type="text" class="form-control w-75" id="ngaysudung" name="ngaysudung" placeholder="Ngày sử dụng" style="display: inline-block;" required>
                </div>
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" name="hoten" placeholder="Họ và tên" required>
                </div>
                <div class="col-12 mb-3">
                    <input type="number" class="form-control" name="dienthoai" placeholder="Số điện thoại" required>
                </div>
                <div class="col-12 mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Địa chỉ email" required>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn fw-bold w-50 iCiel" style="background: #FF000A; color: white;">Đặt vé</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#chonGoi').change(function(){
                $('#goi').val($(this).val());
            });

            $("#ngaysudung").datepicker({
                numberOfMonths: 1,
                changeYear: true,
                changeMonth: true,
                showOn: 'both',
                minDate: new Date(2022,0,1),
                dateFormat: 'dd/mm/yy'
            });
            $(".ui-datepicker-trigger").html('<i class="fa-solid fa-calendar-days fa-lg"></i>');
        });
    </script>
@endsection
