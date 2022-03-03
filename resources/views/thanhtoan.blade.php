@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
    <h1 class="text-white fw-bold text-center mb-5 iCiel">THANH TOÁN</h1>
    <div class="container">
        <form class="formThanhToan d-flex justify-content-center" method="POST" action="{{route('payment.online')}}">
            @csrf
            <div class="formGeneral p-2">
                <h4 class="loaive iCiel">VÉ CỔNG - <span class="text-uppercase" id="goi"></span></h4>
                <div class="p-3 content">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label>Số tiền thanh toán</label>
                            <input type="number" class="form-control" name="giatien" id="giatien" onkeydown="return false;" value="{{ old('giatien')}}">
                            @error('giatien')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-2 mb-3">
                            <label>Số lượng vé</label>
                            <input type="number" class="form-control" name="soluong" id="soluong" value="{{ old('soluong')}}">
                            @error('soluong')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                          </div>
                        <div class="col-3 mb-3">
                            <label>Ngày sử dụng</label>
                            <input type="text" class="form-control" name="ngaysudung" id="ngaysudung" onkeydown="return false;" style="display: inline-block;" value="{{ old('ngaysudung')}}">
                            @error('ngaysudung')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Thông tin liên hệ</label>
                            <input type="text" class="form-control" name="hoten" id="hoten" style="width: 350px;" value="{{ old('hoten')}}">
                            @error('hoten')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Điện thoại</label>
                            <input type="number" class="form-control" name="dienthoai" id="dienthoai" style="width: 350px;" value="{{ old('dienthoai')}}">
                            @error('dienthoai')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="email" style="width: 350px;" value="{{ old('email')}}">
                            @error('email')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="formDatVe ms-5" style="width: 700px">
                <h4 class="title iCiel" style="width: fit-content">THÔNG TIN THANH TOÁN</h4>
                <div class="row p-3">
                    <div class="col-12 mb-3">
                        <label>Số thẻ</label>
                        <input type="number" name="sothe" id="sothe" class="form-control">
                        @error('sothe')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Họ tên chủ thẻ</label>
                        <input type="text" name="hotenchuthe" id="hotenchuthe" class="form-control">
                        @error('hotenchuthe')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Ngày hết hạn</label>
                        <input type="text" name="ngayhethan" maxlength='5' placeholder="MM/YY" onkeyup="formatString(event);">
                        @error('ngayhethan')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>CVV/CVC</label>
                        <input type="password" name="cvvcvc" id="cvvcvc" class="form-control">
                        @error('cvvcvc')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn fw-bold w-75 iCiel" style="background: #FF000A; color: white;"><h4>Thanh toán</h4></button>
                    </div>
                </div>
            </div>
        </form>

        @if(count($errors)>0)
            <script>
                $(document).ready(function () {
                    $("#errorModal").modal('show');
                });
            </script>
            <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header modal-header-error">
                            <div class="icon">
                                <img src="{{url('/img/sad-emoji.png')}}" width="100px">
                            </div>
                            <button type="button" class="btn-close btn-close-orange" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Hình như đã có lỗi xảy ra khi thanh toán... <br>
                            Vui lòng kiểm tra lại thông tin liên hệ, thông tin thẻ và thử lại.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        function formatString(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }

            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
            ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
        }

        $("#ngaysudung").datepicker({
            numberOfMonths: 1,
            changeYear: true,
            changeMonth: true,
            showOn: 'focus',
            minDate: new Date(),
            dateFormat: 'yy-mm-dd'
        });

        $(document).ready(function(){
            $('#giatien').val(90000*sessionStorage.getItem("soluong"));
            $("#soluong").on("input", function(){
                $('#giatien').val(90000*$('#soluong').val());
            });

            var max_chars = 3;

            $('#cvvcvc').keydown( function(e){
                if ($(this).val().length >= max_chars) {
                    $(this).val($(this).val().substr(0, max_chars));
                }
            });

            $('#cvvcvc').keyup( function(e){
                if ($(this).val().length >= max_chars) {
                    $(this).val($(this).val().substr(0, max_chars));
                }
            });

            if($(sessionStorage.getItem("goi") != "")) $("#goi").html(sessionStorage.getItem("goi"));
            if($(sessionStorage.getItem("soluong") != "")) $("#soluong").val(sessionStorage.getItem("soluong"));
            if($(sessionStorage.getItem("ngaysudung") != "")) $("#ngaysudung").val(sessionStorage.getItem("ngaysudung"));
            if($(sessionStorage.getItem("hoten") != "")) $("#hoten").val(sessionStorage.getItem("hoten"));
            if($(sessionStorage.getItem("dienthoai") != "")) $("#dienthoai").val(sessionStorage.getItem("dienthoai"));
            if($(sessionStorage.getItem("email") != "")) $("#email").val(sessionStorage.getItem("email"));
            if($(":input").val() != "") sessionStorage.clear();
        })
    </script>
@endsection
