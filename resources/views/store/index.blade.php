<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/css.css') }}">
    <script src="{{ mix('/js/cart.js') }}"></script>
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link href='https://css.gg/arrow-up-r.css' rel='stylesheet'>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-pink">
    <a href="" class="navbar-brand">Store</a>
    <button class="navbar-toggler mr-5" data-toggle="collapse" data-target="#ResponsiveNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="ResponsiveNavbar">
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <a href="" class="nav-link active">Trang chủ</a>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                <div class="dropdown-menu mt-2 bg-pink dropdown-nav" style="width: 200px !important;
    					height: auto !important;">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <a href="" class="dropdown-item">Iphone</a>
                                <a href="" class="dropdown-item">Samsung</a>
                                <a href="" class="dropdown-item">Nokia</a>
                                <a href="" class="dropdown-item">Thụ kiện</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Giỏ hàng</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Thông tin</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Liên hệ</a>
            </li>
            <li class="nav-item" style="position: relative">
                <a class="nav-link login info-user">Đăng nhập</a>
                <div class="dropdown-info-user mt-2 bg-pink">
                    <a href="" class="dropdown-item">Thông tin</a>
                    <a href="" class="dropdown-item">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

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


<!-- Sản phẩm nổi bật -->
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
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="2">
                <img src="https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/nike-alphadunk-bq5401-900.jpg?v=1614076993833" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 2</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="3">
                <img src="https://image.yes24.vn/Upload/catalogcontentbos2019/thoitrangtheone/free-rn-5-running-shoe-4chrbs.jpg" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 3</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="4">
                <img src="https://fsport247.com/wp-content/uploads/2021/05/nike-air-max-97.png" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 4</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sản phẩm bán chạy -->
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="title-product">Sản phẩm bán chạy</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="5">
                <img src="http://thoitrangbigsize.vn/wp-content/uploads/2019/03/2-16.jpg" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 5</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="6">
                <img src="https://cetofashions.com/wp-content/uploads/2020/09/M1311.jpg" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 6</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="7">
                <img src="https://cf.shopee.vn/file/8a83168eb686d4829f52f56ca1d3c4f8" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 7</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="border-product">
                <input type="hidden" name="product_id" value="8">
                <img src="http://cungdeal.com/cungdeal/uploads/images/TN1273/1273%20(1).jpg" class="img-thumbnail">
                <div class="pt-3 name"><strong>Tên sản phẩm 8</strong></div>
                <p>While/Black</p>
                <div><strong class="price">100.000 VNĐ</strong></div>
                <button class="btn btn-danger">Mua ngay</button>
                <div class="add-cart">
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div id="summernote">Hello Summernote</div>

<!-- Sản phẩm mới -->
<div class="new-product mt-5">
    <img src="images/dfa4c658f5dc35afb30e1166a9ba4574.jpg" class="img-fluid">
    <div>
        <h3>Nike Hypervemon</h3>
        <p>Up to sale 70%</p>
        <button class="btn btn-danger">Mua ngay</button>
    </div>
</div>

<!-- Taskbar left -->
<div class="taskbar-left">
    <div class="giohang">
        <p id="soluong">1</p>
        <button class="btn"><i class="gg-shopping-cart"></i></button>
        <div class="dropdown-giohang">
            <div id="scroll-giohang">
                <div class="row">
                    <div class="col-md-5">
                        <img src="images/800x800/8.jpg">
                    </div>
                    <div class="col-md-7">
                        <strong>Tên sản phẩm 3</strong>
                        <div class="product-giohang">
                            <div>
                                <p>Giá: </p>
                                <p>100.000 VND</p>
                            </div>
                            <div>
                                <p>Size: </p>
                                <p>34</p>
                            </div>
                            <div>
                                <p>Số lượng: </p>
                                <p>1</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12" id="tong-giohang">
                    <b>Tổng:</b>
                    <p>100.000VND</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger w-75">Thanh toán</button>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<div class="container-flude bg-dark">
    <div class="container">
        <div class="row mt-5 bg-dark text-white px-3 py-5"  id="footer">
            <div class="col-md-3 col-sm-6">
                <div>
                    <h6 class="mb-4">HỆ THỐNG CỬA HÀNG</h6>
                    <div><a href="">Địa chỉ: Số 16 Ngõ 58 Trần Bình, Mai Dịch, Cầu Giấy, Hà Nội</a></div>
                    <div><a href="">Số điện thoại: 0969705425</a></div>
                    <div><a href="">Email: hungvumanh11o23@gmail.com</a></div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div>
                    <h6 class="mb-4">HỖ TRỢ</h6>
                    <div><a href="">Hướng dẫn chọn cỡ giày</a></div>
                    <div><a href="">Chính sách đổi trả/ hoàn tiền</a></div>
                    <div><a href="">Chính sách bảo mật thông tin</a></div>
                    <div><a href="">Chính sách bảo hành</a></div>
                    <div><a href="">Hường dẫn mua hàng</a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div>
                    <h6 class="mb-4">LIÊN HỆ VỚI SHOP</h6>
                    <div><a href="">Hướng dẫn đặt hàng</a></div>
                    <div><a href="">Thông tin thanh toán</a></div>
                    <div><a href="">Chính sách giao hàng và nhận hàng</a></div>
                    <div><a href="">Liên hệ</a></div>
                    <div><a href="">Sơ đồ website</a></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div>
                    <h6 class="mb-4">CONTACT US</h6>
                    <div><a href="">content</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll-top-->
<div id="scroll-top">
    <i class="gg-arrow-up-r" style="cursor: pointer;"></i>
</div>

<!-- Thêm vào giỏ -->
<div id="add-cart-effect">
    <p>Đã thêm vào giỏ</p>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.info-user').click(function () {
            if ($('.dropdown-info-user').css('display') == 'none') {
                $('.dropdown-info-user').css('display', 'block');
            } else {
                $('.dropdown-info-user').css('display', 'none');
            }
        });

        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $(window).scroll(function(event) {
            var pos = $('html, body').scrollTop();
            if(pos >= 500){
                $("#scroll-top").css('opacity', '1');
                $(".taskbar-left").css('opacity', '1');
            }
            else{
                $("#scroll-top").css('opacity', '0');
                $(".taskbar-left").css('opacity', '0');
            }
        });

        $(".giohang").click(function(event) {
            var check = $(".dropdown-giohang").css('display');
            if(check == 'block'){
                $(".dropdown-giohang").css('display', 'none');
            }
            else{
                $(".dropdown-giohang").css('display', 'block');
            }
        });

        $("#scroll-top").click(function(event) {
            $("html, body").animate({ scrollTop:0 }, 1400);
        });


    });
</script>
</body>
</html>
