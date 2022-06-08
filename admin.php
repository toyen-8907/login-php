<?php
	//啟動 session
	session_start();
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>後台管理</title>

	</head>
	<style>
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
			width:80%;
			justify-content:center;
			background-color:white;

			margin-left:auto;
			margin-right:auto;
			padding: 20px;
		}
		.resul1 {
			text-align:center;
			display:flex;
			
			width:80%;
			justify-content:space-around;
			background-color:white;

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
			margin:40px;
			color:white;	
		}
		button{
            cursor:pointer; height:50px;width:180px; background-color:#FFAF60; color:white; border-radius:25px;border-color:#FFFF6F; font-weight:bold; font-size:14px;letter-spacing: 6px;padding-left: 12px;border:3px solid;margin-left:20px;
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

		.select{
			display:flex;
			justify-content:space-around;
			margin-bottom:50px;
		}

		.pd{
			display:flex;		
			background-color:white;
			padding: 20px;
		}
		.edited{
			color:green;
			animation:bounce infinite 1.5s;
			margin-top: 5px;
		}
	</style>
<body style="background-color:#3C3C3C; padding: 0; margin: 0;">
		<?php
			//使用 isset()方法，判別有沒有此變數可以使用，以及為已經登入
			if(isset($_SESSION['login_session']) && $_SESSION['login_session'] == TRUE):
	    ?>
	<div>
		<div class="result">
			<div class="result">
				<h2>管理員 已經登入</h2>
			</div>
			
			<div class="resul">
				<h3>
					<?php
						if(isset($_GET['msg'])){
							echo "<p class='edited'>{$_GET['msg']}</p>";
						}
					?>
				</h3>
				<?php	
						$datas = array();
						$datas1= array();
						$datas2=array();
						$datas3=array();

						$query = "SELECT `order_id`,`order_date`,`order_status`,`ac_id` FROM `pd_order` WHERE `order_status` !='運送中' ORDER BY `ac_id` ASC";
						$query1 = "SELECT `ac_id`, `accountName`, `address` FROM `account` WHERE `ac_id` IN(SELECT `ac_id` FROM `pd_order` WHERE `order_status` != '運送中')";
						$query2 = "SELECT `pd_num`, `pdID`, `order_id` FROM `buylist` WHERE `order_id` IN(SELECT `order_id` FROM `pd_order` WHERE `order_status` != '運送中')";
						$query3 = "SELECT `pd_name`, `price`, `pd_id`, `pd_img_address` FROM `pd_list`";

						$result = mysqli_query($link, $query);
						$result1 = mysqli_query($link, $query1);
						$result2 = mysqli_query($link,$query2);
						$result3 = mysqli_query($link,$query3);
						
						if ($result && $result1 && $result2)
							{
							//使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
							if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2)>0)
							{
								//取得的量大於0代表有資料
								//while迴圈會根據查詢筆數，決定跑的次數
								//mysqli_fetch_assoc 方法取得 一筆值
								while ($row = mysqli_fetch_assoc($result))
								{
								$datas[] = $row;
								}
								while ($row1 = mysqli_fetch_assoc($result1))
								{
								$datas1[] = $row1;
								}
								while ($row2 = mysqli_fetch_assoc($result2))
								{
								$datas2[] = $row2;
								}
							}
							//釋放資料庫查詢到的記憶體
							mysqli_free_result($result);
							}
							else{
								echo "語法執行失敗，錯誤訊息：" . mysqli_error($link);
							}
						if($result3){
							if(mysqli_num_rows($result3)>0){
								while($row3 = mysqli_fetch_assoc($result3)){
									$datas3[] = $row3; 
								}
							}
							mysqli_free_result($result3);
						}else{
							echo "語法執行失敗，錯誤訊息：" . mysqli_error($link);
						}	
					?>
				<div class="resul" style="border:2px solid black;margin:20px auto"><h4>上架商品列表</h4></div>
				<div class="resul1" style="margin-bottom:80px;text-align:left">
					<div>
						<?php if(!empty($datas3)):?>
							<?php foreach($datas3 as $key=> $row3):?>
								商品ID <?php echo $row3['pd_id']?>，商品名稱 :<?php echo $row3['pd_name']?>，價格:<?php echo $row3['price']?></br>
							<!-- <div>
								<img src="?php echo $row3['pd_img_address']?>" alt="商品" width="300px" >	
							</div>					 -->
								<?php endforeach; ?>
							<?php else:?>
									查無資料
						<?php endif; ?>	
					</div>
					<div>
						<form action="editOrder.php" method="post">
							<div style="margin-bottom:15px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
								<label for="name" style="font-size:15px;letter-spacing: 8px">欲修改訂單之id:</label>
								<input style="height:30px;width:250px;margin-left:20px;border-radius:25px;text-align:center;outline: none;margin-top:10px" type="text" name="order_id" id="name" autofocus/><br/>
							</div>
							<div style="margin-bottom:25px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
								<label for="newpassword"  style="font-size:15px;letter-spacing: 8px">訂單狀態:</label>
								<input style="height:30px;width:250px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="text" name="order_status" autofocus/><br/>
							</div>
							<div style="display:flex; justify-content:center;">
								<input style="cursor:pointer; height:30px;width:150px;margin-left:20px;border-radius:25px;outline: none; border:3px solid;font-weight:bold;background-color:#FFAF60; color:white;border-color:white;font-size:16px;letter-spacing: 8px;padding-left: 12px;" id="submit" type="submit" value="修改"></input>               
							</div>  
						</form>
					</div>
				</div>	
				<div class="select">
					
						<div>
						<h4>尚未寄出客戶名單</h4>
							<?php if(!empty($datas1)):?>
								<?php foreach($datas1 as $key => $row1):?>
										下單人：<?php echo $row1['accountName']; ?>，地址：<?php echo $row1['address']; ?>，下單人ID:<?php echo $row1['ac_id']; ?></br>
										<?php endforeach; ?>
							<?php else: ?>
								查無資料
							<?php endif; ?>
						</div>

									
						<div>
							<h4>未寄出訂單細表</h4>
							<div style="text-align:left">
								<?php if(!empty($datas)):?>	
										<?php foreach($datas as $key => $row):?>
											下單人ID:<?php echo $row['ac_id']; ?>，日期：<?php echo $row['order_date']; ?>，訂單狀態：<?php echo $row['order_status']; ?>，訂單 ID : <?php echo $row['order_id']; ?></br>
											<?php endforeach; ?>
									<?php else: ?>
										查無資料
									<?php endif; ?>
							</div>
							
						</div>
						<div>
							<h4>未寄出商品明細表</h4>
							<div style="text-align:left">
								<?php if(!empty($datas2)):?>	
										<?php foreach($datas2 as $key => $row2):?>
											訂單 ID : <?php echo $row2['order_id']; ?>，數量：<?php echo $row2['pd_num']; ?>，商品ID：<?php echo $row2['pdID']; ?></br>
											<?php endforeach; ?>
									<?php else: ?>
										查無資料
									<?php endif; ?>
							</div>	
						</div>
				</div>				
			</div>
		</div>    		
	</div>
	<div style="display:flex;margin:auto;margin-top:30px;justify-content:center;margin-bottom:40px">
			<button><a href='edit_password.php'>修改密碼</a></button>
			<button><a href='logout.php'>登出</a></button>
			
	</div>

		<?php
			else:

				//使用php header 來轉址到後台
				header('Location: login.php');
			endif;
		?>
s</body>
</html>