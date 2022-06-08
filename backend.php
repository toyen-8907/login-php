<?php

	//啟動 session
	session_start();
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'db.php';
	$_SESSION['a']=false;
	//echo $_SESSION['acname'];
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>後台管理</title>

	</head>
	<style>
		.error{
			color:green;
		}
		.result {
			text-align:center;
			display:flex;
			flex-direction:column;
			width:100%;
			justify-content:center;
		}
		.resul {
			text-align:center;
			display:flex;
			flex-direction:column;
			
			justify-content:center;
			background-color:white;
			width:80%;
			margin-left:auto;
			margin-right:auto;
			padding: 20px;
		}
		h2{
			animation:bounce infinite 1.5s;
			padding:20px 60px;
			margin-left:auto;
			margin-top:20px;
			margin-right:auto;
			border:3px white solid;
			background-color:#FFAF60; color:white; border-radius:25px; font-weight:bold;
		}
		a{
			color:white;
			font-size:18px;
            text-decoration:none;
		}
		h5{
			animation:bounce 1.5s;
			margin:20px;
			color:white;	
		}
		button{
            cursor:pointer; height:50px;width:150px; background-color:#FFAF60; color:white; border-radius:25px;border-color:#FFFF6F; font-weight:bold; font-size:14px;letter-spacing: 6px;padding-left: 12px;border:3px solid;margin-left:20px;
        }
		@keyframes bounce {
            0%, 100% {
                transform: translateY(-10%);
                animation-timing-function: cubic-bezier(0.7, 0, 0.9, 0);
            }
            50% {
                transform: translateY(0);
                animation-timing-function: cubic-bezier(0, 0, 0.01, 1);
            }
        }
	</style>
<body style="background-color:#3C3C3C; padding: 0; margin: 0;">
	<div style="display:flex;margin-top:20px;position:fixed;justify-content:flex-end;width:100%">
        <div style="margin-right:20px">
            <button><a href="orderStatus.php">訂單狀態</a></button>
        </div>   
    </div>
	
		<?php
			//使用 isset()方法，判別有沒有此變數可以使用，以及為已經登入
			if(isset($_SESSION['login_session']) && $_SESSION['login_session'] == TRUE):
			$query = "SELECT ";
	    ?>
	<div>
		<div class="result">
			<div style="display:flex;margin-top:20px;justify-content:flex-start;">
				<div style="display:flex;margin:20px;justify-content:center;width:100%">	
						<img src="img/logo.jpg" alt="" style="border-radius:50%;border:5px solid white" width="120px">
					<div style="width:35%;padding: 10px;">
						<h2>你正在後台，登入成功</h2>
					</div>
				</div>
	
				
			</div>
			<div class="resul">
				<div style="dispaly:flex">
						<img src='img/minino.gif' style="border-radius:45px">
				</div>
				
				<h5>
					<?php
						if(isset($_GET['msg'])){
							echo "<p class='error'>{$_GET['msg']}</p>";
						}
					?>
				</h5>
				<div style="display:flex;flex-wrap:wrap;justify-content:center;text-align:center;">
					<img src="img/工作區域 1 複本 4.png" alt="" width="300px">
					<img src="img/56_工作區域 1.png" alt="" width="300px">
					<img src="img/S__152002567.jpg" alt="" width="300px">
					<img src="img/af1.jpg" alt="" width="300px">
					<img src="img/S__152002569.jpg" alt="" width="300px">
					<img src="img/S__152002570.jpg" alt="" width="300px">
					<img src="img/工作區域 1 複本 2.png" alt="" width="300px">
					<img src="img/工作區域 1 複本 3.png" alt="" width="300px">
				</div>
				<div style="margin-top:40px">
					<form action="order.php" method="post">
						
						<div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
							<!-- <label for="name"  style="font-size:20px;letter-spacing: 8px">輸入帳號:</label> -->
							<input style="height:30px;width:200px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="hidden" name="name" value="<?php $_SESSION['acname'] ?>"/><br/>
						</div>
						<div style="display:flex; width:100%;text-align:center;justify-content:center;flex-direction:column;align-items:center;;font-family:Microsoft JhengHei;font-weight:bold">    
							<input type="hidden" name="token" value="<?php echo $_SESSION['a']?>">

							<div style="margin-bottom:20px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
								<label for="name" style="font-size:20px;letter-spacing: 8px"> 訂購商品 </label>
								<select style="width:200px;height:30px;margin-top:20px" name="pd_id">
									<option value="2">coast</option>
									<option value="3">georgetown</option>
									<option value="4">AF1</option>
									<option value="5">team_green</option>
									<option value="6">light_bone</option>
									<option value="7">next_nature</option>
									<option value="8">harvest_moon</option>
									<option value="9">light_violet</option>
								</select>
							</div>
							<div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
								<label for="num"  style="font-size:20px;letter-spacing: 8px">數量:</label>
								<input style="height:30px;width:200px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="text" name="num" /><br/>
							</div>
							<div>
								<input style="cursor:pointer; height:50px;width:250px;margin-left:20px;border-radius:25px;outline: none; border:3px solid;font-weight:bold;background-color:#FFAF60; color:white;border-color:white;font-size:16px;letter-spacing: 8px;padding-left: 12px;" id="submit" type="submit" value="下單"></input>               
							</div>  
						</div>
					</form>
				</div>
			</div>
			

			<div style="display:flex;margin:auto;margin-top:30px">
				<button><a href='edit_password.php'>修改密碼</a></button>
				<button><a href='logout.php'>登出</a>	</button>
				<button><a href='delete.php'>刪除帳號</a></button>
			</div>
            
		</div>
	</div>


		<?php
			else:

				//使用php header 來轉址到後台
				header('Location: login.php');
			endif;
		?>

	</body>
</html>
