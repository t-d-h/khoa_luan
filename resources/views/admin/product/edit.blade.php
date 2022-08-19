@extends('admin.index')
@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Thay đổi</h1>
        <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
            Thay đổi thông tin sản phẩm
        </a>
    </div>
    @include('admin.product.form')
@endsection
