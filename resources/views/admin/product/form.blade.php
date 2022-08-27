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

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sản phẩm đặc biệt</h5>
                </div>
                <div class="card-body">
                    <div style="display: flex">
                        <div class="mr-2 special-product">Sản phẩm nổi bật</div>
                        <div>
                            <label class="switch form-label">
                                <input class="form-control" type="checkbox" name="option" value="1" checked>
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
                    <h5 class="card-title mb-0">Số lượng sản phẩm</h5>
                </div>
                <div class="card-body">
                    <input type="number" class="form-control" placeholder="Nhập số lượng sản phẩm" name="amount"
                           required min="1"/>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Đơn giá</h5>
                </div>
                <div class="card-body">
                    <input type="number" class="form-control" placeholder="Nhập đơn giá sản phẩm" name="price" required
                           min="1"/>
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
    </div>
    <div class="row">
        <div class="col-12 mb-3" id="listItem">
            <div class="mb-2 group-img">
                <input name="img" type='file'/>
                <img src="#" class="imgPreview">
            </div>
        </div>
        <div class="btn btn-primary" onclick="addGroupImg()">Add</div>
    </div>
</div>
