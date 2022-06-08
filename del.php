<?php
session_start();
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
    $query ='DELETE FROM `account` WHERE `password`="'.$_POST['password'].'" AND `accountName`= "'.$_POST['name'].'"';
    if(mysqli_query($link, $query)){
        session_unset();
        header("Location: login.php?msg=刪除成功");
        
    }



?>