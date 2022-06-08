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
    // if(isset($_POST['Nname']) && isset($_POST['password'])){
        $query = 'UPDATE `pd_order` SET `order_status`="'.$_POST['order_status'].'" WHERE `order_id`= "'.$_POST['order_id'].'"';
    // }else{
    //     header("Location: edit_password.php?msg=請正確輸入");
    // }
    


    if(mysqli_query($link, $query)){

        header("Location: admin.php?msg=修改訂單ID:".$_POST['order_id']."狀態成功");
    }
    //else{
    //     echo"使用者名稱或密碼錯誤";
    //     $_SESSION["edit"] = false;
    //     header('Location: login.php?msg=登入失敗，請確認帳號密碼');
    // }
?>