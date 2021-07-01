<?php
// SESSIONスタート
session_start();


// SESSIONのidを取得
$sid = session_id();


//SESSION変数にデータ登録
$_SESSION['name'] = 'カワハラ';
$_SESSION['age'] = '27';


echo $sid;

?>