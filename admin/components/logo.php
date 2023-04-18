<?php
$actual_link = "$_SERVER[REQUEST_URI]";
if ($actual_link === "/DoAnTotNghiep2023/admin/" || $actual_link === "/DoAnTotNghiep2023/admin/index.php") {
    $url_logo = "index.php";
    $src_assets = "";
} else {
    $url_logo = "../index.php";
    $src_assets = "../";
}
?>
<!-- LOGO -->
<a href="<?php echo $url_logo ?>" class="logo text-center logo-light">
    <span class="logo-lg">
        <img src="<?php echo $src_assets ?>assets/images/logo-new.png" alt="" width="151" height="45">
    </span>
    <span class="logo-sm">
        <img src="assets/images/logo_sm.png" alt="" height="16">
    </span>
</a>

<!-- LOGO -->
<a href="<?php echo $url_logo ?>" class="logo text-center logo-dark">
    <span class="logo-lg">
        <img src="<?php echo $src_assets ?>assets/images/logo-dark.png" alt="" height="16">
    </span>
    <span class="logo-sm">
        <img src="<?php echo $src_assets ?>assets/images/logo_sm_dark.png" alt="" height="16">
    </span>
</a>