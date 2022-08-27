@extends('admin.index')
@section('content')
    <div class="row mb-3">
        <div class="col-lg-6">
            <div>
                <h1 class="h3 d-inline align-middle">Màu sản phẩm</h1>
                <a class="badge bg-dark text-white ms-2">
                    Danh sách màu sắc sản phẩm
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <button class="btn btn-primary ml-3" type="submit">Thêm mới</button>
            <button class="btn btn-info ml-3">Quay lại</button>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6">
                <table class="table table-bordered table-hover table-striped" id="users-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Màu sản phẩm</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="col-6">
                @include('admin.product_color.form')
            </div>
        </div>
    </div>
@endsection
