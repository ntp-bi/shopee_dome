<?php
    session_start();
	ob_start();

    $title = 'Thanh toán';
    include_once('./layouts/header_Detail.php');
    require_once('./db/dbhelper.php');
    require_once('./utils/utility.php');
    require_once('./api/Handle_Checkout.php');
?>

<link rel="stylesheet" href="./assets/css/style.css">

<form action="" method="post">
    <div class="gird wide">
        <div class="row sm-gutter main__content">
        <div class="address_checkout">
            <div class="address_info">
                <div class="address_address">
                    <i class="address_icon fa-solid fa-location-dot"></i>
                    <p>Địa Chỉ Nhận Hàng</p>
                    <span>Nguyễn Tâm Phước (+84)<br>123456789</span>
                </div>
                <div class="address_location">
                    <span>Xóm 9, Giáp Trung, Hương Toàn, Hương Trà, Thừa Thiên Huế, Xã Hương Toàn,<br> Thị Xã Hương Trà, Thừa Thiên Huế</span>
                </div>
                <div class="address_default">Mặc định</div>
                <span class="address_link">Thay đổi</span>
            </div> 
        </div>
            <div class="col l-4 m-0 c-0">
                <div class="main_modal">
                    <h3 class="heading">Địa Chỉ Nhận Hàng</h3>

                    <div class="spacer"></div>

                    <div class="form-group">
                        <label for="fullname" class="form-label">Tên đầy đủ:</label>
                        <input id="fullname" name="fullname" type="text" placeholder="Nhập họ và tên" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input id="address" name="address" type="text" placeholder="Nhập địa chỉ" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col l-8 m-12 c-12">
                <div class="product_container">
                    <div class="main__product">
                        <div class="grid wide">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Đơn Giá</th>
                                                <th>Số Lượng</th>
                                                <th>Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $cart = [];
                                            if(isset($_SESSION['cart'])) {
                                                $cart = $_SESSION['cart'];
                                            }
                                            // var_dump($cart);die();
                                            $total = 0;
                                            
                                            foreach ($cart as $item) {
                                                $total += $item['num'] * $item['priceCurrent'];
                                                echo '
                                                <tr>
                                                    <td>
                                                        <div>
                                                        <img src="'.$item['thumbnail'].'" class="imgg"> 
                                                        <span class="title">'.$item['title'].'</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="priceCurrent">'.number_format($item['priceCurrent'], 0, '', '.').' VND</span>
                                                    </td
                                                    <td></td>
                                                    <td>
                                                        <span class="num">'.$item['num'].'</span>
                                                    </td>
                                                
                                                    <td>
                                                        <span class="total">'.number_format($item['num'] * $item['priceCurrent'], 0, '', '.').' VND</span>
                                                    </td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment">
            <div class="message">
                <span>Lời nhắn: </span>
                <input type="text" placeholder="Lưu ý cho người bán" class="input">
            </div>
            <div class="payment_product">
                <div class="pay">
                    <span>Phương thức thanh toán</span>
                    <span>Thanh toán khi nhận hàng</span>
                    <span>THAY ĐỔI</span>
                </div>
                <div class="payment_total">
                    <p class="total_product">
                        <span>Tổng thanh toán: </span>
                        <span><?=number_format($total, 0, '', '.')?> VND</span>
                    </p>
                    <button class="btn_pay">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    const linkClick = document.querySelector('.address_link');
    const modal = document.querySelector('.modal');
    const close = document.querySelector('.main_modal-close');
    const submit = document.querySelector('.form-submit');

    linkClick.onclick = () => {
        modal.classList.add('open');
    }

    close.onclick = () => {
        modal.classList.remove('open');
    }

</script>

<?php
    include_once('./layouts/footer_Detail.php');
?>