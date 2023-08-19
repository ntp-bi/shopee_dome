<?php
session_start();
$title = 'Shopee';
include_once('./layouts/header.php');
require_once('./db/dbhelper.php');
require_once('./utils/utility.php');

$find = getGet('find');
$title = getGet('title');

if(isset($_GET['find'])){
	$productList = executeResult('select * from productss where title like "%'.$_GET['find'].'%"');
}else{
	$productList = executeResult('select * from productss');
}
?>
<!-- body START -->
<div class="home-product">
    <div class="row sm-gutter">
		<?php
		foreach ($productList as $item) {
			echo '
			<div class="col l-2-4 m-4 c-6">
				<a class="home-product-item" href="./detail.php?id='.$item['id'].'">
					<div class="home-product-item__img" style="background-image: url('.$item['thumbnail'].');"></div>
					<h4 class="home-product-item__name">'.$item['title'].'</h4>
					<div class="home-product-item__price">
						<span class="home-product-item__price-old">'.number_format($item['price'], 0, '', '.').'đ</span>
						<span class="home-product-item__price-current">'.number_format($item['priceCurrent'], 0, '', '.').'đ</span>
					</div>
					<div class="home-product-item__action">
						<span class="home-product-item__like home-product-item__like--liked">
							<i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
							<i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
						</span>
						<div class="home-product-item__rating">
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="home-product-item__start--gold fa-sharp fa-solid fa-star"></i>
							<i class="fa-sharp fa-solid fa-star"></i>
						</div>
						<span class="home-product-item__sold">'.$item['sold'].'</span>
					</div>
					<div class="home-product-item__origin">
						<span class="home-product-item__origin-brand">'.$item['brand'].'</span>
						<span class="home-product-item__origin-name">'.$item['national'].'</span>
					</div>
					<div class="home-product-item__favourite">
						<i class="fa-solid fa-check"></i>
						<span>Yêu thích</span>
					</div>
					<div class="home-product-item__sale-off">
						<span class="home-product-item__sale-off-percent">45%</span>
						<span class="home-product-item__sale-off-label">GIẢM</span>
					</div>
				</a>
			</div>';
		}
		?>
    </div>
</div>
<?php
include_once('./layouts/footer.php');
?>