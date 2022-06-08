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
        #regi:hover{
            background-color:#FFAF60; color:white;
        }
        a {
            color:white;
            text-decoration:none;
        }
    </style>    
</head>
<body style="background-color:#3C3C3C; padding: 0; margin: 0;">
    <div style="display:flex;margin-top:20px;position:fixed;justify-content:flex-end;width:100%">
        <div style="margin-right:20px">
            <button style="cursor:pointer; height:50px;width:80px; background-color:#FFAF60; color:white; border-radius:25px;border-color:#FFFF6F; font-weight:bold; font-size:14px;letter-spacing: 8px;padding-left: 12px;border:3px solid"><a href="index.php">首頁</a></button>
        </div>   
    </div>
    <div>
    <form action="addac.php" method="post" >
        <!-- logo欄 -->
        <div style="text-align:center;">
            <img src="img/logo.jpg" alt="logo" style="width:170px; height:170px; border-radius:50px; margin-bottom:50px;margin-top:60px;animation:bounce infinite 1.5s;border-color:white">
        </div>    
        <div style="display:flex; width:100%;text-align:center;justify-content:center;flex-direction:column;color:white;align-items:center;;font-family:Microsoft JhengHei;font-weight:bold">
            <!-- 帳號欄 -->
            <div style="margin-bottom:20px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                <label for="name" style="font-size:20px;letter-spacing: 8px">帳號:</label>
                <input style="height:50px;width:450px;margin-left:20px;border-radius:25px;text-align:center;outline: none;margin-top:10px" type="text" name="name" id="name" autofocus/><br/>
            </div>
            <!-- 密碼欄 -->
            <div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                <label for="password"  style="font-size:20px;letter-spacing: 8px">密碼:</label>
                <input style="height:50px;width:450px;margin-left:20px;border-radius:25px;text-align:center;outline: none;margin-top:10px" type="text" name="password" id="password" autofocus/><br/>
            </div>
            <!-- 地址欄 -->
            <div style="margin-bottom:30px;display:flex; justify-content:center;align-items:center;flex-direction:column;">
                <label for="address"  style="font-size:20px;letter-spacing: 8px">地址:</label>
                <input style="height:50px;width:450px;margin-left:20px;border-radius:25px; text-align:center;outline: none;margin-top:10px" type="text" name="address" id="address" autofocus/><br/>
            </div>
            <div>
                <input style="cursor:pointer; height:50px;width:250px;margin-left:20px;border-radius:25px;outline: none; border:3px solid;font-weight:bold;background-color:white; color:#FFAF60;font-size:16px;letter-spacing: 8px;padding-left: 12px;margin-bottom:10px" id="submit" type="submit" value="註冊"></input>     
            </div>
    </form>
    </div>
</body>
</html>