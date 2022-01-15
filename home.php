<!DOCTYPE html>
<html>
<?php include_once('head.php'); ?>

<body>
	<?php
	if (!isset($_SESSION['user'])) {
		unset($_SESSION['giohang']);
	} else {
		if (isset($_GET['giohang'])) {
			$id = $_GET['giohang'];
			if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
				$count = count($_SESSION['giohang']);
				$flag = false;
				for ($i = 0; $i < $count; $i++) {
					if ($_SESSION['giohang'][$i]['id'] == $id) {
						$_SESSION['giohang'][$i]['soluong'] += 1;
						$flag = true;
						break;
					}
				}
				if ($flag == false) {
					$_SESSION['giohang'][$count]['id'] = $id;
					$_SESSION['giohang'][$count]['soluong'] = 1;
				}
			} else {
				$_SESSION['giohang'] = array();
				$_SESSION['giohang'][0]['id'] = $id;
				$_SESSION['giohang'][0]['soluong'] = 1;
			}
			//echo $_SESSION['giohang'][0]['soluong'];
			header('location: home.php');
		}
	}

	?>


	<?php include_once('banner.php'); ?>
	<?php include_once('left.php') ?>
	<?php include_once('item.php'); ?>


	<div class="container">
		<div class="contein">
			<div class="right">

			</div>
			<div class="phantrang">
				<?php
				for ($i = 1; $i < $sotrang + 1; $i++)
					echo '<b><a class="a-phantrang" href="?page=' . $i . '" style="color:#000;">'  . $i . '</a>  </b>';
				?>
			</div>

		</div>
	</div>
	<?php include_once('bannerfooter.php'); ?>


	<?php include_once('footer.php'); ?>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</script>
</body>

</html>