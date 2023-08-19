<?php
    session_start();
    
    $title = 'Chi tiết sản phẩm';
    include_once('layouts/header_Detail.php');
    require_once('db/dbhelper.php');
    require_once('utils/utility.php');

    $id = getGet('id');
   
    $product = executeResult('select * from productss where id = '.$id, true); 
?>

<div class="main__product">
    <div class="grid wide">
        <div class="row sm-gutter main__content">
            <div class="col l-5 m-0 c-0">
                <div class="product_img">
                    <img src="<?=$product['thumbnail']?>" alt="" class="img">
                    <div class="social">
                        <div class="social_icon">
                            <span>Chia sẻ: </span>
                            <i class="fb fa-brands fa-facebook"></i>
							<i class="ig fa-brands fa-square-instagram"></i>
							<i class="email fa-solid fa-envelope"></i>
							<i class="tw fa-brands fa-twitter"></i>
                        </div>
                        <div class="liked">
                            <i class="fa-regular fa-heart"></i>Đã thích (530)
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col l-7 m-12 c-12">
                <div class="container_product">
                    <div class="content_product">
                        
                        <p class="content"><span class="content_btn">Yêu thích</span><?=$product['title']?></p>
                    </div>
                    <div class="statistical">
                        <div class="statistical_star border">
                            <span>4.9</span>
                            <i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="no-color fa-sharp fa-solid fa-star"></i>
                        </div>
                        <div class="evaluate border"><span>234</span> đánh giá</div>
                        <div class="saled"><span><?=$product['sold']?></span> Đã Bán</div>
                    </div>  
                    <div class="product_price">
                        <span class="home-product-item__price-oldd"><?=number_format($product['price'], 0, '', '.').'đ'?></span>
                        <span class="home-product-item__price-currentt"><?=number_format($product['priceCurrent'], 0, '', '.').'đ'?></span>
                        <div class="product_sales">14% giảm</div>
                    </div>
                    <div class="color">
                        <span>Màu</span>

                            <button class="btn_color">Nâu</button>
                            <button class="btn_color">Trắng</button>
                            <button class="btn_color">Đen</button>
                    </div>
                    <div class="size">
                        <span>Size</span>
                        <button class="btn_size">28</button>
                        <button class="btn_size">29</button>
                        <button class="btn_size">30</button>
                        <button class="btn_size">31</button>
                    </div>
                    <div class="btn_add">
                        <button class="addCart" onclick="addToCart(<?=$id?>)">
                            <i class="fa-solid fa-cart-shopping"></i>Thêm Vào Giỏ Hàng
                        </button>
                        <a href="checkout.php">
                            <button class="buy">Mua Ngay</button>
                        </a>
                    </div>
                </div>
            </div>


<script type="text/javascript">
    function addToCart(id) {
        $.post('./api/api_product.php', {
            'action' : 'add',
            'id' : id
        }, function(data) {
            location.reload();
        })
    }
</script>

<?php
    include_once('layouts/footer_Detail.php');
?>