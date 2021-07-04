<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

//SESSIONスタート
session_start();

//funcs.phpを読み込む
require_once('funcs.php');

//ログインチェック
loginCheck();
$user_name=$_SESSION['name'];
//以下ログインユーザーのみ

echo $_SESSION['kanri_flg'] ;
$name =$_SESSION['name'] ;

$book = $_POST['book'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table(id,name,書籍名,書籍URL,書籍コメント,indate)
  VALUES(NULL,:name,:book,:book_url,:book_comment,sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book', $book, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect('select.php');
}
?>
