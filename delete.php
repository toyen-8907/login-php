<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
		h2{
			animation:bounce infinite 1.5s;
			padding:40px 60px;
			margin-left:auto;
			margin-top:40px;
            width:200px;
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
			margin:40px;
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
    <div class="result">
        <form action="del.php" method="post" >
        <!-- logo欄 -->
            <div style="text-align:center;">
                <img src="img/logo.jpg" alt="logo" style="width:200px; height:200px; border-radius:50px; margin-bottom:50px;margin-top:100px;animation:bounce infinite 1.5s;border-color:white">
            </div>
            <div style="display:flex;justify-content:center;margin-bottom:15px">
                <div style="width:200px; border:1px white solid; color:white;">欲刪除請先輸入密碼</div>
            </div>
            <?php
                    if(isset($_GET['msg'])){
                        echo "<p class='error'>{$_GET['msg']}</p>";
                    }
                ?>
            <div style="display:flex; width:100%;text-align:center;justify-content:center;flex-direction:column;color:white;align-items:center;;font-family:Microsoft JhengHei;font-weight:bold">
                <!-- 帳號欄 -->
                <div style="margin-bottom:20px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                    <label for="name" style="font-size:20px;letter-spacing: 8px">帳號:</label>
                    <input style="height:50px;width:450px;margin-left:20px;border-radius:25px;text-align:center;outline: none;margin-top:10px" type="text" name="name" id="name" autofocus/><br/>
                </div>
                <!-- 密碼欄 -->
                <div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                    <label for="password"  style="font-size:20px;letter-spacing: 8px">密碼:</label>
                    <input style="height:50px;width:450px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="text" name="password" id="password" autofocus/><br/>
                </div>
                <!-- 登入按鈕 -->
                <div>
                    <input style="cursor:pointer; height:50px;width:250px;margin-left:20px;border-radius:25px;outline: none; border:3px solid;font-weight:bold;background-color:#FFAF60; color:white;border-color:white;font-size:16px;letter-spacing: 8px;padding-left: 12px;" id="submit" type="submit" value="確認刪除??"></input>     
                
                </div>    
            </div>       
        </form>
    </div>
    <div class="result">
        <button style="border:2px solid #757575;">
            <a href='backend.php'>返回</a>
        </button>
    </div>  
</body>
</html>