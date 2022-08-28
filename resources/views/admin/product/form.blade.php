<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tên sản phẩm</h5>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" required/>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sản phẩm đặc biệt</h5>
                </div>
                <div class="card-body">
                    <div style="display: flex">
                        <div class="mr-2 special-product">Sản phẩm nổi bật</div>
                        <div id="san-pham-noi-bat">
                            <label class="switch form-label">
                                <input class="form-control" type="checkbox" name="sanpham" value="1" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div style="display: flex">
                        <div class="mr-2 special-product">Sản phẩm bán chạy</div>
                        <div>
                            <label class="switch form-label">
                                <input class="form-control" type="checkbox" name="option" value="2">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Hiển thị sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="switch form-label">
                            <input class="form-control" type="checkbox" name="status" checked>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Loại sản phẩm</h5>
                </div>
                <div class="card-body">
                    <select class="form-select mb-3" name="type">
                        <option selected>Chọn loại sản phẩm</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Mô tả sản phẩm</h5>
                </div>
                <div class="card-body">
                    <textarea class="form-control" id="summernote" name="description"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3" id="listItem">
            <div class="row">
                <div class="col-2">
                    <label for="memory">Chọn dung lượng</label>
                    <select name="memory">
                        <option selected>Chọn bộ nhớ</option>
                        <option>32GB</option>
                        <option>64GB</option>
                        <option>256GB</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="color">Chọn màu</label>
                    <select name="color[]">
                        <option selected>Chọn màu</option>
                        <option>xanh</option>
                        <option>đỏ</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="amount">Số lượng</label>
                    <input type="number" name="amount" style="width: 100px">
                </div>
                <div class="col-2">
                    <label for="price">Đơn giá</label>
                    <br>
                    <input type="number" name="price" style="width: 100px">
                </div>
                <div class="col-4 group-img">
                    <label for="img">Chọn hình ảnh</label>
                    <input name="img[]" type="file" style="width: 85px" />
                    <img src="#" class="imgPreview" style="width: 200px">
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="btn btn-primary" id="addGroupImg" style="width: 100px">Add</div>
        </div>

    </div>
</div>
