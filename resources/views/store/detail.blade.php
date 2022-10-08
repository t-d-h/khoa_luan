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
                        <img src="{{ asset('images/' . $component->image) }}" class="img-thumbnail" style="width: 400px">
                    </div>
                    <div class="col-md-7">
                        <div>
                            <form action="" method="get">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                            <ul style="list-style: none;">
                                <li><h3>{{ $product->name }}</h3></li>
                                <li>
                                    <div style="display: flex">
                                        <div style="margin-right: 10px">
                                            <b>Màu sắc:</b>

                                        </div>
                                        @foreach($product->component as $component)
                                            <div style="width: 20px;height: 20px;border: 2px solid;border-radius: 100%;margin-right: 5px;background-color: {{ $component->color->color_code }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <h3>{{ number_format($component->first()->price) }} VND</h3>
                                </li>
                                <hr>
                                <li>
                                    <p>IPhone là một điện thoại thông minh được sản xuất bởi Apple kết hợp máy tính, iPod, máy ảnh kỹ thuật số và điện thoại di động thành một thiết bị có giao diện màn hình cảm ứng. IPhone chạy hệ điều hành iOS và vào năm 2021 khi iPhone 13 được giới thiệu, nó đã cung cấp tới 1 TB dung lượng lưu trữ và camera 12 megapixel.</p>
                                </li>
                                <hr>
                                <li>
                                    <div class="product-option">
                                        <strong class="label">Lựa chọn phiên bản</strong>
                                        <div class="options" id="versionProduct" data-id="4" style="display: flex">
                                            <input type="hidden" name="component" value="">
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li class="mau-sanpham">
                                    <div style="width: 30%;">
                                        <h4>Color</h4>
                                        <select name="color" required>
                                            @foreach($color as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 250px;">
                                        <h4>SỐ LƯỢNG</h4>
                                        <div class="slg-sanpham">
                                            <span class="giam">-</span>
                                            <input type="number" name="amount" class="soluong-sanpham" value="1" readonly style="width: 45px">
                                            <span class="tang">+</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="add" id="add-cart" style="background-color: black;color: white">
                                    THÊM VÀO GIỎ HÀNG
                                </li>
                                <li class="add" style="background-color: #f15e2c;">
                                    <a href="{{ route(STORE_CART) }}">THANH TOÁN</a>
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
            </div>
            <!--/.Slides-->

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function getMemory() {
            var form =  $('form').serializeArray();

            $.ajax({
                type: "get",
                url: "{{ route(STORE_GET_MEMORY) }}",
                data: {
                    "id": form[0].value,
                    "color": form[2].value,
                },
                success: function (e) {
                    if (e) {
                        var html = '';
                        $.each(e.data, function (key, value) {
                            // console.log(value);
                            html += '<div class="form-group">'+
                                        '<div class="item" data-component="' + value.id + '">'+
                                            '<span>'+
                                            '<label for="memory">'+
                                            '<strong>' + value.memory + 'GB</strong>'+
                                            '</label>'+
                                            '</span>'+
                                            '<strong>' + parseInt(value.price).toLocaleString() + '₫</strong>'+
                                        '</div>'+
                                    '</div>'
                        });

                        //Delete and apple new option
                        $('.product-option').find('.form-group').remove();
                        $('.product-option').find('.options').append(html);
                    }
                }
            });
        }
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

            getMemory();

            $('select[name="color"]').change(function () {
                getMemory();
                $('[name=component]').val('');
            });

            $('#versionProduct').find('.form-group:nth-child(2)').find('.item').css('background-color', 'gainsboro');

            $(document).on('click', '#versionProduct .item', function () {
                $('#versionProduct .item').removeAttr('style');
                $(this).css('background-color', 'gainsboro');
                $('[name=component]').val($(this).attr('data-component'));
                // console.log($('[name=component]').val());
            });
        });
    </script>
@endsection
