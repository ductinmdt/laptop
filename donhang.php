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
							echo '
							<table class="table align-middle">
								<tr>
									<th>Sản phẩm</th>
									<th></th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Trạng thái</th>
									
								</tr>';
							$sql= 'select * from users where username = "'.$user.'"';
							$kq= mysqli_query($con,$sql);
							//var_dump($sql)
							if(mysqli_num_rows($kq)>0) {
								while($data=mysqli_fetch_assoc($kq)) {
									$select = 'SELECT product.product_id, catalog_id, name, price, image_link, image_name, orders.soluong, order_id, transactions.transaction_id, amount, process, status 
										FROM 
											product,orders,transactions 
										WHERE
											product.product_id = orders.product_id
										AND 	
											transactions.transaction_id = orders.transaction_id
										AND 
											user_id = "'.$data['user_id'].'"
										and 
											process = "1";
										';
									$result= mysqli_query($con,$select);
									//var_dump($select);exit;
									if (mysqli_num_rows($result)>0) {
										while($row=mysqli_fetch_assoc($result)) {
											$amount=$row['amount'];
											$process=$row['process'];
											echo '
											
											<tr>
											<td>
													<a href="detail.php?id='.$row['product_id'].'">
														<img src="'.$row['image_link'].'" alt="'.$row['image_name'].'" height="100px" width="150px"/>
													</a>
											</td>
												<td style="font-size: 18px">'.$row['name'].'</td>
												<td>
													'.$row['soluong'].'
												</td>
												<th>'.$row['price'].'₫</th>';
												if($process!='0') {
													$style=' Đã được xử lý';
													}else {
														$style='Đang chờ xử lý';
													}
											echo '	<th>
													<span style="color:#289666"> '.$style.'</span>
												</th>
												
											</tr>';
										}
									}
								}
							}
							echo '</table>';
						}
					?>
				</div>
			</div>
			</div>
		</div>
		<?php include_once('footer.php');?>
	
</body>
</html>
