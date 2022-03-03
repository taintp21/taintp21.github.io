@extends('layouts.app')

@section('title', 'Thanh toán thành công')

@section('content')
    <h1 class="text-white fw-bold text-center mb-5 iCiel">THANH TOÁN THÀNH CÔNG</h1>
    <div class="g-3 w-75 m-auto">
        <div id="carouselThanhToan" class="carousel formGeneral" data-bs-ride="carousel">
            <div class="carousel-inner p-3">
                @for ($i=0; $i < $soluong; $i++)
                    <div class="carousel-item border-0 rounded-5">
                        <div class="card">
                            <div class="card-header text-center border-0 bg-body pt-4">
                                {!! $QRvnp_TxnRef !!}
                            </div>
                            <div class="card-body text-center">
                                <p class="fw-bold">{{$vnp_TxnRef}}</p>
                                <p class="fw-bold" style="color: #FFC226;">VÉ CỔNG</p>
                                ---
                                <p>Ngày sử dụng: {{$nsd->ngaysudung}}</p>
                                <i class="fa-solid fa-circle-check" style="color: green"></i>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
            <p class="p-3">Số lượng: {{$soluong}} vé</p>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselThanhToan"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-caret-left fa-2xl"></i>
                    <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselThanhToan"
                data-bs-slide="next">
                <i class="fa-solid fa-caret-right fa-2xl"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection


@section('script')
<script>
    $(document).ready(function(){
        $(".carousel-item:first-child").addClass('active');

    });

    var multipleCardCarousel = document.querySelector("#carouselThanhToan");
    if (window.matchMedia("(min-width: 768px)").matches) {
    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
    });
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
    var cardWidth = $(".carousel-item").width();
    var scrollPosition = 0;
    $("#carouselThanhToan .carousel-control-next").on("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * 4) {
            scrollPosition += cardWidth;
            $("#carouselThanhToan .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                200
            );
        }
    });
    $("#carouselThanhToan .carousel-control-prev").on("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $("#carouselThanhToan .carousel-inner").animate(
                { scrollLeft: scrollPosition },
                200
            );
        }
    });
    } else {
        $(multipleCardCarousel).addClass("slide");
    }

</script>
@endsection
