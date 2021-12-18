<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>


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
							<span style="font-size: 22px;font-weight: 600;">List Orders</span>
						</div>
						<div class="col-12 table-responsive">
							<?php
								$user=$_SESSION['user'];
								if($user!='admin'){
									echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
									echo 'location.href="home.php";</script>';
								}else{
									include_once('conn.php');
									$sql= 'SELECT * FROM users,transactions WHERE users.user_id=transactions.user_id ORDER BY process ASC, transaction_id DESC';
									$result=mysqli_query($con,$sql);
									if(mysqli_num_rows($result)>0) {
										while($data_user=mysqli_fetch_assoc($result)) {
											$username=$data_user['username'];
											$name_user=$data_user['name'];
											$phone=$data_user['phone'];
											$address=$data_user['address'];
											$id_trans=$data_user['transaction_id'];
											$process=$data_user['process'];
											$amount=$data_user['amount'];
											if($process!='0') {
												$style=' class="btn btn-success"  value="ĐÃ XỬ LÝ"';
											}else {
												$style=' class="btn btn-danger" value="CHƯA XỬ LÝ"';
											}
											echo '<br/></hr>
											<table class="table table-striped table-hover align-middle table-bordered" >
											<thead>
												<tr>
													<th colspan="4" >ĐƠN HÀNG '.$id_trans.'</th>
												</tr>
											</thead>
												<tr>
													<td >Tài khoản:</td>
													<td colspan="3">
														'.$username.'
													</td>
												</tr>
												<tr>
													<td>Họ tên khách hàng:</td>
													<td colspan="3">
														'.$name_user.'
													</td>
												</tr>
												<tr>
													<td>Số điện thoại:</td>
													<td colspan="3">
														'.$phone.'
													</td>
												</tr>
												<tr>
													<td>Địa chỉ liên hệ:</td>
													<td colspan="3">
														'.$address.'
													</td>
												</tr>';
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
													<th >
														<a onclick="return ConfirmProcess();" href="process.php?id='.$id_trans.'" >
															<input type="button" name="process" '.$style.'/>
														</a>
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
		</div>
	</div>
	</body>

</html>
<script>
    function ConfirmProcess()
    {
      	var x = confirm("Bạn có chắc muốn thực hiện?");
      	if (x)
        	return true;
      	else
        	return false;
    }
</script>  
