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
	<div class="section pd-top-20">
		<div class="container">
			<div class="row ">
				<?php include_once('detail_main.php'); ?>
			</div>
		</div>
	</div>
	<section class="shipping-info mg-top-20">
		<div class="container">
			<ul>
				<!-- Free Shipping -->
				<li>
					<div class="media-icon">
						<i class="lni lni-delivery"></i>
					</div>
					<div class="media-body">
						<h5>Miễn phí vận chuyển</h5>
						<span>Đối với đơn hàng trên 100.000₫</span>
					</div>
				</li>
				<!-- Money Return -->
				<li>
					<div class="media-icon">
						<i class="lni lni-support"></i>
					</div>
					<div class="media-body">
						<h5>Hỗ trợ 24/7.</h5>
						<span>Trò chuyện trực tiếp hoặc gọi điện.</span>
					</div>
				</li>
				<!-- Support 24/7 -->
				<li>
					<div class="media-icon">
						<i class="lni lni-credit-cards"></i>
					</div>
					<div class="media-body">
						<h5>Thanh toán trực tuyến.</h5>
						<span>Dịch vụ thanh toán an toàn.</span>
					</div>
				</li>
				<!-- Safe Payment -->
				<li>
					<div class="media-icon">
						<i class="lni lni-reload"></i>
					</div>
					<div class="media-body">
						<h5>Đổi trả dể dàng.</h5>
						<span>Mua sắm miễn phí.</span>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<?php include_once('footer.php'); ?>

</body>

</html>