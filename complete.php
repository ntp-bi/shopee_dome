<?php
session_start();

$title = 'Complete Page';
include_once('layouts/header_Detail.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');
?>
<div class="container" style="height: 400px; margin-top: 200px">
	<h1 style="text-align: center; color: var(--primary-color); font-size: 20px; font-weight:400;">
	Bạn đã đặt hàng thành công</h1>
</div>
<!-- body END -->
<?php
include_once('layouts/footer_Detail.php');
?>