<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php include_once('top-admin.php'); ?>
	<?php
	$user = $_SESSION['user'];
	if ($user != 'admin') {
		echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
		echo 'location.href="home.php";</script>';
	} else {
	?>
		<div class="section ">
			<div class="container-fluid">
				<div class="row">
					<div class=" col-md-2 col-4 bg-color-admin ">
						<?php include_once('left-admin.php'); ?>
					</div>
					<div class="col-md-10 col-8 ">
						<div class="row">
							<div class="col-12 bg-color-brown">
								<span style="font-size: 22px;font-weight: 600;">List Messages</span>
							</div>
							<div class="col-12 mg-top-20">
								<table class="table table-striped table-hover align-middle table-bordered">
									<thead>
									<tr>
										<th>
											Chủ đề
										</th>
										<th colspan="2" >
											Tiêu đề
										</th>
									</tr>
									
									</thead>
									<?php
									include_once('conn.php');
									$sql = 'select detail_report.id, chude, title, status from detail_report,loai_chude where loai_chude.id=detail_report.id_chude';
									$kq = mysqli_query($con, $sql);
									if (mysqli_num_rows($kq) > 0) {
										while ($mail = mysqli_fetch_array($kq)) { ?>
											<tr>
												<td>
													<?php echo $mail['chude']; ?>
												</td>
												<td>
													<?php echo $mail['title']; ?>
												</td>
												<?php
												if ($mail['status'] != 0) {
													$style =  'value="ĐÃ XEM" class="btn btn-success"';
												} else {
													$style = 'value="XEM" class="btn btn-warning"';
												}
												?>
												<th>
													<a href="see-report.php?letter=<?php echo $mail['id']; ?>">
														<input type="button" name="see" <?php echo $style; ?> />
													</a>
													<a href="del-report.php?letter=<?php echo $mail['id']; ?>">
														<input type="button" class="btn btn-danger" name="del" value="XÓA" />
													</a>
												</th>
											</tr>
								<?php 	}
									}
								}
								?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>

</html>