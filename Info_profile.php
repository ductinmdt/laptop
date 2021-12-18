<?php
						include_once('conn.php');
						$id=$_GET['user_id'];
						//$user=$_SESSION['user'];
						$sql='select * from users where user_id = "'.$id.'"';
						$result=mysqli_query($con,$sql);
						if(mysqli_num_rows($result)>0) {
							while ($row=mysqli_fetch_assoc($result)) {
								echo '
								<form action="act-update.php" method="POST">
									<div class="address-cart">
										<span class="name" >'.$row['name'].'</span>
										<span>'.$row['phone'].'</span>
									</div>
									<div class="">
										<span>'.$row['address'].'</span>
									</div>		
								</form>';	
							}
						}
					?>