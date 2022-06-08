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
    
<div style="border:3px white solid; margin:70px 200px; padding:20px 40px; display:flex; flex-direction:column">
    

    <div style="display:flex;justify-content:center;width:100%">
        <div>
            <img width="180px" src="img/logo.jpg" alt="logo" style="border-radius:50%;margin-top:20px">
        </div>   
    </div>
    <div style="text-align:center;">
        <img src="img/correct (1).png" alt="logo" style="width:100px; height:100px; border-radius:50px;margin-top:20px;animation:bounce infinite 1.5s;border-color:white">
    </div>   
<?php
    
    $link = mysqli_connect("localhost", "root", "zyorENIQ*Co7WQh-");
    if($link){
        //echo "成功連線";
    }else{
        echo "連線失敗";
        exit(); //end program
    }
    
    $flag = mysqli_select_db($link,"torf_homework");
    if ($flag){
        //echo "成功連線";
    }else{
        print "資料庫不可用";
        exit();
    }
    $query = 'INSERT INTO account set accountName="'.$_POST['name'].'", password="'.$_POST['password'].'", address="'.$_POST['address'].'"; '; 
    // "INSERT INTO `account`(`accountName`, `password`, `address`) VALUES ('$_POST['name']','$_POST['password']','$_POST['address']')";
    if( mysqli_query($link,$query)){?>
    <div style="font-size:25px; width:100%; text-align:center; color:white; font-family:Microsoft JhengHei;font-weight:bold;margin-top:10px">
        <?php echo "註冊成功，請跳轉至登入頁面";?>
    </div>       
    <?php }
    
    mysqli_close($link);
    ?>
    <div style="display:flex;margin-top:40px;justify-content:center;width:100%;margin-bottom:30px">
        <div>
            <button style="cursor:pointer; height:50px;width:130px; background-color:#FFAF60; color:white; border-radius:45px;border-color:#FFFF6F; font-weight:bold; font-size:20px;letter-spacing: 8px;padding-left: 12px;border:3px solid"><a href="login.php">登入</a></button>
        </div>   
    </div>
</div>    
</body>
</html>