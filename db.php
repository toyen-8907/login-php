<?php
//先設定資料庫資訊，主機通常都用本機
$host = 'localhost';
//以root管理者帳號進入資料庫
$dbuser = 'root';
//root的資料庫密碼
$dbpw = 'zyorENIQ*Co7WQh-';
//登入後要使用的資料庫
$dbname = 'torf_homework';


$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);

if ($link)
{

  //設定連線編碼為UTF-8
  //mysqli_query(資料庫連線, "語法內容") 為執行sql語法的函式
  mysqli_query($link, "SET NAMES utf8");
  //echo "已正確連線";
}
else
{
  //否則就代表連線失敗 mysqli_connect_error() 是顯示連線錯誤訊息
  echo '無法連線mysql資料庫 :<br/>' . mysqli_connect_error();
}
?>