@extends('admin.index')
@section('content')
    <form action="{{ route(ADMIN_PRODUCT_COLOR_STORE) }}" method="post" id="add-color-form">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Hoá đơn</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Danh sách hoá đơn
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-info ml-3" href="{{ route(ADMIN_DASHBOARD) }}">Quay lại</a>
            </div>
        </div>

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-10">
                    <table class="table table-bordered table-hover table-striped" id="users-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã hoá đơn</th>
                            <th>Người dùng</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->order_id }}</td>
                                <td>{{ $row->customer->name }}</td>
                                <td>{{ $row->payment_type }}</td>
                                <td>{{ $row->total }}</td>
                                <td>
                                    @if($row->status == 1)
                                        <p class="text-bg-success text-center">Thành công</p>
                                    @elseif($row->status == 0)
                                        <p class="text-bg-danger text-center">Thất bại</p>
                                    @else
                                        <p class="text-bg-secondary text-center">Đăng xử lý</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#detail"
                                         onclick="getinfo({{ $row->order_id }})">Chi tiết</div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông tin đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table-bordered table-dark w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Dung lượng</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Tổng</th>
                                </tr>
                                </thead>
                                <tbody id="info-modal">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        function getinfo(data) {
            $('#info-modal').html('');
            $.ajax({
                type: "get",
                url: "/store/customer/get-bill-info",
                data: {
                    "id": data,
                },
                success: function success(e) {
                    window.total = e.data[0].total;
                    var html = '';
                    $('[name="order_id"]').val(e.data[0].order_id);
                    $.each(e.data, function (key, value) {
                        html += '<tr>'+
                            '<th>'+ Number(key + 1) +'</th>'+
                            '<th>'+ value.product_name +'</th>'+
                            '<th>'+ value.memory +'</th>'+
                            '<th>'+ value.color +'</th>'+
                            '<th>'+ value.amount +'</th>'+
                            '<th>'+ value.price +'</th>'+
                            '<th>'+ value.product_total +'</th>'+
                            '</tr>'
                    });

                    //Add total
                    html += '<tr>'+
                        '<td colspan="6">Tổng</td>'+
                        '<td>'+ window.total +'</td>'+
                        '</tr>'

                    $('#info-modal').append(html);
                }
            });
        }
    </script>
@endsection
