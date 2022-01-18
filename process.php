<?php
	include_once('conn.php');
	$id_trans=$_GET['id'];
	$sql= 'update transactions set process = "1" where transaction_id = "'.$id_trans.'"';
	mysqli_query($con,$sql);
	$minusquatily = 'SELECT product.product_id, orders.soluong as slorder, product.soluong as slpr FROM orders, product WHERE orders.product_id = product.product_id AND transaction_id = "'.$id_trans.'"';
	$resultquatily=mysqli_query($con,$minusquatily);
	if(mysqli_num_rows($resultquatily)){
		while ($row = mysqli_fetch_assoc($resultquatily)){
			$kq = $row['slpr'] - $row['slorder'];
			$updatequatily = 'update product set soluong = "'.$kq.'" where product_id = "'.$row['product_id'].'"';
			mysqli_query($con,$updatequatily);
		}
	}
	if(mysqli_affected_rows($con)>0) {
		echo '<script language="javascript">alert("Yêu cầu đã được nhận!");';
		echo 'location.href="order_management.php";</script>';
	}else {
		echo '<script language="javascript">alert("Yêu cầu không thể thực hiện! Vui lòng kiểm tra lại.");';
		echo 'location.href="order_management.php";</script>';
	}
?>