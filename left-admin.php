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
<div class="left-adm">
	<div>
		<i class="fas fa-tachometer-alt"></i>
		<a href="admin.php">
			<span>Dashboard</span>
		</a>
	</div>
	<div>
		<i class="fas fa-user"></i>
		<a href="listtv.php">
			<span>User</span>
		</a>
	</div>
	<div>
		<i class="fas fa-laptop"></i>
		<a href="list_product.php">
			<span>Product</span>
		</a>
	</div>
	<div>
		<i class="bi bi-bag-check-fill"></i>
		<a href="order_management.php">
			<span>Orders</span>
		</a>
	</div>
	<div>
		<i class="fas fa-envelope-open-text"></i>
		<a href="report_management.php">
			<span>Messages</span>
		</a>
	</div>
	<div>
		<i class="fas fa-user-cog"></i>
		<a href="update_profile_admin.php?user_id=<?php echo $user_id; ?>">
			<span>Information Admin</span>
		</a>
	</div>
</div>

