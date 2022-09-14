<?php

define('STORE_PRODUCT_DETAIL', 'store.product.detail');
define('STORE', 'store');
define('CREATE_PAYMENT_VNPAY', 'create.payment.vnpay');
define('VNP_TMNCODE', '0MXE8R5O');
define('VNP_HASHSECRET', 'MPWTZMJNAFXHKCJUQBHQUSUESFOISYFD');
define('VNP_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
define('VNP_RETURNURL', '127.0.0.1:8000/store/vnpay/result');
//Alert
define('CHANGE_SUCCESS', 'Thay đổi thành công');
define('ADD_SUCCESS', 'Thêm thành công');
define('DELETE_SUCCESS', 'Xoá thành công');
define('CHANGE_FAIL', 'Thay đổi thất bại');
define('ADD_FAIL', 'Thêm thất bại');
define('DELETE_FAIL', 'Xoá thất bại');

//Admin dashboard
define('ADMIN_DASHBOARD', 'admin.dashboard');

//Admin product CRUD
define('ADMIN_PRODUCT_STORE', 'admin.product.store');
define('ADMIN_PRODUCT_INDEX', 'admin.product.index');
define('ADMIN_PRODUCT_CREATE', 'admin.product.create');
define('ADMIN_PRODUCT_EDIT', 'admin.product.edit');
define('ADMIN_PRODUCT_DELETE', 'admin.product.delete');
define('GET_PRODUCT_SPECIAL', 'get.product.special');

//Admmin product type CRUD
define('ADMIN_PRODUCT_TYPE_STORE', 'admin.product.type.store');
define('ADMIN_PRODUCT_TYPE_INDEX', 'admin.product.type.index');
define('ADMIN_PRODUCT_TYPE_CREATE', 'admin.product.type.create');
define('ADMIN_PRODUCT_TYPE_EDIT', 'admin.product.type.edit');
define('ADMIN_PRODUCT_TYPE_DELETE', 'admin.product.type.delete');

//Admmin product color CRUD
define('ADMIN_PRODUCT_COLOR_STORE', 'admin.product.color.store');
define('ADMIN_PRODUCT_COLOR_INDEX', 'admin.product.color.index');
define('ADMIN_PRODUCT_COLOR_CREATE', 'admin.product.color.create');
define('ADMIN_PRODUCT_COLOR_EDIT', 'admin.product.color.edit');
define('ADMIN_PRODUCT_COLOR_DELETE', 'admin.product.color.delete');

//Admmin product special CRUD
define('ADMIN_PRODUCT_SPECIAL_STORE', 'admin.product.special.store');
define('ADMIN_PRODUCT_SPECIAL_INDEX', 'admin.product.special.index');
define('ADMIN_PRODUCT_SPECIAL_CREATE', 'admin.product.special.create');
define('ADMIN_PRODUCT_SPECIAL_EDIT', 'admin.product.special.edit');
define('ADMIN_PRODUCT_SPECIAL_DELETE', 'admin.product.special.delete');

define('PRODUCT_MEMORY', [
    '32'    => '32GB',
    '64'    => '64GB',
    '128'   => '128GB'
]);
