<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

$query = 'SELECT `ac_id` FROM `account` WHERE `accountName`= "' .$_SESSION['acname']. '"';
$result = mysqli_query($link, $query);
$datas=array();


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



$query1 = "INSERT INTO `pd_order`(`ac_id`) VALUES ('$a')";
$query2 = "SELECT `order_id` FROM `pd_order` WHERE `ac_id` = $a";
$result2 = mysqli_query($link,$query2);
$datas=array();

// mysqli_query($link, $query1);

if($result2){
    if(mysqli_num_rows($result2)>0){
        while($row3 = mysqli_fetch_assoc($result2)){
            $datas[] = $row3;
        }
    }
    mysqli_free_result($result2);
}else{
    echo "語法執行失敗，錯誤訊息：" . mysqli_error($link);
}
if(!empty($datas)){
    foreach($datas as $key=> $row3){
        $b = ($row3['order_id']);
    }
}

$query3 = "INSERT INTO `buylist`( `pd_num`, `pdID`, `order_id`) VALUES ('".$_POST['num']."','".$_POST['pd_id']."',('$b'))";


if($_SESSION['a'] == false){
    $_SESSION['a'] = true;
    mysqli_query($link, $query1);
    echo '<script type="text/JavaScript"> location.reload(); </script>';
}else{
    mysqli_query($link, $query3);
    $_SESSION['a'] = false;
    header("Location: backend.php?msg=下單成功");
}


        




?>
</body>
</html>
