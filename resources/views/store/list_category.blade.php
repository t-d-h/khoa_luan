@extends('index')
@section('content')
<!-- Sản phẩm -->
<div class="container option">
    <div class="row mt-5">
        <div class="col-md-3 mt-5">
            <div class="dropdown-danhsach">
                <h3>TRẠNG THÁI</h3>
                <ul class="dropdown-content" style="list-style-type: inherit;">
                    <li class="type">Sale off</li>
                    <li class="type">Best Saler</li>
                    <li class="type">New</li>
                </ul>
            </div>
            <hr>
            <div class="dropdown-danhsach">
                <h3>DÒNG SẢN PHẨM</h3>
                <ul class="dropdown-content" style="list-style-type: inherit;">
                    <li class="type">Loại 1</li>
                    <li class="type">Loại 2</li>
                    <li class="type">Loại 3</li>
                </ul>
            </div>
            <hr>
            <div class="dropdown-danhsach">
                <h3>GIÁ</h3>
                <ul class="dropdown-content" style="list-style-type: inherit;">
                    <li class="type">Loại 1</li>
                    <li class="type">Loại 2</li>
                    <li class="type">Loại 3</li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <img src="https://rsggroup.com/wp-content/uploads/2020/03/bg-3-980x325.jpg" class="img-thumbnail">
                </div>
            </div>
            <div class="row">
                <div class="search-bar col-12">
                    <div>
                        Tăng dần <input type="radio" name="gia" class="sort">
                        Giảm dần <input type="radio" name="gia"  class="sort">
                    </div>
                    <form>
                        <input type="search" name="" placeholder="Nhập tên sản phẩm">
                        <input type="submit" name="" class="btn btn-success">
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="border-product">
                        <img src="http://thoitrangbigsize.vn/wp-content/uploads/2019/03/2-16.jpg" class="img-thumbnail">
                        <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                        <p>While/Black</p>
                        <div><strong>100.000 VNĐ</strong></div>
                        <button class="btn btn-danger">Mua ngay</button>
                        <div class="add-cart">
                            <button class="btn btn-success">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-product">
                        <img src="https://cf.shopee.vn/file/8a83168eb686d4829f52f56ca1d3c4f8" class="img-thumbnail">
                        <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                        <p>While/Black</p>
                        <div><strong>100.000 VNĐ</strong></div>
                        <button class="btn btn-danger">Mua ngay</button>
                        <div class="add-cart">
                            <button class="btn btn-success">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-product">
                        <img src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg" class="img-thumbnail">
                        <div class="pt-3"><strong>Tên sản phẩm</strong></div>
                        <p>While/Black</p>
                        <div><strong>100.000 VNĐ</strong></div>
                        <button class="btn btn-danger">Mua ngay</button>
                        <div class="add-cart">
                            <button class="btn btn-success">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-product">
                        <img src="http://cungdeal.com/cungdeal/uploads/images/TN1273/1273%20(1).jpg" class="img-thumbnail">
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
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(".type").click(function (event) {
            $(".type").css('background-color', 'white');
            $(this).css('background-color', 'lightgray');
        });

    </script>
@endsection
