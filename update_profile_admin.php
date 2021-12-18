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
							<span style="font-size: 22px;font-weight: 600;">Information Admin</span>
						</div>
						<div class="col-12 mg-top-20">
						<?php
							include_once('conn.php');
							$id=$_GET['user_id'];
							//$user=$_SESSION['user'];
							$sql='select * from users where user_id = "'.$id.'"';
							$result=mysqli_query($con,$sql);
							if(mysqli_num_rows($result)>0) {
								while ($row=mysqli_fetch_assoc($result)) {
									echo '
									<form action="act-update-admin.php" method="POST">
										<div class="row justify-content-center">
											<div class="col-md-6 col-12 bg-white bd-rd-5 mg-bottom-20">
											<span style="font-size: 18px; margin-top: 10px; display: block; color: #5d5d5d">Thông tin cá nhân</span>
											<input type="hidden" name="user_id" value="' . $id . '"/>
													<table class="table table-borderless align-middle">
														<tbody>
															<tr>
																<td>Họ và tên</td>
																<td><input type="text" name="name" class="form-control" value="' . $row['name'] . '" /></td>
															</tr>
															<tr>
																<td>Ngày sinh</td>
																<td><input type="date" name="date_of_birth" class="form-control" value="' . $row['date_of_birth'] . '"/></td>
															</tr>
															<tr>';?>
																<td>Giới tính</td>
																<td>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" type="radio" name="sex" value="male" <?php
																		if ($row['gender'] == 'male') {echo 'checked';} 
																		else {echo '';} ?> />
																		<label class="form-check-label" for="inlineRadio1">Nam</label>
																	</div>
																	<div class="form-check form-check-inline">
																		<input class="form-check-input" type="radio" name="sex" value="female" <?php
																		if ($row['gender'] == 'female') {echo 'checked';} 
																		else {echo '';} ?> />
																		<label class="form-check-label" for="inlineRadio2">Nữ</label>
																	</div>
																</td>
														<?php
													echo'	</tr>
															<tr>
																<td>Số điện thoại</td>
																<td><input type="text" name="phone" class="form-control" value="' . $row['phone'] . '"/></td>
															</tr>
															<tr>
																<td>Địa chỉ</td>
																<td><input type="text" name="address" class="form-control" value="' . $row['address'] . '"/></td>
															</tr>
															<tr>
																<td></td>
																<td><input onclick="return ConfirmUpdate();" type="submit" class="btn btn-danger" name="save" value="Lưu thay đổi"/></td>
															</tr>
														</tbody>
													</table>
												
											</div>
											<div class="col-md-5 col-12 mg-left-20 hidden-mg bg-white bd-rd-5 mg-bottom-20">
											<span style=" font-size: 18px; margin-top: 10px; display: block; color: #5d5d5d">Thông tin đăng nhập</span>
													
													<table class="table table-borderless align-middle">
														<tr>
															<td>Tài khoản</td>
															<td><input type="text" name="user" readonly="readonly" class="form-control" value="' . $row['username'] . '" /></td>
														</tr>
														<tr>
															<td>Mật khẩu</td>
															<td><input type="password" name="pass" class="form-control"  value="' . $row['password'] . '" /></td>
														</tr>
														<tr>
																<td></td>
																<td>
																<input onclick="return ConfirmUpdate();" type="submit" name="save" class="btn btn-danger" value="Lưu thay đổi" /></td>
															</tr>
													</table>
												
											</div>
										</div>
									</form>';	
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
    function ConfirmUpdate()
    {
      var x = confirm("Bạn có chắc muốn thay đổi dữ liệu không?");
      if (x)
        return true;
      else
        return false;
    }
</script>  
