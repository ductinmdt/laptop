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

						
							<?php
							$user = $_SESSION['user'];
							if ($user != 'admin') {
								echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
								echo 'location.href="home.php";</script>';
							} else {
								include_once('conn.php');
								$id = $_GET['letter'];
								$update = 'update detail_report set status = "1" where id = "' . $id . '"';
								$result = mysqli_query($con, $update);

								$sql = 'select * from detail_report,loai_chude where loai_chude.id=detail_report.id_chude and detail_report.id = "' . $id . '" ';
								$kq = mysqli_query($con, $sql);

								if (mysqli_num_rows($kq) > 0) {
									while ($row = mysqli_fetch_assoc($kq)) {
										$name = $row['name'];
										$title = $row['title'];
										$chude = $row['chude'];
										$email = $row['email'];
										$phone = $row['phone'];
										$detail = $row['detail'];
							?>			
										<div class="col-12 bg-color-brown">
											<span style="font-size: 22px;font-weight: 600;">Thư phản hồi số <?php echo $id; ?></span>
										</div>
										<div class="col-12 mg-top-20">
										<table class="table table-striped table-bordered table-hover align-middle">
											<tr>
												<th>
													Chủ đề:
												</th>
												<td>
													<?php echo $chude; ?>
												</td>
											</tr>
											<tr>
												<td>
													Tiêu đề:
												</td>
												<td>
													<?php echo $title; ?>
												</td>
											</tr>
												<tr>
													<th colspan="2">
														THÔNG TIN LIÊN HỆ
													</th>
												</tr>
											<tr>
												<td>
													Tên người gửi:
												</td>
												<td>
													<?php echo $name; ?>
												</td>
											</tr>
											<tr>
												<td>
													E-Mail:
												</td>
												<td>
													<?php echo $email; ?>
												</td>
											</tr>
											<tr>
												<td>
													Số điện thoại:
												</td>
												<td>
													<?php echo $phone; ?>
												</td>
											</tr>
												<tr>
													<th colspan="2">
														NỘI DUNG
													</th>
												</tr>
											<tr>
												<td colspan="2">
													<?php echo $detail; ?>
												</td>
											</tr>
										</table>
										<p>
											<a href="del-report.php?letter=<?php echo $id; ?>">
												<input type="button" name="del" class="btn btn-danger" value="XÓA" />
											</a>
										</p>
										</div>

							<?php
									}
								}
							}
							?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>