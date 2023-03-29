<?php
$actual_link = "$_SERVER[REQUEST_URI]";
if ($actual_link === "/TT_TotNghiep_2023/admin/" || $actual_link === "/TT_TotNghiep_2023/admin/index.php") {
    if (str_contains($actual_link, "product")) {
        $url_product = "../product/index.php";
        $url_add_product = "../product/add_product.php";
    } else {
        $url_product = "product/index.php";
        $url_add_product = "product/add_product.php";
    }

    if (str_contains($actual_link, "manufacturer")) {
        $url_manufacturer = "../manufacturer/index.php";
        $url_add_manufacturer = "../manufacturer/add_manufacturer.php";
    } else {
        $url_manufacturer = "manufacturer/index.php";
        $url_add_manufacturer = "manufacturer/add_manufacturer.php";
    }

    if (str_contains($actual_link, "employee")) {
        $url_employee = "../employee/index.php";
        $url_add_employee = "../employee/add_employee.php";
    } else {
        $url_employee = "employee/index.php";
        $url_add_employee = "employee/add_employee.php";
    }

    if (str_contains($actual_link, "customer")) {
        $url_customer = "../customer/index.php";
        $url_add_customer = "../customer/add_customer.php";
    } else {
        $url_customer = "customer/index.php";
        $url_add_customer = "customer/add_customer.php";
    }
    if (str_contains($actual_link, 'order')) {
        $url_order = "../order/index.php";
    } else {
        $url_order = "order/index.php";
    }

    $src_assets = "";
    $src_logout = "";
} else {
    if (str_contains($actual_link, "product")) {
        $url_product = "index.php";
        $url_add_product = "add_product.php";
    } else {
        $url_product = "../product/index.php";
        $url_add_product = "../product/add_product.php";
    }

    if (str_contains($actual_link, "manufacturer")) {
        $url_manufacturer = "index.php";
        $url_add_manufacturer = "add_manufacturer.php";
    } else {
        $url_manufacturer = "../manufacturer/index.php";
        $url_add_manufacturer = "../manufacturer/add_manufacturer.php";
    }

    if (str_contains($actual_link, "employee")) {
        $url_employee = "index.php";
        $url_add_employee = "add_employee.php";
    } else {
        $url_employee = "../employee/index.php";
        $url_add_employee = "../employee/add_employee.php";
    }

    if (str_contains($actual_link, "customer")) {
        $url_customer = "index.php";
        $url_add_customer = "add_customer.php";
    } else {
        $url_customer = "../customer/index.php";
        $url_add_customer = "../customer/add_customer.php";
    }
    if (str_contains($actual_link, "order")) {
        $url_order = "index.php";
    } else {
        $url_order = "../order/index.php";
    }


    $src_assets = "../";
    $src_logout = "../";
}
?>
<ul class="metismenu side-nav">
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-store"></i>
            <span>Quản lý sản phẩm </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo $url_product; ?>">Tất cả sản phẩm</a>
            </li>
            <li>
                <a href="<?php echo $url_add_product; ?>">Thêm sản phẩm mới</a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-store"></i>
            <span> Quản lý loại hàng </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo $url_manufacturer ?>">Tất cả loại hàng</a>
            </li>
            <li>
                <a href="<?php echo $url_add_manufacturer ?>">Thêm loại hàng mới</a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-store"></i>
            <span> Quản lý nhân viên </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo $url_employee ?>">Danh sách nhân viên</a>
            </li>
            <li>
                <a href="<?php echo $url_add_employee ?>">Thêm mới nhân viên</a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-store"></i>
            <span> Quản lý khách hàng </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo $url_customer ?>">Danh sách khách hàng</a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-store"></i>
            <span> Quản lý đơn hàng </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li>
                <a href="<?php echo $url_order ?>">Danh sách đơn hàng</a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="<?php echo $src_logout ?>logout.php" class="side-nav-link">
            <span>Đăng xuất</span>
        </a>
    </li>
</ul>