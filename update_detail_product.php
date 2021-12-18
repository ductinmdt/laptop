<?php
include_once('conn.php');
$id = $_GET['id'];
$name = '';
$price = '';
$image_link = '';
$image_name = '';
$catalog_id = '';
$catalog_name = '';
$size = '';
$weight = '';
$cpu = '';
$ram = '';
$cart = '';
$rom = '';
$display = '';
$port = '';
$pin = '';
$cam = '';
$loa = '';
$cd = '';
$os = '';
$bh = '';
$sl = '';
$sql = 'SELECT DISTINCT product.product_id AS id, catalogs.name AS ctname, product.name AS ptname, price, product.catalog_id as catalog_id, kichthuoc, trongluong, manhinh, cpu, ram, ocung, pin, cong, dohoa, webcam, diaquang, loa, HDH, baohanh, image_link, image_name, soluong
		FROM detail_product, product, catalogs
		WHERE detail_product.product_id = product.product_id AND catalogs.catalog_id = product.catalog_id
		AND product.product_id="' . $id . '"';
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$name = $row['ptname'];
		$price = $row['price'];
		$image_link = $row['image_link'];
		$image_name = $row['image_name'];
		$catalog_id = $row['catalog_id'];
		$catalog_name = $row['ctname'];
		$size = $row['kichthuoc'];
		$weight = $row['trongluong'];
		$cpu = $row['cpu'];
		$ram = $row['ram'];
		$cart = $row['dohoa'];
		$rom = $row['ocung'];
		$display = $row['manhinh'];
		$port = $row['cong'];
		$pin = $row['pin'];
		$cam = $row['webcam'];
		$loa = $row['loa'];
		$cd = $row['diaquang'];
		$os = $row['HDH'];
		$bh = $row['baohanh'];
		$sl = $row['soluong'];
	}
}
?>
<div class="row justify-content-center">
	<div class="col-md-6 col-12 bg-white bd-rd-5 mg-bottom-20">
		<span style="font-size: 18px; margin-top: 10px; display: block; color: #5d5d5d">CHỈNH SỬA THÔNG SỐ SẢN PHẨM</span>
		<form action="update_product_action.php" method="POST">
			<table class="table table-borderless align-middle">
				<input type="hidden" name="product_id" value="<?php echo $id; ?>">
				<tr>
					<td>Tên sản phẩm</td>
					<td>
						<input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Giá</td>
					<td>
						<input type="text" name="price" value="<?php echo $price; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Số lượng trong kho</td>
					<td>
						<input type="text" name="sl" value="<?php echo $sl; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Hãng</td>
					<td>
						<select name="catalog_id" class="form-select">
							<?php
							$select = 'select * from catalogs';
							$kq = mysqli_query($con, $select);
							if (mysqli_num_rows($kq) > 0) {
								while ($row2 = mysqli_fetch_assoc($kq)) { ?>
									<option value="<?php echo $row2['catalog_id']; ?>" <?php ($catalog_id == $row2['catalog_id']) ? "selected" : ""; ?>><?php echo $row2['name']; ?></option>
							<?php
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Kích cỡ</td>
					<td>
						<input type="text" name="size" value="<?php echo $size; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Trọng lượng</td>
					<td>
						<input type="text" name="weight" value="<?php echo $weight; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Màn hình</td>
					<td>
						<input type="text" name="display" value="<?php echo $display; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>CPU</td>
					<td>
						<input type="text" name="cpu" value="<?php echo $cpu; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>RAM</td>
					<td>
						<input type="text" name="ram" value="<?php echo $ram; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>ROM</td>
					<td>
						<input type="text" name="rom" value="<?php echo $rom; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Cart đồ họa</td>
					<td>
						<input type="text" name="cart" value="<?php echo $cart; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>PIN</td>
					<td>
						<input type="text" name="pin" value="<?php echo $pin; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Cổng giao tiếp</td>
					<td>
						<input type="text" name="port" value="<?php echo $port; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Webcam</td>
					<td>
						<input type="text" name="cam" value="<?php echo $cam; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>CD-DVD</td>
					<td>
						<input type="text" name="cd" value="<?php echo $cd; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Hệ điều hành</td>
					<td>
						<input type="text" name="os" value="<?php echo $os; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Loa</td>
					<td>
						<input type="text" name="loa" value="<?php echo $loa; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td>Bảo hành</td>
					<td>
						<input type="text" name="bh" value="<?php echo $bh; ?>" class="form-control">
					</td>
				</tr>
				<tr>
					<td></td>
					<td >
						<input onclick="return ConfirmUpdate();" type="submit" class="btn btn-danger" name="update" value="Lưu thay đổi">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="col-md-5 col-12 mg-left-20 bg-white bd-rd-5 mg-bottom-20">
		<span style=" font-size: 18px; margin-top: 10px; display: block; color: #5d5d5d">CẬP NHẬP HÌNH ẢNH SẢN PHẨM</span>
		<form action="update_image.php" method="POST" enctype="multipart/form-data">
			<table class="table table-borderless align-middle">
				<input type="hidden" name="product_id" value="<?php echo $id; ?>">
				<input type="hidden" name="catalog_name" value="<?php echo $catalog_name; ?>">
				<tr>
					<td>
						<img src="<?php echo $image_link; ?>" alt="<?php echo $image_name; ?>" height="160px" width="240px">
					</td>
					
				</tr>
				<tr>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td >
						<input onclick="return ConfirmUpdate();" type="submit" class="btn btn-danger" name="submit_upload" value="Lưu thay đổi" class="btn btn-success">
					</td>
				</tr>
			</table>
	</div>
</div>


