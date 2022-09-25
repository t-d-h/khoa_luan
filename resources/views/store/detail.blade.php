@extends('index')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('continent') }}
            </div>
        </div>

        <hr style="width: 100%; margin-top: 8px; height: 4px;">

        <div class="row mt-3" id="sanpham">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/' . $component->first()->image) }}" class="img-thumbnail" style="width: 400px">
                    </div>
                    <div class="col-md-7">
                        <div>
                            <form action="" method="get">
                                <input type="hidden" name="id" value="1">
                            <ul style="list-style: none;">
                                <li><h3>TÊN SẢN PHẨM</h3></li>
                                <li>
                                    <span>Mã sản phẩm: </span>
                                    <span><b>A82198</b></span>
                                </li>
                                <li><h3>{{ $component->first()->price }} VND</h3></li>
                                <hr>
                                <li><p>"Urbas Pineapple or Ananas Pack" với quai dán tiện lợi gây ấn tượng với những
                                        phối màu "rất vui". Kĩ thuật in foxing lần đầu tiên được sử dụng với dòng chữ
                                        "Pineapple Ananas" chạy dọc viền quanh. Điểm nhấn cuối cùng chính là thiết kế
                                        quả Dứa được thêu tỉ mỉ ở quai dán thay cho logo cách điệu thường thấy càng làm
                                        rõ hơn tính cách của dòng sản phẩm Urbas và thông điệp muốn truyền tải của bộ
                                        sản phẩm.</p></li>
                                <hr>
                                <li>
                                    <div class="product-option">
                                        <strong class="label">Lựa chọn phiên bản</strong>
                                        <div class="options" id="versionProduct" data-id="4" style="display: flex">
                                            <input type="hidden" name="component"
                                                   value="{{ $component->first()->id }}">

{{--                                                <div class="form-group">--}}
{{--                                                    <div class="item" data-component="{{ $row->id }}">--}}
{{--                                                        <span>--}}
{{--                                                            <label for="memory">--}}
{{--                                                                <strong>{{ $row->memory }}GB</strong>--}}
{{--                                                            </label>--}}
{{--                                                        </span>--}}
{{--                                                        <strong>{{ $row->price }} ₫</strong>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                        </div>
                                    </div>
                                    <div class="color-option">
                                        <strong class="label">Lựa chọn màu sắc</strong>
                                        <div class="options" id="versionColor" data-id="4" style="display: flex">
                                            @foreach($color as $row)
                                                <div class="form-group">
                                                    <div class="item" data-color="{{ $row->id }}">
                                                        {{ $row->name }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li class="mau-sanpham">
                                    <div style="width: 30%;">
                                        <h4>SIZE</h4>
                                        <select name="color">
                                            <option>36</option>
                                            <option>37</option>
                                            <option>38</option>
                                        </select>
                                    </div>
                                    <div>
                                        <h4>SỐ LƯỢNG</h4>
                                        <div class="slg-sanpham">
                                            <span class="giam">-</span>
                                            <input type="number" name="amount" class="soluong-sanpham" value="1" readonly>
                                            <span class="tang">+</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="add" id="add-cart" style="background-color: black;color: white">
                                    THÊM VÀO GIỎ HÀNG
                                </li>
                                <li class="add" style="background-color: #f15e2c;">
                                    <a href="">THANH TOÁN</a>
                                </li>
                            </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Sản phẩm liên quan -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <h2 class="text-center">Sản phẩm liên quan</h2>
            </div>
        </div>

        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="border-product">
                                <img
                                    src="https://mypro.vn/image/cache/catalog/giay/giaynikenam/giay-nike-downshifter-10-nam-den-do-01-800x800_0-800x800.jpg"
                                    class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/nike-alphadunk-bq5401-900.jpg?v=1614076993833"
                                    class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg"
                                    class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg"
                                    class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="border-product">
                                <img src="https://cetofashions.com/wp-content/uploads/2020/09/M1311.jpg"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://cetofashions.com/wp-content/uploads/2020/09/M1311.jpg"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://cetofashions.com/wp-content/uploads/2020/09/M1311.jpg"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://cetofashions.com/wp-content/uploads/2020/09/M1311.jpg"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->

                <a class="carousel-control-prev" href="#multi-item-example" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#multi-item-example" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--/.Slides-->

        </div>
    </div>

    <hr>

    <!-- Phụ kiện -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="text-center">Phụ kiện</h2>
            </div>
        </div>

        <div id="multi-item" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="border-product">
                                <img
                                    src="https://mypro.vn/image/cache/catalog/giay/giaynikenam/giay-nike-downshifter-10-nam-den-do-01-800x800_0-800x800.jpg"
                                    class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/nike-alphadunk-bq5401-900.jpg?v=1614076993833"
                                    class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg"
                                    class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img
                                    src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg"
                                    class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="border-product">
                                <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png"
                                     class="img-thumbnail" class="img-thumbnail">
                                <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                                <p>While/Black</p>
                                <div><strong>100.000 VNĐ</strong></div>
                                <button class="btn btn-danger">Mua ngay</button>
                                <div class="add-cart">
                                    <button class="btn btn-success">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->


                <a class="carousel-control-prev" href="#multi-item" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#multi-item" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--/.Slides-->

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
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

            $('#versionProduct').find('.form-group:nth-child(2)').find('.item').css('background-color', 'gainsboro');
            $('#versionColor').find('.form-group:nth-child(1)').find('.item').css('background-color', 'gainsboro');

            $('#versionProduct .item').click(function () {
                $('#versionProduct .item').removeAttr('style');
                $(this).css('background-color', 'gainsboro');
                $('[name=component]').val($(this).attr('data-component'));
                console.log($('[name=component]').val());
            });

            $('#versionColor .item').click(function () {
                $('#versionColor .item').removeAttr('style');
                $(this).css('background-color', 'gainsboro');
                console.log($(this).attr('data-color'));
            });
        });
    </script>
@endsection
