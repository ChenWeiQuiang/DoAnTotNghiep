<?php
$actual_link = "$_SERVER[REQUEST_URI]";
if ($actual_link === "/DoAnTotNghiep2023/admin/" || $actual_link === "/DoAnTotNghiep2023/admin/index.php") {
    $src_assets = "";
} else {
    $src_assets = "../";
}
if (!isset($title)) {
    $title = 'CMS - ABC Shop';
}
?>
<meta charset="utf-8" />
<title><?php echo $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- third party css -->
<link href="<?php echo $src_assets ?>assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<!-- App css -->
<link href="<?php echo $src_assets ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $src_assets ?>assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
<link href="<?php echo $src_assets ?>assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>