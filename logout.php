<?php 
session_start(); 
unset($_SESSION['vaiTro']);
unset($_SESSION['tenDangNhap']);
// setcookie("checkDN", "", time()-(86400 * 15));

echo "
							<script language='javascript'>
								alert('đăng xuất thành công');
								window.open('login.php','_self', 1);
							</script>
						";
?>