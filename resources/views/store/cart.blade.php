@extends('index')
@section('content')
<!-- Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            @foreach($component as $row)
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('image/' . $row->image) }}" class="img-thumbnail">
                </div>
                <div class="col-md-6">
                    <div class="infor-gio">
                        <h5>Tên sản phẩm</h5>
                        <p>Giá: 300.000 VND</p>
                        <div class="mau-sanpham">
                            <div style="width: 30%;">
                                <h4>SIZE</h4>
                                <select>
                                    <option>36</option>
                                    <option>37</option>
                                    <option>38</option>
                                </select>
                            </div>
                            <div>
                                <h4>SỐ LƯỢNG</h4>
                                <div class="slg-sanpham">
                                    <span class="giam">-</span>
                                    <input type="number" name="" class="soluong-sanpham" value="1" readonly>
                                    <span class="tang">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="giohang-sub">
                        <h5><span class="price">300</span><span> .000VND</span></h5>
                        <p>Còn hàng</p>
                        <button class="btn btn-light">Thích</button>
                        <button class="btn btn-dark">Xóa</button>
                    </div>
                </div>
            </div>
            <hr style="width: 100%;">
            @endforeach


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
                        <p><span id="price-don">800</span><span> .000VND</span></p>
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

            var row = $(this).closest('.row');
            var dongia = Number(row.find('.price').html());
            var donhang = Number($(this).closest('.container').find('#price-don').html());
            $(this).closest('.container').find('#price-don').html(dongia + donhang);
            //alert(dongia);

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

        });
    });
</script>
@endsection
