<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php include_once('top-admin.php'); ?>
	<div class="section ">
		<div class="container-fluid">
			<div class="row">
				<div class=" col-md-2 col-4 bg-color-admin ">
					<?php include_once('left-admin.php'); ?>
				</div>
				<div class="col-md-10 col-8 ">
					<div class="row">
						<div class="col-12 bg-color-brown">
							<span style="font-size: 22px;font-weight: 600;">List Products</span>
						</div>
						<div class="col-12 table-responsive">
							<?php
							$user = $_SESSION['user'];
							include_once('conn.php');
							if ($user != 'admin') {
								echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
								echo 'location.href="home.php";</script>';
							} else {
								$sql = 'select * from users where level != 1';
								$kq = mysqli_query($con, $sql);
								echo '
								<table class="table table-striped table-hover align-middle">
								<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>User</th>
											<th>Password</th>
											<th>Date Of Birth</th>
											<th>Gender</th>
											<th>Phone</th>
											<th>Address</th>
										</tr>
										</thead>';
										if (mysqli_num_rows($kq) > 0) {
											while ($row = mysqli_fetch_assoc($kq)) {
												echo '
													<tr>
														<th>' . $row['user_id'] . '</th>
														<td>' . $row['name'] . '</td>
														<td>' . $row['username'] . '</td>
														<td>' . $row['password'] . '</td>
														<td>' . $row['date_of_birth'] . '</td>
														<td>' . $row['gender'] . '</td>
														<td>' . $row['phone'] . '</td>
														<td>' . $row['address'] . '</td>
														<td>
															<a onclick="return ConfirmEdit();" href="update_profile_admin.php?user_id=' . $row['user_id'] . '">
																<input type="button" class="btn btn-danger"  value= "Edit"/>
															</a>
															<a onclick="return ConfirmDelete();" href="delete_user.php?id=' . $row['user_id'] . '">
																<input type="button" class="btn btn-warning" value="Delete"/>
															</a>
														</td>
													</tr>';
											}
										}
								}
							?>
						</div>
					</div>
				</div>
			</div>
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

	function ConfirmEdit() {
		var a = confirm("Bạn có chắc muốn thay đổi dữ liệu thành viên?");
		if (a)
			return true;
		else
			return false;
	}
</script>