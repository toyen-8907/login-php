<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
        .error{
			color:red;
            text-align:center;
		}
    </style>
</head>
<body style="background-color:#3C3C3C; padding: 0; margin: 0;">
    <form action="edit.php" method="post">
        <div style="text-align:center;">
            <img src="img/logo.jpg" alt="logo" style="width:200px; height:200px; border-radius:50px; margin-bottom:50px;margin-top:100px;animation:bounce infinite 1.5s;border-color:white">
        </div>
        <?php
                if(isset($_GET['msg'])){
                    echo "<p class='error'>{$_GET['msg']}</p>";
                }
        ?>
        <!-- 帳號欄 -->
        <div style="display:flex; width:100%;text-align:center;justify-content:center;flex-direction:column;color:white;align-items:center;;font-family:Microsoft JhengHei;font-weight:bold">    
            <div style="margin-bottom:20px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                <label for="name" style="font-size:20px;letter-spacing: 8px">帳號:</label>
                <input style="height:50px;width:450px;margin-left:20px;border-radius:25px;text-align:center;outline: none;margin-top:10px" type="text" name="Nname" id="name" autofocus/><br/>
            </div>
            <div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                <label for="newpassword"  style="font-size:20px;letter-spacing: 8px">新密碼:</label>
                <input style="height:50px;width:450px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="text" name="newpassword" id="newpassword" autofocus/><br/>
            </div>
            <div>
                <input style="cursor:pointer; height:50px;width:250px;margin-left:20px;border-radius:25px;outline: none; border:3px solid;font-weight:bold;background-color:#FFAF60; color:white;border-color:white;font-size:16px;letter-spacing: 8px;padding-left: 12px;" id="submit" type="submit" value="修改"></input>               
            </div>  
        </div>
    </form>
</body>
</html>