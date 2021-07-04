<?php

//SESSIONスタート
session_start();

//funcs.phpを読み込む
require_once('funcs.php');

//ログインチェック
loginCheck();
$user_name=$_SESSION['name'];
//以下ログインユーザーのみ

echo $_SESSION['kanri_flg'] ;
echo $_SESSION['name'] ;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍データ登録（ログインユーザー限定ページ）</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <p><?=$user_name?></p>
    <div class="navbar-header"><a class="navbar-brand" href="select.php">好きな本一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php"><p><?php if($_SESSION['kanri_flg']== 1){ echo "登録ユーザー一覧（1:スーパー管理者の時のみ表示）";}?></p></a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div><!-- ここを追記 -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>好きな本を登録（ログインユーザー限定ページ）</legend>
     <label>書籍名：<input type="text" name="book"></label><br>
     <label>書籍URL：<input type="text" name="book_url"></label><br>
     <label>書籍コメント：<br>
     <textArea name="book_comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
