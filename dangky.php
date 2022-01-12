<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php include_once('banner.php'); ?>
	<div class="section section-dk pd-top-20">
		<div class="container">
		<div class="row justify-content-center">
		<div class="h-title col-lg-11 col-12">
					<h5>Đăng ký</h5>
				</div>
		</div>
			<div class="row justify-content-center">
				
					<div class="bg-white col-lg-7 col-12">
						<form action="dangky.php" method="POST">
							<table class="form-dk">

								<tr>
									<td for="inputEmail3" class=" col-form-label">Họ và tên*</td>
									<td>
										<input type="text" name="name" size="50px" class="form-control"></input>
									</td>
								</tr>
								<tr>
									<td for="inputEmail3" class=" col-form-label">Tên tài khoản*</td>
									<td>
										<input type="text" name="user" size="50px" class="form-control"></input>
									</td>
								</tr>
								<tr>
									<td for="inputEmail3" class=" col-form-label">Ngày sinh</td>
									<td>
										<input type="date" name="date_of_birth" class="form-control" />
									</td>
								</tr>
								<tr>
									<td for="inputEmail3" class=" col-form-label">Giới tính</td>
									<td>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="gender" value="Nam" checked >
											<label class="form-check-label" style="line-height: 30px;" >Nam</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="gender" value="Nữ" >
											<label class="form-check-label" style="line-height: 30px;" >Nữ</label>
										</div>
										<!-- <input class="form-check-input" type="radio" name="gender" value="male">Nam</input>
										<input class="form-check-input" type="radio" name="gender" value="female">Nữ</input> -->
									</td>
								</tr>

								<tr>
									<td for="inputEmail3" class=" col-form-label">Điện thoại</td>
									<td>
										<input type="text" name="phone" class="form-control">
									</td>
								</tr>
								<tr>
									<td for="inputEmail3" class=" col-form-label">Địa chỉ</td>
									<td>
										<input type="text" name="address" size="50px" class="form-control"></input>
									</td>
								</tr>
								<tr>
									<td for="inputEmail3" class=" col-form-label">Mật khẩu*</td>
									<td>
										<input type="password" name="password" class="form-control"></input>
									</td>
								</tr>
								<tr>
									<td>
									<td>
										<input type="submit" name="dangky" class="btn btn-primary" value="Đăng ký"></input>
										<input type="reset" class="btn btn-primary" value="Làm lại"></input>
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div class="bg-white col-lg-4 items-right justify-content-center ">
						<a href="javascript:open_oauth('Google')">
							<img src="./images/banner/img_signup_go.jpg" alt="gg">
						</a>
						<a href="javascript:open_oauth('Facebook')">
							<img src="./images/banner/img_signup_fb.jpg" alt="fb">
						</a>
					</div>
				
			</div>
		</div>
		<?php include_once('footer.php'); ?>
	</div>
	<?php 
	include_once('conn.php');
	if(isset($_POST['dangky'])){
		$name=$_POST['name'];
		$username=$_POST['user'];
		$date_of_birth=$_POST['date_of_birth'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		if($name == '' || $username == '' || $password == ''){
			echo '<script language="javascript">alert("Bạn vui lòng điền đầy đu thông tin");';
		}else {
			$sql= 'select * from users where username = "'.$username.'"';
			$result= mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				echo '<script language="javascript">alert("Tài khoản đã tồn tại");';
				echo 'location.href="home.php";</script>';
			}else{
				$query='insert into users (name,username,date_of_birth,gender,phone,address,password) 
				values ("'.$name.'","'.$username.'","'.$date_of_birth.'","'.$gender.'","'.$phone.'","'.$address.'","'.$password.'")';
				mysqli_query($con,$query);
				echo '<script language="javascript">alert("Bạn đã đăng ký thành công!");';
				echo 'location.href="home.php";</script>';
			}
		}
	}
?>
</body>

</html>
