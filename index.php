<?php
    // index.php
    $page = $_GET['page'] ?? 'home'; // Xác định trang hiện tại
    $view = '';

    switch ($page) {
        case 'home':
            $view = 'home.php';
            $pageTitle = 'Trang chủ';
            break;
        case 'crud':
            $view = 'CRUD/crud.php';
            $pageTitle = 'Quản lý sản phẩm';
            break;
        default:
            $view = '404.php'; // Trang lỗi nếu route không hợp lệ
            $pageTitle = 'Không tìm thấy trang';
            break;
    }

    include 'layout.php'; // Load layout chung với nội dung trang cụ thể
?>