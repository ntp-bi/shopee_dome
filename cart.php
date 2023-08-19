<?php
    session_start();

    $title = 'Giỏ hàng';
    include_once('./layouts/header_Detail.php');
    require_once('./db/dbhelper.php');
    require_once('./utils/utility.php');
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/cart.css">

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
                            <th>Số Tiền</th>
                            <th>Thao Tác</th>
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
                                    <span class="price">'.number_format($item['price'], 0, '', '.').' VND</span> 
                                    <span class="priceCurrent">'.number_format($item['priceCurrent'], 0, '', '.').' VND</span>
                                </td
                                <td></td>
                                <td>
                                    <span class="num">'.$item['num'].'</span>
                                </td>
                            
                                <td>
                                    <span class="total">'.number_format($item['num'] * $item['priceCurrent'], 0, '', '.').' VND</span>
                                </td>
							    <td><button class="delete" onclick="deleteItem('.$item['id'].')">Xóa</button></td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="payment">
                    <p class="total_product">
                        <span>Tổng thanh toán: </span>
                        <?=number_format($total, 0, '', '.')?> VND
                    </p>
                    <a href="checkout.php">
                        <button class="btn ">Mua Hàng</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteItem(id) {
        $.post('./api/api_product.php', {
            'action' : 'delete',
            'id' : id
        }, function(data) {
            location.reload();
        })
    }
</script>
<?php
    include_once('./layouts/footer_Detail.php');
?>