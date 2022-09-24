@extends('index')
@section('content')
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://suprememobiles.in/public/vendor/conceps-admin/assets/global/plugins/ckeditor/image_uploader/uploads/213815c6.jpg" class="d-block w-100" alt="anh">
        </div>
        <div class="carousel-item">
            <img src="https://theme.hstatic.net/200000191303/1000790874/14/ms_banner_img2.jpg?v=22" class="d-block w-100" alt="anh">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Main Content-->
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="title-product">Sản phẩm nổi bật</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
                <div class="border-product">
                    <input type="hidden" name="product_id" value="1">
                    <img src="https://mypro.vn/image/cache/catalog/giay/giaynikenam/giay-nike-downshifter-10-nam-den-do-01-800x800_0-800x800.jpg" class="img-thumbnail">
                    <div class="pt-3 name"><strong>Tên sản phẩm 1</strong></div>
                    <p>While/Black</p>
                    <div><strong class="price">100.000 VNĐ</strong></div>
                    <a class="btn btn-danger">Mua ngay</a>
                </div>
        </div>
        <div class="col-md-3">
            <a href="">
                <div class="border-product">
                    <input type="hidden" name="product_id" value="2">
                    <img src="https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/nike-alphadunk-bq5401-900.jpg?v=1614076993833" class="img-thumbnail">
                    <div class="pt-3 name"><strong>Tên sản phẩm 2</strong></div>
                    <p>While/Black</p>
                    <div><strong class="price">100.000 VNĐ</strong></div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="">
                <div class="border-product">
                    <input type="hidden" name="product_id" value="3">
                    <img src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg" class="img-thumbnail">
                    <div class="pt-3 name"><strong>Tên sản phẩm 3</strong></div>
                    <p>While/Black</p>
                    <div><strong class="price">100.000 VNĐ</strong></div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="">
                <div class="border-product">
                    <input type="hidden" name="product_id" value="4">
                    <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png" class="img-thumbnail">
                    <div class="pt-3 name"><strong>Tên sản phẩm 4</strong></div>
                    <p>While/Black</p>
                    <div><strong class="price">100.000 VNĐ</strong></div>
                </div>
            </a>
        </div>
    </div>
</div>

<hr>

<!-- Sản phẩm mới -->
<div class="new-product mt-5">
    <img src="images/dfa4c658f5dc35afb30e1166a9ba4574.jpg" class="img-fluid">
    <div>
        <h3>Nike Hypervemon</h3>
        <p>Up to sale 70%</p>
    </div>
</div>
@endsection


