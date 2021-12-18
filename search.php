
<?php
include_once('conn.php');
$tim="dell";
$select = '';
if (isset($_GET['tim'])) {
	$select = 'select * from product where 1=1 ';
	$search = mysqli_real_escape_string($con, $_GET['search']);
	$where = '';
	if ($search != '') {
		$where .= 'and name like "%' . $search . '%"';
	} else {
		$where .= 'and 1=2';
	}
	$select .= $where;
	$result = mysqli_query($con, $select);
}
//var_dump($select);exit;
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo '
			<div class="col-lg-3 col-md-4 col-6 items-product">
			<form action="cart.php" method="GET">	
					<div class="product-img">
						<a href="detail.php?id=' . $row['product_id'] . '">
							<img src="' . $row['image_link'] . '" alt="' . $row['image_name'] . '" class="img-fluid"/>
						</a>
					</div>
					<div class="product-info">
						<h6>' . $row['name'] . '</h6>
						<span>' . $row['price'] . '₫</span>
						
						<input type="hidden" name="id" value="' . $row['product_id'] . '"/>
						<div class="product-btn d-flex align-items-center">
							<a href="detail.php?id=' . $row['product_id'] . '">
								 <i class="bi bi-info-circle"></i> 
								 <p> Chi tiết </p>
							</a>
							<a class="icon-add-cart" href="?giohang=' . $row['product_id'] . '">
								<input type="hidden" value=""/>
								<i class="bi bi-cart-plus"></i>
								 <p>Cho vào giỏ</p>
							</a>
						</div>
						
					</div>
					
			</form>
		</div>';
	}
}
?>
