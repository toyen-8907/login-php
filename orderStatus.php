<?php

	//啟動 session
	session_start();
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        td, tr{
            text-align:center;
            font-weight:bold;
        }
        table {
        
            border-collapse: collapse;
            border-radius: 15px;
            width: 70%;
            margin-left:auto;
			margin-right:auto;
            table-layout : fixed;
            margin-bottom:20px;
            }
            th {
            border: solid 3px #FFA042;
            padding: 16px 8px;
            }
            td {
            border: solid 3px #FFA042;
            text-align: center;
            padding: 8px;
            color: #757575;
            }
	</style>
</head>
<body style="background-color:#3C3C3C; padding: 0; margin: 0;">
    
    <?php
    $query = 'SELECT `ac_id` FROM `account` WHERE `accountName`= "'.$_SESSION['acname'].'"';
    $result = mysqli_query($link, $query);
    $datas=array();
    $datas1=array();
    $datas2=array();

    if($result){
        if(mysqli_num_rows($result)>0){
            while($row3 = mysqli_fetch_assoc($result)){
                $datas[] = $row3;
            }
        }
        mysqli_free_result($result);
    }else{
        echo "語法執行失敗，錯誤訊息：" . mysqli_error($link);
    }
    if(!empty($datas)){
        foreach($datas as $key=> $row3){
            $a = ($row3['ac_id']);
        }
    }
    $query1 = "SELECT `order_id`,`order_date`,`order_status` FROM `pd_order`WHERE `ac_id` IN(SELECT `ac_id` FROM `account` WHERE `accountName` = '$_SESSION[acname]' ) ORDER BY `order_date` ASC";
    $query2 = "SELECT `pd_name` FROM `pd_list` WHERE `pd_id` IN(SELECT `pd_id` FROM `buylist` WHERE `order_id` IN(SELECT `order_id` FROM `pd_order` WHERE `ac_id` IN (SELECT `ac_id` FROM `account` WHERE `accountName` = '$_SESSION[acname]')))";
    
    $result1 = mysqli_query($link, $query1);
    $result2 = mysqli_query($link,$query2);
    if($result1 && $result2){
        if(mysqli_num_rows($result1)>0 && mysqli_num_rows($result2)>0){
            while($row3 = mysqli_fetch_assoc($result1)){
                $datas1[] = $row3; 
            }
            while($row = mysqli_fetch_assoc($result2)){
                $datas2[] = $row; 
            }
        }
        mysqli_free_result($result1);
        mysqli_free_result($result2);
    }else{
        echo "語法執行失敗，錯誤訊息：" . mysqli_error($link);
    }	
    ?>
    <div class="resul">
        <div><img src="img/logo.jpg" alt="logo" style="width:150px; height:150px; border-radius:50px; margin-bottom:50px;margin-top:20px;animation:bounce infinite 1.5s;border-color:white"></div>
        <div style=" letter-spacing: 3px;font-size:20px"><h4>hello <?php echo $_SESSION['acname']?> 以下是你的訂單</h4></div>
    </div>
    <div class="resul">
        <?php if(!empty($datas1)):?>
			<?php foreach($datas1 as $key => $row1 ):?>
       
                <table border="1">
                    <tr>
                        <th>ID</th>
                    <th>下單日</th>
                    <th>訂單狀態</th>
                   
                    </tr>
                    <tr>
                    <td><?php echo $row1['order_id']; ?></td>
                    <td><?php echo $row1['order_date']; ?></td>
                    <td><?php echo $row1['order_status']; ?></td>
                    <?php endforeach; ?>
			<?php else: ?>
                查無資料
		<?php endif; ?>
       
                    </tr>

                </table>
				</br>
                
				
    </div>
    <div class="resul1">
        <button style="border:2px solid #757575;">
            <a href='backend.php'>返回</a>
        </button>
    </div>  
    
</body>
</html>