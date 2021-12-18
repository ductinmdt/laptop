<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php include_once('banner.php'); ?>
	<?php include_once('left.php'); ?>

	<div class="section section-lienhe pd-top-20">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-12">
					<form action="xuly.php" method="POST" class="form-lienhe">
						<h5 style="color:#1976d2;">XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH.</h5>
						<table>
							<tr>
								<td>Quý khách đang quan tâm về*:</td>
								<td>
									<select name="chude" class="form-select" aria-label="Default select example">
										<option value="0" selected>Chọn Chủ đề</option>
										<?php
										include_once('conn.php');
										$sql = 'select * from loai_chude';
										$kq = mysqli_query($con, $sql);
										if (mysqli_num_rows($kq) > 0) {
											while ($chude = mysqli_fetch_array($kq)) {
												echo '<option value="' . $chude['id'] . '">' . $chude['chude'] . '</option>';
											}
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Tiêu đề*:</td>
								<td>
									<input type="text" name="title" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>Họ và tên*:</td>
								<td>
									<input type="text" name="name" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>Địa chỉ Email*:</td>
								<td>
									<input type="email" name="email" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>Số điện thoại:</td>
								<td>
									<input type="text" name="phone" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>Nội dung*:</td>
								<td>
									<textarea name="detail" placeholder="Xin quý khách vui lòng mô tả chi tiết" class="form-control"></textarea>
								</td>
							</tr>
							<tr>
								<td> </td>
								<td>
									<input type="submit" name="gui" class="btn btn-primary" value="Gửi" />
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="col-lg-3 col-12 d-max-992-none icons-lienhe align-items-center">
					<img class="lh1" src="images/banner/lh1.png" alt="">
					<a href="tel:19001234">
						<i class="fas fa-phone-alt"></i>
						<span>1900 1234</span>
					</a>
					<a href="mailto:ductinmdt@gmail.com">
						<i class="bi bi-envelope"></i>
						<span>ductinmdt@gmail.com</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<section class="shipping-info mg-top-20">
		<div class="container">
			<ul>
				<!-- Free Shipping -->
				<li>
					<div class="media-icon">
						<i class="lni lni-delivery"></i>
					</div>
					<div class="media-body">
						<h5>Miễn phí vận chuyển</h5>
						<span>Đối với đơn hàng trên 100.000₫</span>
					</div>
				</li>
				<!-- Money Return -->
				<li>
					<div class="media-icon">
						<i class="lni lni-support"></i>
					</div>
					<div class="media-body">
						<h5>Hỗ trợ 24/7.</h5>
						<span>Trò chuyện trực tiếp hoặc gọi điện.</span>
					</div>
				</li>
				<!-- Support 24/7 -->
				<li>
					<div class="media-icon">
						<i class="lni lni-credit-cards"></i>
					</div>
					<div class="media-body">
						<h5>Thanh toán trực tuyến.</h5>
						<span>Dịch vụ thanh toán an toàn.</span>
					</div>
				</li>
				<!-- Safe Payment -->
				<li>
					<div class="media-icon">
						<i class="lni lni-reload"></i>
					</div>
					<div class="media-body">
						<h5>Đổi trả dể dàng.</h5>
						<span>Mua sắm miễn phí.</span>
					</div>
				</li>
			</ul>
		</div>
	</section>


	<?php include_once('footer.php'); ?>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</script>
</body>

</html>