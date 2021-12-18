<!DOCTYPE html>
<html>
<?php include_once('head.php');?>

<body>
	<?php include_once('banner.php'); ?>

	<div class="section section-cart pd-top-20 bg-color-brown">

		<div class="container">


			<div class="row align-items-center justify-content-center">
				<div class="col-lg-11 col-12 no-pd">
					<h5>GIỎ HÀNG</h5>
				</div>
			</div>


			<?php
			include_once('conn.php');
			$user = $_SESSION['user'];
			if (!$user) {
				echo '<script language="javascript">alert("Bạn hiện tại chưa đăng nhập!");';
				echo 'location.href="home.php";</script>';
			} else {
				echo '
					<form action="cart.php" method="POST">
						<div class="row justify-content-center">';
				$sql = 'select * from users where username = "' . $user . '"';
				$kq = mysqli_query($con, $sql);
				//var_dump($sql)
				if (isset($_SESSION['giohang'])) {
					if (isset($_GET['minus'])) {
						$id = $_GET['minus'];
						for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
							if ($_SESSION['giohang'][$i]['id'] == $id) {
								if($_SESSION['giohang'][$i]['soluong'] != 0){
									$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] - 1;
									//$_SESSION['giohang'][$i]['soluong'] = $_SESSION['soluong'];
								}
							}
						}
					}
					if (isset($_GET['plus'])) {
						$id = $_GET['plus'];
						for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
							if ($_SESSION['giohang'][$i]['id'] == $id) {
								$_SESSION['giohang'][$i]['soluong'] = $_SESSION['giohang'][$i]['soluong'] + 1;
								//$_SESSION['giohang'][$i]['soluong'] = $_SESSION['soluong'];

							}
						}
					}

					$amount = 0;
					for ($i = 0; $i < count($_SESSION['giohang']); $i++) {

						$select = 'select * from product where product_id = "' . $_SESSION['giohang'][$i]['id'] . '"';
						$result = mysqli_query($con, $select);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_array($result)) {
								$amount = $amount + ($row['price'] * $_SESSION['giohang'][$i]['soluong']);
								echo '<input type="hidden" name="soluong[]" value="' . $_SESSION['giohang'][$i]['soluong'] . '" />';
								echo '<input type="hidden" name="product_id[]" value="' . $_SESSION['giohang'][$i]['id'] . '"/>';
								//$_SESSION['giohang'][$i]['id']=$_SESSION['product_id'];
							}
						}
					}
					echo '<div class="col-lg-8 col-12">';
					for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
						$select = 'select * from product where product_id = "' . $_SESSION['giohang'][$i]['id'] . '"';
						$result = mysqli_query($con, $select);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_array($result)) {
			?>
								<div class="row align-items-center justify-content-center">
									<div class="col-12 flex-column-1 items-cart mg-bottom-20 bd-rd-5">
										<table class="align-middle">
											<tbody>
												<tr>
													<th>
														<a href="detail.php?id=<?php echo $_SESSION['giohang'][$i]['id']; ?>">
															<img src="<?php echo $row['image_link']; ?>" alt="<?php echo $row['image_name']; ?>" height="100px" width="150px" />
														</a>
													</th>
													<td style="font-size:20px">
														<?php echo $row['name']; ?>
													</td>
													<th style="font-size:18px">
														<?php echo $row['price']; ?>₫
													</th>
													<th class="text-center">
														<a href="?minus=<?php echo $_SESSION['giohang'][$i]['id']; ?>">
														<i class="bi bi-dash"></i>
														</a>
														<input style="text-align: center;" readonly="readonly" type="text" name="sl" value="<?php echo $_SESSION['giohang'][$i]['soluong']; ?>" size="1" />
														<a href="?plus=<?php echo $_SESSION['giohang'][$i]['id']; ?>">
															<i class="bi bi-plus"></i>
														</a>
													</th>

												</tr>
											</tbody>
										</table>
									</div>
								</div>


			<?php

							}
						}
					}
					echo '</div>';
					echo '
						<div class="col-lg-3 col-12 ">
							
							<div class="row">
								<div class="col-12 flex-column-1 items-cart mg-left-20 bd-rd-5 mg-bottom-20">
									<div class="d-flex justify-content-between mg-bottom-10">
										<span>Tạm tính</span>
										<input type="hidden" name="amount" value="' . $amount . '" />
										<span class="font-weight-500">' . $amount . '₫</span>
									</div>
									<div class="d-flex justify-content-between">
										<span>Giảm giá</span>
										<span  class="font-weight-500">0₫</span>
									</div>
									<hr>
									<div class="d-flex justify-content-between text-right">
										<span>Tổng cộng</span>
										<div class="">
											<input type="hidden" name="amount" value="' . $amount . '" />
											<span  class="font-weight-500 total-price-1">' . $amount . '₫</span>
											<span  class="total-price-2">(Đã bao gồm VAT nếu có)</span>
										</div>
										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="items-cart mg-left-20 bd-rd-5 mg-bottom-20">
									<a onclick="return ConfirmOrder();">
										<input class="btn muahang" type="submit" name="order" value="Mua hàng"/>
									</a>
									<a onclick="return ConfirmDelete();" href = "del-cart.php">
										<button class="btn muahang delete-cart">
											<i class="bi bi-trash delete-cart "></i>
										</button>
									</a>
									
								</div>
								
							</div>';
				} else {
					echo ' 
									<div class="row align-items-center justify-content-center bd-rd-5">
										<div class="col-11 flex-column-1 items-cart items-empty-cart">
											<img src="./images/banner/empty-cart.png" alt="Empty Cart" class="rounded mx-auto d-block">
												<p class="text-center" >Không có sản phẩm nào trong giỏ hàng của bạn.</p>
											<a href="home.php" class="btn btn-primary">Tiếp tục mua sắm</a>
										</div>
									</div>
									';
				}

				echo '</table></div></form>';
			}
			?>
		</div>
	</div>


	<?php include_once('footer.php'); ?>
	</div>
	</div>
</body>

</html>
<script>
	function ConfirmDelete() {
		var x = confirm("Bạn có chắc muốn xóa không?");
		if (x)
			return true;
		else
			return false;
	}

	function ConfirmOrder() {
		var a = confirm("Bạn có chắc muốn đặt hàng không?");
		if (a)
			return true;
		else
			return false;
	}
</script>