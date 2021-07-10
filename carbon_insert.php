<?php
//$_SESSION使うよ！
session_start();

//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
require_once("funcs.php");
// loginCheck();

//1. POSTデータ取得
$userid      = $_SESSION["lid"];
$amount       = 10;
$eventname       = "カメラ読み取り";
// $kanri_flg = filter_input( INPUT_POST, "kanri_flg" );
// $lpw       = password_hash($lpw, PASSWORD_DEFAULT);

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO carbon_record(userid,amount,eventname)VALUES(:userid,:amount,:eventname)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':amount', $amount, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':eventname', $eventname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: user.php");
    exit;
}
