@extends('admin.index')
@section('content')
    <form action="" method="post">
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Thay đổi</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Thay đổi thông tin sản phẩm
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success" type="submit">Lưu</button>
                <button class="btn btn-primary ml-3">Quay lại</button>
            </div>
        </div>
        @include('admin.product.form')
    </form>
@endsection
