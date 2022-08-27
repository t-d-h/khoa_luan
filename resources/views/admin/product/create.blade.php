@extends('admin.index')
@section('content')
    <form action="{{ route(ADMIN_PRODUCT) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Tạo mới</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Thêm mới sản phẩm
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success" type="submit">Lưu</button>
                <button class="btn btn-primary ml-3">Quay lại</button>
            </div>
        </div>
        @include('admin.product.form')
        <input type="submit" value="submit">
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".group-img input").on('change', function () {
                let $file = $(this);

                if ($file.prop('files') && $file.prop('files')[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        console.log(e.target.result);
                        $file.closest('.group-img').find('.imgPreview')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL($file.prop('files')[0]);
                }
            })
        });
    </script>

@endsection
