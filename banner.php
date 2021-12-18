<div class="section navbar-area" style="background-color: #081828; padding: 5px 0px;">
	<div class="container">
		<div class="row justify-content-center top-bar">
			<div class="col-lg-3 col-md-6 col-sm-5 col-6 justify-content-start margin-top-bottom">
				<a href="tel:1900 1234" class="no-decoration dp-flex tuvan align-items-center">
					<div class="item-top align-items-center ">
						<i class="fas fa-phone-alt"></i>
						<p>Tư vấn bán hàng</p>
					</div>

				</a>
			</div>
			<div class=" justify-content-center col-lg-4 col-md-6 col-sm-7 col-6 dp-flex margin-left margin-top-bottom">
				<a href="tel:1900 1234" class="no-decoration dp-flex tuvan align-items-center">
					<div class="item-top align-items-center">
						<p>Contact</p>
					</div>
				</a>
				<a href="tel:1900 1234" class="d-min-none no-decoration dp-flex tuvan align-items-center">
					<div class="item-top align-items-center">
						<p>24/24</p>
					</div>
				</a>
				<a href="tel:1900 1234" class="no-decoration dp-flex tuvan align-items-center">
					<div class="item-top align-items-center">

						<p>1900 1234</p>
					</div>
				</a>

			</div>

			<div class="d-max-992-none col-lg-4 col-md-3 col-sm-7 col-6 dp-flex margin-left margin-top-bottom" style="justify-content: flex-end">
				<a href="tel:1900 1234" class=" no-decoration dp-flex tuvan align-items-center">
					<div class="item-top align-items-center">
						<p>Yêu cầu báo giá</p>
					</div>
				</a>
				<a href="tel:1900 1234" class="no-decoration tuvan align-items-center">
					<div class="item-top align-items-center">

						<p>Khuyến mãi</p>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>

<div class="section" style="background-color:#1a4388; ">
	<div class="container ">
		<div class="row align-items-center" style="height: 100px">
			<div class=" col-lg-3 col-md-5 col-sm-5 col-5">
				<div class="head-logo">
					<a href="home.php">
						<img src="./images/banner/logo_ankhang.png" alt="" />
					</a>
				</div>
			</div>
			<div class=" col-lg-4 col-md-0 col-sm-0 col-0 d-max-992-none">

				<form action="timkiem.php" method="GET">
					<div class="search-head dp-flex">
						<input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control">
						<button type="submit" name="tim"><i class="fas fa-search"></i></button>
					</div>
				</form>

			</div>
			<div class=" col-lg-5 col-md-7 col-sm-7 col-7 dp-flex no-decoration ">
				<div class="item-hotline dp-flex d-max-1200-none">
					<a href="tel:1900 1234">
						<i class="fas fa-phone-alt"></i>
					</a>
					<h5>Hotline: <span>1900 1234</span> </h5>
				</div>
				<div class="item-account dp-flex">
					<i class="fas fa-user-circle"></i>


					<?php
					if (!isset($_SESSION['user'])) {
						echo '
								<h5>  <a class="no-decoration" style="color: #fff;">TÀI KHOẢN</a> 
								<div class="dn-dk">
									<div class="cart-items" style="margin-top:2.2px">
										<a href="javascript:void(0)" class="no-decoration " ><span> Đăng nhập</span></a>
										<div class="shopping-item">
												<div class="dropdown-cart-header">
													
															
																<form action="act-dangnhap.php" method="POST">												
																	<input type="text" name="user"  placeholder="Tài khoản" class="form-control" >			
																	<input type="password" name="pass" placeholder="Mật khẩu"  class="form-control" style="margin-top: 5px;"/>			
																	<input type="submit" name="login" value="Đăng nhập"  class="form-control" style="margin-top: 5px;"/>
																</form>
													
												</div>
												
										</div>
									</div>
									
									<span> | </span>
									<a href="./dkm.php" class="no-decoration" style="margin-top:2.2px"><span> Đăng ký</span></a>
								
								</div> </h5>
								';
					} else {
						include_once('conn.php');
						$user = $_SESSION['user'];
						$pass = $_SESSION['pass'];
						$sql = 'select * from users where username like "' . $user . '" and password like "' . $pass . '"';
						$result = mysqli_query($con, $sql);
						if (mysqli_num_rows($result)) {
							while ($row = mysqli_fetch_assoc($result)) {
								if ($user != 'admin') {
									echo '
												<h5>  <a href="update_profile.php?user_id=' . $row['user_id'] . '" class="no-decoration" style="color: #fff;">TÀI KHOẢN</a> 
													<div class="dn-dk">
														<div class="cart-items" style="margin-top:2.2px">
															<a href="javascript:void(0)" class="no-decoration " ><span> ' . $row['username'] . '</span></a>
															<div class="shopping-item">
															<div class="dropdown-cart-header">
																<span>
																	<a href="donhang.php?user_id=' . $row['user_id'] . '" style="float: left; no-decoration; font-size: 16px; font-weight: 700" class="no-decoration" >Lịch sử đơn hàng</a>
																</span>
																</div>
												
										</div>
														</div>
													
														<span> | </span>
														<a href="logout.php" class="no-decoration" style="margin-top:2.2px"><span> Đăng xuất</span></a>
												
													</div>
												</h5>';
								} else {
									header('location:admin.php');
								}
							}
						}
					}
					?>

				</div>
				<div class="item-account dp-flex " style="padding-right: 10px">
					<a href="shoppingcart.php">
						<i class="fas fa-cart-arrow-down" style=" position: relative;">
							<?php
							if (isset($_SESSION['user'])) {
								include_once('conn.php');
								$user = $_SESSION['user'];
								$pass = $_SESSION['pass'];
								$sql = 'select * from users where username like "' . $user . '" and password like "' . $pass . '"';
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result)) {
									while ($row = mysqli_fetch_assoc($result)) {
										if (isset($_SESSION['giohang'])) {
											$sl = count($_SESSION['giohang']);
											echo '<span style="position: absolute; top: -15px; height: 19px; width: 19px; line-height: 19px; background-color: #ffffff; 
											color: #1a4388; font-size: 18px; font-weight: 700; text-align: center; border-radius: 50%;" >' . $sl . ' </span>';
										} else {
											echo '<span style="position: absolute; top: -15px; height: 19px; width: 19px; line-height: 19px; background-color: #ffffff; 
											color: #1a4388; font-size: 18px; font-weight: 700; text-align: center; border-radius: 50%;" >0</span>';
										}
									}
								}
							}
							?>
						</i>
					</a>
					<div class="d-xs-none ">
						<h5 style="line-height: 40px">Giỏ hàng</h5>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="section" style="border-bottom: 1px solid #eee;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-9 col-md-6 col-4">
				<div class="nav-inner">
					<!-- Start Mega Category Menu -->
					<div class="mega-category-menu">
						<span class="cat-button"><i class="lni lni-menu"></i>Danh mục sản phẩm</span>
						<ul class="sub-category">
							<?php
							include_once('conn.php');
							$sql = 'select * from catalogs';
							$result = mysqli_query($con, $sql);
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									echo '<li><a href="list.php?id=' . $row['catalog_id'] . '">' . $row['name'] . '</a></li>';
								}
							}
							?>
						</ul>
					</div>
					<!-- End Mega Category Menu -->
					<!-- Start Navbar -->
					<nav class="navbar navbar-expand-lg">
						<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
							<ul id="nav" class="navbar-nav ms-auto">
								<li class="nav-item">
									<a href="home.php" class="active" aria-label="Toggle navigation">Trang chủ</a>
								</li>
								<li class="nav-item">
									<a href="gioithieu.php" aria-label="Toggle navigation">Giới thiệu</a>

								</li>
								<li class="nav-item">
									<a class="dd-menu collapsed" href="home.php">Sản phẩm</a>
								</li>
								<li class="nav-item">
									<a href="#" aria-label="Toggle navigation">Blog</a>

								</li>
								<li class="nav-item">
									<a href="lienhe.php" aria-label="Toggle navigation">Liên hệ</a>
								</li>
							</ul>
						</div> <!-- navbar collapse -->
					</nav>
					<!-- End Navbar -->
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-8">
				<!-- Start Nav Social -->
				<div class="nav-social">

					<ul>
						<li>
							<a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
						</li>
					</ul>
				</div>
				<!-- End Nav Social -->
			</div>
		</div>
	</div>
</div>
