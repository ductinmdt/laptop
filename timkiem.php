<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php
	if (!isset($_SESSION['user'])) {
		$_SESSION['giohang'] = array();
		$_SESSION['giohang'][0]['id'] = '';
		$_SESSION['giohang'][0]['soluong'] = '';
	} else {
		if (isset($_GET['giohang'])) {
			$giohang = $_GET['giohang'];
			if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
				$count = count($_SESSION['giohang']);
				$flag = false;
				for ($i = 0; $i < $count; $i++) {
					if ($_SESSION['giohang'][$i]['id'] == $giohang) {
						$_SESSION['giohang'][$i]['soluong'] += 1;
						$flag = true;
						break;
					}
				}
				if ($flag == false) {
					$_SESSION['giohang'][$count]['id'] = $giohang;
					$_SESSION['giohang'][$count]['soluong'] = 1;
				}
			} else {
				$_SESSION['giohang'] = array();
				$_SESSION['giohang'][0]['id'] = $giohang;
				$_SESSION['giohang'][0]['soluong'] = 1;
			}
			echo '<script language="javascript">alert("Bạn đã thêm giỏ hàng thành công!");';
			echo 'location.href="?id=' . $_SESSION['giohang'] . '";</script>';
		}
	}
	?>
	<?php include_once('banner.php'); ?>
	<?php include_once('left.php'); ?>
	<div class="section pd-bt-20">
		<div class="container">
			<div class="row ">
				<?php
				include_once('conn.php');
				$tim = "dell";
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
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>

</html>