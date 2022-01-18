<!DOCTYPE html>
<html>
<?php include_once('head.php');?>
<body>
<?php include_once('banner.php');?>
	<div class="section pd-top-20 bg-color-brown">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-11 no-pd">
					<h5>Lịch sử đơn hàng</h5>
				</div>
			</div>
			
			<div class="row justify-content-center">
				
				<div class="col-11 bg-white bd-rd-5 mg-bottom-20 table-responsive">
					<?php 
						include_once('conn.php');
						$user=$_SESSION['user'];
						if(!$user) {
							echo '<script language="javascript">alert("Bạn hiện tại chưa đăng nhập!");';
							echo 'location.href="detail.php?id='.$id_pd.'";</script>';
						}else {
							include_once('conn.php');
									$sql= 'SELECT * FROM users,transactions WHERE users.username = "'.$user.'" and users.user_id=transactions.user_id ORDER BY process ASC, transaction_id DESC';
									$result=mysqli_query($con,$sql);
									if(mysqli_num_rows($result)>0) {
										while($data_user=mysqli_fetch_assoc($result)) {
											$id_trans=$data_user['transaction_id'];
											$process=$data_user['process'];
											$amount=$data_user['amount'];
											if($process=='0') {
												$style='
												<div class="dp-flex align-items-center"><span class="text-danger">Đang chờ xử lý</span> 
												<a onclick="return ConfirmProcess();" href="canceluser.php?id=' . $id_trans . '" >
													<input type="button" class="btn btn-danger" name="process" value="Hủy đơn"/>
												</a></div>
												';
											}
											elseif($process=='1') {
												$style='<span class="text-success">Đã được xử lý</span>';
											}
											else {
												$style='<span class="text-danger">Đã hủy</span>';
											}
											echo '<br/></hr>
											<table class="table table-striped table-hover align-middle table-bordered" >
											<thead>
												<tr>
													<th colspan="4" >ĐƠN HÀNG '.$id_trans.'</th>
												</tr>
											</thead>';
											$sql2='select orders.product_id, name, price, image_link, image_name, orders.soluong from orders,product where orders.product_id=product.product_id and transaction_id = "'.$id_trans.'" and status = "1"';
											$result2=mysqli_query($con,$sql2);
											echo '
												<tr>
													<th >Tên sản phẩm:</th>
													<th >Giá:</th>
													<th>Số lượng:</th>
													<th>Hình ảnh:</th>
												</tr>';
											if(mysqli_num_rows($result2)>0) {
												while ($data_order=mysqli_fetch_assoc($result2)) {
													$id_product=$data_order['product_id'];
													$name_product=$data_order['name'];
													$price=$data_order['price'];
													$image_link=$data_order['image_link'];
													$image_name=$data_order['image_name'];
													$soluong=$data_order['soluong'];

													echo '
													<tr>
														<td >
															'.$name_product.'
														</td>
														<th>
															'.$price.'₫
														</th>
														<th>
															<input readonly="readonly" style="text-align: center"  type="text" name="sl" value="'.$soluong.'" size="1"/>
														</th>
														<th>
															<a href="detail.php?id='.$id_product.'">
																<img src="'.$image_link.'" alt="'.$image_name.'" height="100px" width="150px"/>
															</a>
														</th>
													</tr>';
												}
											}
											echo '
												<tr>
													<th>Tổng giá:</th>
													<th colspan="2">
														'.$amount.'₫
													</th>
													<th>
														'.$style.'
													</th>
												</tr>
											</table><hr/><br/></hr>';
										}
									}
						}
					?>
				</div>
			</div>
			</div>
		</div>
		<?php include_once('footer.php');?>
</body>
</html>
<script>
	function ConfirmProcess() {
		var x = confirm("Bạn có chắc muốn thực hiện?");
		if (x)
			return true;
		else
			return false;
	}
</script>
