<!DOCTYPE html>
<html>
	<?php include_once('head.php');?>

	<body>
	<?php include_once('top-admin.php'); ?>
	<div class="section bg-color-brown">
		<div class="container-fluid">
			<div class="row">
				<div class=" col-md-2 col-4 bg-color-admin ">
					<?php include_once('left-admin.php'); ?>
				</div>
				<div class="col-md-10 col-8 ">
					<div class="row">
						<div class="col-12 bg-white">
							<span style="font-size: 22px;font-weight: 600;">Add Products</span>
						</div>
						<div class="col-12">
							<div class="row ">
								<div class="col-md-8 col-12 bg-white bd-rd-5 mg-bottom-20 mg-left-20  mg-top-20">
									<?php 
										$user=$_SESSION['user'];
										$pass=$_SESSION['pass'];
										if($user!='admin'){
											echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
											echo 'location.href="home.php";</script>';
										}else{
									?>
									<form action="upload_product.php" method="POST" enctype="multipart/form-data">
										<table class="table table-borderless table-hover align-middle">
											<tr>
												<td>Hãng</td>
												<td>
													<input type="text" name="catalog" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Số lượng nhập kho</td>
												<td>
													<input type="text" name="sl" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Tên sản phẩm</td>
												<td>
													<input type="text" name="product_name" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Giá</td>
												<td>
													<input type="text" name="price" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Kích thước</td>
												<td>
													<input type="text" name="size"  class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Trọng lượng</td>
												<td>
													<input type="text" name="weight" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Độ phân giải</td>
												<td>
													<input type="text" name="display" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>CPU</td>
												<td>
													<input type="text" name="cpu" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>RAM</td>
												<td>
													<input type="text" name="ram"  class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Ổ cứng</td>
												<td>
													<input type="text" name="rom" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Card màn hình</td>
												<td>
													<input type="text" name="card" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>PIN</td>
												<td>
													<input type="text" name="pin" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Cổng giao tiếp</td>
												<td>
													<input type="text" name="port" class="form-control"/>
												</td>
											</tr>
											<tr>
												<td>Hệ điều hành</td>
												<td>
													<input type="text" name="os" class="form-control"/>
												</td>
											</tr>
											<tr  >
												<td >Webcam:</td>
												<td>
													<div class="form-check form-check-inline">
														<input type="radio"  class="form-check-input" name="cam" value="Có"/>
														<label for="">Có</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="radio" class="form-check-input" name="cam" value="Không"/>
														<label class="form-check-label" for="">Không</label>
													</div>
												</td>
											</tr>
											<tr >
												<td>Loa</td>
												<td>
													<div class="form-check form-check-inline">
														<input type="radio"  class="form-check-input" name="loa" value="Có"/>
														<label for="">Có</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="radio" class="form-check-input" name="loa" value="Không"/>
														<label class="form-check-label" for="">Không</label>
													</div>
												</td>
											</tr>
											<tr >
												<td >Đĩa quang</td>
												<td>
													<div class="form-check form-check-inline">
														<input type="radio"  class="form-check-input" name="cd" value="Có"/>
														<label for="">Có</label>
													</div>
													<div class="form-check form-check-inline">
														<input type="radio" class="form-check-input" name="cd" value="Không"/>
														<label class="form-check-label" for="">Không</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>Hình ảnh sản phẩm</td>
												<td>
													<input type="file" name="image" id="image"/>
												</td>
											</tr>
											<tr>
												<th></th>
												<th>
													<input onclick="return ConfirmUpload();" type="submit" name="submit_upload" class="btn btn-success"value="Upload sản phẩm"/>
												</th>
											</tr>
										</table>
									</form>
									<?php }?>

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
<script>
    function ConfirmUpload()
    {
      var x = confirm("Bạn có chắc muốn Thêm sản phẩm không?");
      if (x)
        return true;
      else
        return false;
    }
</script>  