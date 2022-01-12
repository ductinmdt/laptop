<?php 
	session_start();
	include_once('conn.php');
	if(isset($_POST['login']))
	{
		$user= mysqli_real_escape_string($con,$_POST['user']); //mysqli_real_escape_string kiểm tra kí tự đặt biệt
		$pass= mysqli_real_escape_string($con,$_POST['pass']);
		if($user== '' || $pass == '')
		{
			echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không được để trống!");';
			echo 'location.href="home.php";</script>';
		}
		else
		{
			$sql='select * from users where username = "'.$user.'" and password = "'.$pass.'"';//var_dump($sql);exit;
			$result=mysqli_query($con,$sql);//var_dump($result);exit; thực hiện truy vấn câu lệnh sql
			if(mysqli_num_rows($result)>0) // mysqli_num_rows kiểm tra số hàng trong kết quả truy vấn
			{
				while($row=mysqli_fetch_assoc($result)) // mysqli_fetch_assoc trả về kiểu mãn cho từng cột
				{
					if($row['level']!=1)
					{
					$_SESSION['user']=$user;
					$_SESSION['pass']=$pass;
					$_SESSION['login']=$_POST['login'];
		//			var_dump($_SESSION['email']);exit;
					echo '<script language="javascript">alert("Bạn đã đăng nhập thành công!");';
					echo 'location.href="home.php";</script>';
					}
					else
					{
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
						$_SESSION['login']=$_POST['login'];
			//			var_dump($_SESSION['email']);exit;
						echo '<script language="javascript">alert("Xin chao Admin!");';
						echo 'location.href="admin.php";</script>';
					}
				}
			}
			else
			{
				echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không đúng!");';
				echo 'location.href="home.php";</script>';
			}
		}
	}
?>
