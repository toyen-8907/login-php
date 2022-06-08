<?php
session_start();
$name ="";
$password = "";
//取得表單欄位值
if(isset($_POST['name']) && isset($_POST['password'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $_SESSION['acname'] = $_POST['name'];
    echo $_SESSION['acname'];
}
// if(isset($_POST['password'])){
//     $name = $_POST['password'];
// }

//檢查是否輸入使用者名稱和密碼
if ($name != "" && $password!=""){
    //建立資料庫連接
    $link = mysqli_connect("localhost", "root", "zyorENIQ*Co7WQh-","torf_homework") or die ("無法開啟資料庫連結<br/>");
    
    mysqli_query($link, 'SET NAMES utf8');
    // $a = "SELECT `ac_id`FROM `account` WHERE `accountName` = '{$name}'";
    // $datas = array();
    // $result1 = mysqli_query($link, $a);
    // if ($result1){
    //     if (mysqli_num_rows($result1) == 1){
    //         while ($row = mysqli_fetch_assoc($result1)){
    //             $datas[] = $row;
    //         }
    //     }
    // }
    // $b = $datas['ac_id'];
    $sql = "SELECT * FROM account WHERE password = '{$password}' AND accountName = '{$name}'";
    echo $name;
    echo $password;
    //執行sql查詢
    $result = mysqli_query($link, $sql);
    $total_record = mysqli_num_rows($result);
    
    //是否查詢到使用者紀錄
    if($total_record > 0){
        if($name == 'admin'){
            $_SESSION["login_session"] = true;
            header("Location: admin.php");

        }else{
            $_SESSION["login_session"] = true;
            header("Location: backend.php");
        }    
    }else{
        echo"使用者名稱或密碼錯誤";
        $_SESSION["login_session"] = false;
        header('Location: login.php?msg=登入失敗，請確認帳號密碼');
    }
    mysqli_close($link);


}

?>