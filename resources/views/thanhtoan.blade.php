@extends('layouts.app')

@section('title') Thanh toán @endsection

@section('content')
<h1 class="text-white fw-bold text-center mb-5 iCiel">THANH TOÁN</h1>
    <div class="container">
        <form class="formThanhToan d-flex justify-content-center" method="POST" action="/form-thanhtoan/thanhtoan">
            @csrf
            <div class="formGeneral p-2">
                <h4 class="loaive iCiel">VÉ CỔNG - <span class="text-uppercase" id="goi">{{ request('goi') }}</span></h4>
                <div class="p-3 content">
                    <div class="row">
                        <div class="col-5 mb-3">
                            <label>Số tiền thanh toán</label>
                            <input type="number" class="form-control" name="giatien" id="giatien" onkeydown="return false;">
                            @error('giatien')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-2 mb-3">
                            <label>Số lượng vé</label>
                            <input type="number" class="form-control" name="soluong" id="soluong" value="{{ request('soluong') }}">
                            @error('soluong')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                          </div>
                        <div class="col-3 mb-3">
                            <label>Ngày sử dụng</label>
                            <input type="text" class="form-control" name="ngaysudung" value="{{ request('ngaysudung') }}">
                            @error('ngaysudung')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Thông tin liên hệ</label>
                            <input type="text" class="form-control" name="hoten" style="width: 350px;" value="{{ request('hoten')}}">
                            @error('hoten')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Điện thoại</label>
                            <input type="number" class="form-control" name="dienthoai" style="width: 350px;" value="{{ request('dienthoai')}}">
                            @error('dienthoai')
                                <span style="color: #FF000A;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" style="width: 350px;" value="{{ request('email')}}">
                            @error('email')
                                {{$message}}
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
                        <input type="number" name="sothe" class="form-control" value="{{old('sothe')}}">
                        @error('sothe')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Họ tên chủ thẻ</label>
                        <input type="text" name="hotenchuthe" class="form-control" value="{{old('hotenchuthe')}}">
                        @error('hotenchuthe')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>Ngày hết hạn</label>
                        <input type="text" name="ngayhethan" class="form-control" value="{{old('ngayhethan')}}">
                        @error('ngayhethan')
                            <span style="color: #FF000A;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label>CVV/CVC</label>
                        <input type="text" name="cvvcvc" class="form-control" value="{{old('cvvcvc')}}">
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
        $(document).ready(function(){
            $('#giatien').val(90000*$('#soluong').val());
        })
    </script>
@endsection
