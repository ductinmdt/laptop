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
							<span style="font-size: 22px;font-weight: 600;">Edit Products</span>
						</div>
						<div class="col-12  mg-top-20">
							<?php 
								$user=$_SESSION['user'];
								$pass=$_SESSION['pass'];
								if($user!='admin'){
									echo '<script language="javascript">alert("Bạn không đủ quyền để truy cập");';
									echo 'location.href="home.php";</script>';
								}else{
									include_once('update_detail_product.php');
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