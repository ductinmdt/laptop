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
							include_once('conn.php');
							$user = $_SESSION['user'];
							$pass = $_SESSION['pass'];
							if ($user != 'admin') {
								echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
								echo 'location.href="home.php";</script>';
							} else {
							?>
								<table class="table table-striped table-hover align-middle">
									<thead>
										<tr>
											<th>ID:</th>
											<th>Hãng:</th>
											<th>Tên sản phẩm:</th>
											<th>Giá:</th>
											<th>Hình ảnh:</th>
											<th>Số lượng:</th>
											<th>
												<a href="add_product.php" class="btn btn-success">
													<i class="bi bi-clipboard-plus"></i>
													<span>Add Products</span>
												</a>
											</th>
										</tr>
									</thead>
								<?php
								$sql = 'select * from product';
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										$slton = $row['soluong'];
										echo '<tr>
											<th>' . $row['product_id'] . '</th>
											<td>';
													$sql2 = 'select * from catalogs where catalog_id = "' . $row['catalog_id'] . '"';
													$result2 = mysqli_query($con, $sql2);
													if ($row2 = mysqli_fetch_assoc($result2)) {
														echo $row2['name'];
													}
													echo '</td>
											<td>' . $row['name'] . '</td>
											<td>' . $row['price'] . '₫</td>
											<td>
												<a href="detail.php?id=' . $row['product_id'] . '"><img  src="' . $row['image_link'] . '" alt="' . $row['image_name'] . '" height="100px" width="150px"/></a>
											</td>
											<td>
												' . $slton . '
											</td>
											<td>
												<a onclick="return ConfirmUpdate();" href="update_product.php?id=' . $row['product_id'] . '">
													<input type="button" class="btn btn-danger" value="Update"/>
												</a>
												<a onclick="return ConfirmDelete();" href="delete_product.php?id=' . $row['product_id'] . '">
													<input type="button" class="btn btn-warning" value="Delete"/>
												</a>
												
											</td>
								
										</tr>';
									}
								}
								echo '</table>';
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script>
	function ConfirmUpdate() {
		var x = confirm("Bạn có chắc muốn thay đổi thông tin sản phẩm không?");
		if (x)
			return true;
		else
			return false;
	}

	function ConfirmDelete() {
		var a = confirm("Bạn có chắc muốn xóa sản phẩm không?");
		if (a)
			return true;
		else
			return false;
	}
</script>