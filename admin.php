<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>
<?php include_once('top-admin.php'); ?>
<?php
include_once('conn.php');
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$sql = 'select * from users where username like "' . $user . '" and password like "' . $pass . '"';
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user_id = $row['user_id'];
		if ($user != 'admin') {
			echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
			echo 'location.href="home.php";</script>';
		} else {
			$select = 'select count(*) as sl from users';
			$result2 = mysqli_query($con, $select);
			$select2 = 'select count(*) as sl from product';
			$result3 = mysqli_query($con, $select2);
			$select3 = 'select count(*) as sl from transactions where  process = "0"';
			$result4 = mysqli_query($con, $select3);
			$select4 = 'select count(*) as sl from transactions where process = "1"';
			$result5 = mysqli_query($con, $select4);
			while ($row1 = mysqli_fetch_assoc($result2)) {
				while ($row2 = mysqli_fetch_assoc($result3)) {
					while ($row3 = mysqli_fetch_assoc($result4)) {
						while ($row4 = mysqli_fetch_assoc($result5)) {
							$count_user = $row1['sl'] - 1;
							$count_product = $row2['sl'];
							$count_order_wait = $row3['sl'];
							$count_order_finish = $row4['sl'];
						}
					}
				}
			}
			$count = 'select count(*) as sl from detail_report where status = "0"';
			$kq = mysqli_query($con, $count);
			while ($row5 = mysqli_fetch_assoc($kq)) {
				$count_mail = $row5['sl'];
			}
		}
	}
}
?>

<body>
	<div class="section bg-color-brown">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 col-4 bg-color-admin">
					<?php include_once('left-admin.php'); ?>
				</div>
				<div class="col-md-10 col-8">
					<div class="row">
						<div class="col-12 bg-white">
							<span style="font-size: 22px;font-weight: 600;">Dashboard</span>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="user-adm user">
								<div class="d-column">
									<a href="listtv.php">USERS</a>
									<span><?php echo $count_user; ?></span>
								</div>
								<div>
									<a href="listtv.php">
										<i class="far fa-user"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="product-adm  user">
								<div class="d-column">
									<a href="list_product.php">PRODUCTS</a>
									<span><?php echo $count_product; ?></span>
								</div>
								<div>
									<a href="list_product.php">
										<i class="fas fa-laptop"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="order-adm user">
								<div class="d-column">
									<a href="order_management.php">ORDERS</a>
									<span><?php echo $count_order_wait; ?></span>
								</div>
								<div>
									<a href="order_management.php">
										<i class="fas fa-cart-arrow-down"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="messages-adm user">
								<div class="d-column">
									<a href="report_management.php">MESSAGES</a>
									<span><?php echo $count_mail; ?></span>
								</div>
								<div>
									<a href="report_management.php">
										<i class="fas fa-envelope-open-text"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>



</html>