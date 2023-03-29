<?php
$actual_link = "$_SERVER[REQUEST_URI]";
if ($actual_link === "/TT_TotNghiep_2023/admin/" || $actual_link === "/TT_TotNghiep_2023/admin/index.php") {
    $url_logo = "index.php";
    $src_assets = "";
} else {
    $url_logo = "../index.php";
    $src_assets = "../";
}
?>
<!-- bundle -->
<script src="<?php echo $src_assets ?>assets/js/vendor.min.js"></script>
<script src="<?php echo $src_assets ?>assets/js/app.min.js"></script>

<!-- third party js -->
<script src="<?php echo $src_assets ?>assets/js/vendor/apexcharts.min.js"></script>
<script src="<?php echo $src_assets ?>assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $src_assets ?>assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="<?php echo $src_assets ?>assets/js/pages/demo.dashboard.js"></script>
<!-- end demo js-->