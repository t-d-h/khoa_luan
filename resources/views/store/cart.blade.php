@extends('index')
@section('content')
<!-- Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            @if(isset($data))
                <form action="" method="get">
                @foreach($data as $row)
                    <input type="hidden" name="component[]" value="{{ $row['id'] }}">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('image/' . $row['img']) }}" class="img-thumbnail">
                        </div>
                        <div class="col-md-6">
                            <div class="infor-gio">
                                <h5>{{ $row['name'] ?? null }}</h5>
                                <p>Giá: {{ number_format($row['price']) }} VND</p>
                                <div class="mau-sanpham">
                                    <div style="width: 30%;">
                                        <h4>Color</h4>
                                        <select readonly>
                                            <option>{{ $row['color'] }}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <h4>SỐ LƯỢNG</h4>
                                        <div class="slg-sanpham" style="width: 110px; margin-right: 50px;">
                                            <span class="giam">-</span>
                                            <input type="number" name="amount" class="soluong-sanpham" value="{{ $row['amount'] }}" readonly style="width: 45px">
                                            <span class="tang">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="giohang-sub">
                                <h5>
                                    <span class="price">{{ number_format($row['price']) }}</span>
                                    <span>VND</span>
                                </h5>
                                <p>Còn hàng</p>
                                <button class="btn btn-light">Thích</button>
                                <button class="btn btn-dark">Xóa</button>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                @endforeach
                </form>
            @endif

            <!-- Bottem -->
            <hr style="width: 100%; height: 4px; background-color: black;">
            <div style="display: flex; justify-content: space-around;">
                <button class="btn btn-dark"><a href="">XÓA HẾT</a></button>
                <button class="btn btn-dark"><a href="">QUAY LẠI MUA HÀNG</a></button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="giohang-left">
                <h5>ĐƠN HÀNG</h5>
                <hr>
                <div class="form-group">
                    <label>NHẬP MÃ KHUYẾN MÃI</label>
                    <input type="text" name=""><span><button class="btn btn-warning">ÁP DỤNG</button></span>
                </div>
                <hr>
                <div class="don-gia">
                    <div>
                        <p>Đơn hàng</p>
                        <p>Giảm</p>
                    </div>
                    <div style="text-align: right;">
                        <p>
                            <span id="price-don"></span>
                            <span>VND</span>
                        </p>
                        <p>0 VND</p>
                    </div>
                </div>
                <hr class="mt-2">
                <div class="thanhtoan">
                    <div>
                        <p>TỔNG: </p>
                        <p id="price-tong">800.000 <span>VND</span></p>
                    </div>
                    <button class="btn btn-warning">THANH TOÁN</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function updatePrice(status, element) {
        var row = element.closest('.row');
        var dongia = Number(row.find('.price').html().replace(',', ''));
        // console.log(dongia);
        var donhang = Number(element.closest('.container').find('#price-don').html());
        if (status == 'tang') {
            var total = dongia + donhang;
        } else {
            var total = donhang - dongia;
        }
        element.closest('.container').find('#price-don').html(total);
    }
    $(document).ready(function() {
        //thay doi so luong
        $(".tang").click(function (event) {
            var tg = $(this).closest('.slg-sanpham');
            var sl = Number(tg.find(".soluong-sanpham").val());
            tg.find(".soluong-sanpham").val(sl + 1);
            tg.find(".giam").css({
                cursor: 'pointer',
                color: 'red'
            });

            updatePrice('tang', $(this));
        });

        $(".giam").click(function (event) {
            var tg = $(this).closest('.slg-sanpham');
            var sl = Number(tg.find('.soluong-sanpham').val());
            if (sl > 2) {
                tg.find('.soluong-sanpham').val(sl - 1);
            } else {
                tg.find('.soluong-sanpham').val(1);
                $(this).css({
                    cursor: 'not-allowed',
                    color: 'black'
                });
            }

            updatePrice('giam', $(this));
        });
    });
</script>
@endsection
