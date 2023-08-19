<?php
if(!empty($_POST)) { // ấy dữ liệu người dùng nhập. 	
	$fullname = getPost('fullname');
	$address = getPost('address');
	$email = getPost('email');
	$phone_number = getPost('phone_number');
	$order_date = date('Y-m-d H:i:s');

	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}

	if($cart == null || count($cart) == 0) {
		header('Location: product.php');
		die();
	}
	// ob_end_flush();

	$sql = "insert into ordersss (fullname, address, email, phone_number, order_date) 
			values ('$fullname', '$address', '$email', '$phone_number', '$order_date')";
	execute($sql);

	$sql = "select * from ordersss where order_date = '$order_date'";
	$order = executeResult($sql, true);

	$orderId = $order['id'];

	// trường hợp giỏ hàng đã có sản phẩm thì sẽ lặp qua và xử lý
	foreach ($cart as $item) {
		$product_id = $item['id'];
		$num = $item['num'];
		$price = $item['price'];
		$sql = "insert into order_details(order_id, product_id, num, price) 
				values ($orderId, $product_id, $num, $price)";
		execute($sql);
	}

	// session_destroy();
	unset($_SESSION['cart']);

	header('Location: complete.php');
	ob_end_flush();

	die();
}