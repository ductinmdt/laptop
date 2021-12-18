<?php
//session_start();
include_once('conn.php');
$id = $_GET['id'];
//var_dump($id);exit();
//for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
//	$id = $_SESSION['giohang'][$i]['id'];
//}
$sql = 'select * from product where product_id = "' . $id . '"';
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//if($id==$row['product_id']){
		echo
		'<div class=" col-md-6 col-12">
				<img class="item img-fluid" src="' . $row['image_link'] . '" alt="' . $row['image_name'] . '"/>
		</div>
		<div class=" col-md-6 col-12 info-product-right align-items-center">
			<h4>' . $row['name'] . '</h4>
			<div>
				<span class="price">' . $row['price'] . '₫</span>
				<a href="?id=' . $row['product_id'] . '&giohang=' . $row['product_id'] . '">
					<input type="button" class="btn btn-danger" value="Thêm vào giỏ"/>
				</a>
			</div>
			<ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><span>5.0</span></li>
             </ul>
				
		<hr/>';
	}
}

$query = 'select * from detail_product where product_id like "' . $id . '"';
$result1 = mysqli_query($con, $query);
if (mysqli_num_rows($result1) > 0) {
	while ($row = mysqli_fetch_assoc($result1)) {
		//if($id==$row['product_id']){
		echo
		'
		<div class="product-info-items">
			<p><b>Màn hình: </b>' . $row['manhinh'] . '</p>
			<p><b>CPU: </b>' . $row['cpu'] . '</p>
			<p><b>RAM: </b>' . $row['ram'] . '</p>
			<p><b>Ổ cứng: </b>' . $row['ocung'] . '</p>
			<p><b>Card đồ họa: </b>' . $row['dohoa'] . '</p>
			<p><b>PIN: </b>' . $row['pin'] . '</p>
			<p><b>Cổng kết nối: </b>' . $row['cong'] . '</p>
			<p><b>Webcam: </b>' . $row['webcam'] . '</p>
			<p><b>Loa: </b>' . $row['loa'] . '</p>
			<p><b>Đĩa Quang: </b>' . $row['diaquang'] . '</p>
			<p><b>Hệ điều hành: </b>' . $row['HDH'] . '</p>
			<p><b>Kích thước: </b>' . $row['kichthuoc'] . '</p>
			<p><b>Trọng lượng: </b>' . $row['trongluong'] . '</p>
			<p><b>Bảo hành: </b>' . $row['baohanh'] . '</p>
			</div>	';
	}
}

?>
<!--<select name="sl" style="border:#888 1px solid; border-radius: 5px; margin-left: 50px; padding:10px 5px; font-weight:bold; text-align:center;">
									<option value="1" selected="selected">1</option>';
									for ($i=2;$i<=10;$i++) {
										echo '<option value="'.$i.'" >'.$i.'</option>';
									}
						echo '	</select>-->