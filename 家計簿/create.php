<?php
//dbconnect.phpを読み込む→データベースに接続
include_once('./dbconnect.php');

//新しいレコードを追加
//1,画面で入力された値を取得
//2,PHPからMYSQLへ接続
//3,SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//4,index.phpに画面を遷移する

//1
$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];

$sql = "INSERT INTO records(title, type,amount,date,created_at,updated_at) VALUES(:title,:type,:amount,:date,now(),now())";

$stmt = $pdo->prepare($sql);

//値の設定
$stmt->bindParam(':title',$title,PDO::PARAM_STR);
$stmt->bindParam(':type',$type,PDO::PARAM_INT);
$stmt->bindParam(':amount',$amount,PDO::PARAM_INT);
$stmt->bindParam(':date',$date,PDO::PARAM_STR);

//SQL実行
$stmt->execute();

header('Location: ./index.php');
exit;




?>